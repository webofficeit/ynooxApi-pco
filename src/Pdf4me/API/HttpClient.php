<?php

namespace Pdf4me\API;

/*
 * Dead simple autoloader:
 * spl_autoload_register(function($c){@include 'src/'.preg_replace('#\\\|_(?!.+\\\)#','/',$c).'.php';});
 */

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\HandlerStack;
use Pdf4me\API\Exceptions\AuthException;
use Pdf4me\API\Middleware\RetryHandler;
use Pdf4me\API\Resources\Core\Pdf4me;
use Pdf4me\API\Traits\Utility\InstantiatorTrait;
use Pdf4me\API\Utilities\Auth;
use Pdf4me\API\Exceptions\Pdf4meException;

/**
 * Client class, base level access
 *
 * @method Pdf4me Pdf4me()
 *
 */
class HttpClient
{

    use InstantiatorTrait;

    /**
     * @var array $headers
     */
    private $headers = [];

    /**
     * @var Auth
     */
    protected $auth;
    /**
     * @var string
     */
    protected $scheme;
    /**
     * @var string
     */
    protected $hostname;
    /**
     * @var string
     */
    protected $apiUrl;
    /**
     * @var string This is appended between the full base domain and the resource endpoint
     */
    protected $apiBasePath;

    /**
     * @var \GuzzleHttp\Client
     */
    public $guzzle;
    
     /**
     * @var Debug
     */
    protected $debug;
    
    protected $authurl = 'https://login.microsoftonline.com/devynooxlive.onmicrosoft.com/oauth2/token';

    /**
     * @param string $scheme
     * @param string $hostname
     * @param \GuzzleHttp\Client $guzzle
     */

    public function __construct(
        $scheme = "",
        $hostname = "",
        $guzzle = null
    ) {
        if (is_null($guzzle)) {
            $handler = HandlerStack::create();
            $handler->push(new RetryHandler(['retry_if' => function ($retries, $request, $response, $e) {
                return $e instanceof RequestException && strpos($e->getMessage(), 'ssl') !== false;
            }]), 'retry_handler');
            $this->guzzle = new \GuzzleHttp\Client(compact('handler'));
        } else {
            $this->guzzle = $guzzle;
        }

        $this->hostname  = ($hostname=='')?"api-dev.Pdf4me.com":$hostname;
        $this->scheme    = ($scheme=='')?"https":$scheme;
        $this->apiUrl    = "$this->scheme://$this->hostname/";
        $this->debug      = new Debug();
    }

    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public static function getValidSubResources()
    {
        return [
            'pdf4me'                    => Pdf4me::class,
        ];
    }

    /**
     * @return Auth
     */
    public function getAuth()
    {
        return $this->auth;
    }

    /**
     * Configure the authorization method
     *
     * @param       $strategy
     * @param array $options
     *
     * @throws AuthException
     */
    public function setAuth($strategy, array $options)
    {
        $this->auth = new Auth($strategy, $options);
    }
    /*
     * 
     */
    public function getServerAuth() {
        
        $response = $this->guzzle->request('POST', $this->authurl, [
    'form_params' => [
        'resource' => $this->headers['auth'][0],
        'client_id' => $this->headers['auth'][0],
        'client_secret' => $this->headers['auth'][1],
        'grant_type' => "client_credentials"
    ]
]);
        $responseToken = json_decode($response->getBody()->getContents(), true);
       
        $this->headers['Authorization'] = $responseToken['token_type'].' '.$responseToken['access_token'];
    
        
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        if(isset($this->headers['auth'])) {
            $this->getServerAuth();
            unset($this->headers['auth']);
        }
        return $this->headers;
    }

    /**
     * @param string $key The name of the header to set
     * @param string $value The value to set in the header
     * @return HttpClient
     * @internal param array $headers
     *
     */
    public function setAuthHeader($clientId, $secretkey, $authurl = null)
    {
        if($authurl!=null) { 
            $this->authurl = $authurl; 
        }
        $this->headers['auth']= [$clientId,$secretkey];
        $this->getHeaders();
        return $this;
    }
    
/**
     * @param string $value The value to set in the header
     * @return HttpClient
     * @internal param array $headers
     *
     */
    public function setToken($value)
    {
        $this->headers['Authorization'] = 'Basic '.$value;
        return $this;
    }

    /**
     * Returns the generated api URL
     *
     * @return string
     */
    public function getApiUrl()
    {
        return $this->apiUrl;
    }

    /**
     * Sets the api base path
     *
     * @param string $apiBasePath
     */
    public function setApiBasePath($apiBasePath)
    {
        $this->apiBasePath = $apiBasePath;
    }

    /**
     * Returns the api base path
     *
     * @return string
     */
    public function getApiBasePath()
    {
        return $this->apiBasePath;
    }
    
    /**
     * Set debug information as an object
     *
     * @param mixed  $lastRequestHeaders
     * @param mixed  $lastRequestBody
     * @param mixed  $lastResponseCode
     * @param string $lastResponseHeaders
     * @param mixed  $lastResponseError
     */
    public function setDebug(
        $lastRequestHeaders,
        $lastRequestBody,
        $lastResponseCode,
        $lastResponseHeaders,
        $lastResponseError
    ) {
        $this->debug->lastRequestHeaders  = $lastRequestHeaders;
        $this->debug->lastRequestBody     = $lastRequestBody;
        $this->debug->lastResponseCode    = $lastResponseCode;
        $this->debug->lastResponseHeaders = $lastResponseHeaders;
        $this->debug->lastResponseError   = $lastResponseError;
    }

    /**
     * Returns debug information in an object
     *
     * @return Debug
     */
    public function getDebug()
    {
        return $this->debug;
    }


    /**
     * This is a helper method to do a get request.
     *
     * @param       $endpoint
     * @param array $queryParams
     *
     * @return \stdClass | null
     * @throws \Pdf4me\API\Exceptions\AuthException
     * @throws \Pdf4me\API\Exceptions\ApiResponseException
     */
    public function get($endpoint, $queryParams = [])
    {
        
     $response = Http::send(
            $this,
            $endpoint,
            ['queryParams' => $queryParams]
        );
        return $response;
    }

    /**
     * This is a helper method to do a post request.
     *
     * @param       $endpoint
     * @param array $postData
     *
     * @param array $options
     * @return null|\stdClass
     * @throws \Pdf4me\API\Exceptions\AuthException
     * @throws \Pdf4me\API\Exceptions\ApiResponseException
     */
    public function post($endpoint, $postData = [], $options = [])
    {
        $extraOptions = array_merge($options, [
            'postFields' => $postData,
            'method' => 'POST'
        ]);

        $response = Http::send(
            $this,
            $endpoint,
            $extraOptions
        );
        

        // to check whether docLogLevel= 3
        if((!empty($response))&&((isset($response->document))&&(isset($response->document->docLogs)))||((isset($response->documents))&&(isset($response->documents->docLogs)))) {
            $this->validateResDocData($response->document->docLogs);
        }

        return $response;
    }
    
     /**
     * This is a helper method to do a post request.
     *
     * @param       $endpoint
     * @param array $postData
     *
     * @param array $options
     * @return null|\stdClass
     * @throws \Pdf4me\API\Exceptions\AuthException
     * @throws \Pdf4me\API\Exceptions\ApiResponseException
     */
    public function uploadMultipart($endpoint, $postData = [], $options = [])
    {
        $uploadfieldName = ['file','file1','file2'];
        foreach($postData as $keypostData=>$valuepostData) {
            $filecontent = (in_array($keypostData, $uploadfieldName))?fopen($valuepostData, 'r'):$valuepostData;
            $postRequestData[] = ['name'=>$keypostData,
                                  'contents'=>$filecontent];
        }
        $extraOptions = array_merge($options, [
            'multipart' => $postRequestData,
            'method' => 'POST'
        ]);
        

        $response = Http::upload(
            $this,
            $endpoint,
            $extraOptions
        );

        return $response;
    }

    /**
     * This is a helper method to do a put request.
     *
     * @param       $endpoint
     * @param array $putData
     *
     * @return \stdClass | null
     * @throws \Pdf4me\API\Exceptions\AuthException
     * @throws \Pdf4me\API\Exceptions\ApiResponseException
     */
    public function put($endpoint, $putData = [])
    {
        $response = Http::send(
            $this,
            $endpoint,
            ['postFields' => $putData, 'method' => 'PUT']
        );

        return $response;
    }

    /**
     * This is a helper method to do a delete request.
     *
     * @param $endpoint
     *
     * @return null
     * @throws \Pdf4me\API\Exceptions\AuthException
     * @throws \Pdf4me\API\Exceptions\ApiResponseException
     */
    public function delete($endpoint)
    {
        $response = Http::send(
            $this,
            $endpoint,
            ['method' => 'DELETE']
        );

        return $response;
    }

    /**
     * @param string $filePath Name of file
     * @return string
     *
     */
    public function getFileData($filePath)
    {
        if (!file_exists($filePath)) {
            throw new Pdf4meException('File ' . $filePath . ' could not be found');
        }
        $b64Doc = chunk_split(base64_encode(file_get_contents($filePath)));
        
        return $b64Doc;
    }

    /**
     * @param string $docdata
     * @return string
     *
     */
    public function validateResDocData($docdata)
    {

            foreach($docdata as $key=>$doclogvalue) {
                switch($doclogvalue->docLogLevel) {
                    case 3:
                    throw new Pdf4meException($doclogvalue->message);
                    break;
                }
                
            }
        return null;
    }
}
