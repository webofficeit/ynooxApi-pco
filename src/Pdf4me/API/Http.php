<?php

namespace Pdf4me\API;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\LazyOpenStream;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\StreamInterface;
use Pdf4me\API\Exceptions\ApiResponseException;
use Pdf4me\API\Exceptions\AuthException;

/**
 * HTTP functions via curl
 * @package Pdf4me\API
 */
class Http
{
    public static $curl;

    /**
     * Use the send method to call every endpoint 
     *
     * @param HttpClient $client
     * @param string     $endPoint 
     * @param array      $options
     *                             Available options are listed below:
     *                             array $queryParams Array of unencoded key-value pairs, e.g. ["ids" => "1,2,3,4"]
     *                             array $postFields Array of unencoded key-value pairs, e.g. ["filename" => "blah.png"]
     *                             string $method "GET", "POST", etc. Default is GET.
     *                             string $contentType Default is "application/json"
     *
     * @return \stdClass | null The response body, parsed from JSON into an object. Also returns null if something went wrong
     * @throws ApiResponseException
     * @throws AuthException
     */
    public static function send(
        HttpClient $client,
        $endPoint,
        $options = []
    ) {
        $options = array_merge(
            [
                'method'      => 'GET',
                'contentType' => 'application/json',
                'postFields'  => null,
                'queryParams' => null
            ],
            $options
        );
       

        $headers = array_merge([
            'Accept'       => 'application/json',
            'Content-Type' => $options['contentType'],
        ], $client->getHeaders());
        $request = new Request(
            $options['method'],
            $client->getApiUrl() . $client->getApiBasePath() . $endPoint,
            $headers
        );
        $requestOptions = [];

         if (! empty($options['multipart'])) {
            $request['multipart'] = $options['multipart'];
        } elseif (! empty($options['postFields'])) {
            $request = $request->withBody(\GuzzleHttp\Psr7\stream_for(json_encode($options['postFields'])));
        } elseif (! empty($options['file'])) {
            if ($options['file'] instanceof StreamInterface) {
                $request = $request->withBody($options['file']);
            } elseif (is_file($options['file'])) {
                $fileStream = new LazyOpenStream($options['file'], 'r');
                $request    = $request->withBody($fileStream);
            }
        }
        if (! empty($options['queryParams'])) {
            foreach ($options['queryParams'] as $queryKey => $queryValue) {
                $uri     = $request->getUri();
                $uri     = $uri->withQueryValue($uri, $queryKey, $queryValue);
                $request = $request->withUri($uri, true);
            }
        }

        try {
            // enable anonymous access
            
            if ($client->getAuth()) {
                list ($request, $requestOptions) = $client->getAuth()->prepareRequest($request, $requestOptions);
            }
           
            $response = $client->guzzle->send($request, $requestOptions);
            
        } catch (RequestException $e) {
            $requestException = RequestException::create($e->getRequest(), $e->getResponse(), $e);
            throw new ApiResponseException($requestException);
        } finally {
            $client->setDebug(
                $request->getHeaders(),
                $request->getBody(),
                isset($response) ? $response->getStatusCode() : null,
                isset($response) ? $response->getHeaders() : null,
                isset($e) ? $e : null
            );

            $request->getBody()->rewind();
        }

        return json_decode($response->getBody()->getContents());
    }
    
    
    
    /**
     * 
     * @param \Pdf4me\API\HttpClient $client
     * @param type $endPoint
     * @param type $options
     * @return type
     * @throws ApiResponseException
     */
    public static function upload(
        HttpClient $client,
        $endPoint,
        $options = []
    ) {

        $headers = array_merge([
            'Accept'       => 'application/json',
        ], $client->getHeaders());
        try {
            
            $response = $client->guzzle->request($options['method'],
                    $client->getApiUrl() . $client->getApiBasePath() . $endPoint,
                    [
                     'headers'=>$headers,  
                     'multipart'=>$options['multipart']   
                    ]);
            
        } catch (RequestException $e) {
            $requestException = RequestException::create($e->getRequest(), $e->getResponse(), $e);
            throw new ApiResponseException($requestException);
        } 
        return $response->getBody()->getContents();
    }
}
