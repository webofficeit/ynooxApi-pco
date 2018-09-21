<?php

namespace Pdf4me\API\Resources\Core;

use Pdf4me\API\Exceptions\MissingParametersExceptionPdf4meException;
use Pdf4me\API\Exceptions\ResponseException;
use Pdf4me\API\Http;
use Pdf4me\API\Resources\ResourceAbstract;
use Pdf4me\API\Traits\Utility\InstantiatorTrait;
use Pdf4me\API\Traits\Schema\PdfSchema;
use Pdf4me\API\Traits\Schema\PdfDataContractValidate;
use Pdf4me\API\Resources\Core\Attachments;

/**
 * The Pdf class exposes key methods for document
 */
class Pdf4me extends ResourceAbstract {

    use InstantiatorTrait;
    use PdfDataContractValidate;


    /**
     * Wrapper for common GET requests
     *
     * @param       $route
     * @param array $params
     *
     * @return \stdClass | null
     * @throws ResponseException
     * @throws \Exception
     */
    private function sendGetRequest($route, array $params = []) {
        $response = Http::send(
                        $this->client, $this->getRoute($route, $params), ['queryParams' => $params]
        );

        return $response;
    }

    /**
     * Declares routes to be used by this resource.
     */
    protected function setUpRoutes() {
        parent::setUpRoutes();

        $this->setRoutes([
            'jobConfig' => 'job/jobConfigs',
            'optimize' => 'Optimize/Optimize',
            'pdfA'=>'PdfA/PdfA',
            'merge'=>'Merge/Merge',
            'createImages'=> 'Image/CreateImages',
            'split'=>'Split/Split',
            'stamp'=>'Stamp/Stamp',
            'getDocuments'=>'Document/GetDocuments',
            'convertToPdf'=>'Convert/ConvertToPdf',
            'getContentDocument'=>'Document/GetDocument',
            'dropDocument'=>'Document/DropDocument',
            'produceDocuments'=>'Document/ProduceDocuments',
            'extractPages' => 'Extract/ExtractPages',
            'extract' => 'Extract/Extract',
            'createThumbnail'=>'Image/CreateThumbnail',
            'createArchiveJobConfig'=>'Job/CreateArchiveJobConfig',
            'runJob'=>'Job/RunJob',
            'saveJobConfig'=>'Job/SaveJobConfig',
            'manageVersion'=>'Management/Version',
            'manageApiUsage'=>'Management/ApiUsage',
            'merge2Pdfs'=>'Merge/Merge2Pdfs',
            'recognizeDocument'=>'Ocr/RecognizeDocument',
            'optimizeByProfile'=>'Optimize/OptimizeByProfile',
            'createPdfA' => 'PdfA/CreatePdfA',
            'splitByPageNr' => 'Split/SplitByPageNr',
            'textStamp'=>'Stamp/TextStamp',
            'convertFileToPdf'=>'Convert/ConvertFileToPdf'
        ]);
    }
    
    /**
     * for convertFileToPdf api
     * 
     * return @array
     */
    public function convertFileToPdf(array $params) {
      $route = $this->getRoute(__FUNCTION__, $params);
         $this->checkValidationSchemaGetData($params,$route,'post','convertFileToPdf');
        return $this->client->uploadMultipart(
                        $route, $params
        );   
    }
    
    /**
     * for textStamp api
     * 
     * return @array
     */
    public function textStamp(array $params) {
      $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','textStamp');
        return $this->client->uploadMultipart(
                        $route, $params
        );   
    }
    
    /**
     * for splitByPageNr
     * 
     * return @array
     */
    public function splitByPageNr(array $params) {
      $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','splitByPageNr');
        $response = $this->client->uploadMultipart(
                        $route, $params
        );
        // split response into seperate array
        $splitResponse = serialize(explode(",",$response));
        return unserialize($splitResponse);
    }
    
    /**
     * for createPdfA
     * 
     * return @array
     */
    public function createPdfA(array $params) {
      $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','createPdfA');
        return $this->client->uploadMultipart(
                        $route, $params
        );   
    }
    
    /**
     * for  optimizeByProfile
     * @param array
     * 
     * return @array
     */
    public function optimizeByProfile(array $params) {
      $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','optimizeByProfile');
        return $this->client->uploadMultipart(
                        $route, $params
        );    
    }
    
    /**
     * for recognizeDocument
     * @param array
     * 
     * return @array
     */
    public function recognizeDocument(array $params) {
      $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','recognizeDocument');
        return $this->client->post(
                        $route, $params
        );   
    }
    
    /**
     * for mserge2Pdf
     * @param array
     * 
     * return @array
     */
    public function merge2Pdfs(array $params) {
      $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','merge2Pdfs');
        return $this->client->uploadMultipart(
                        $route, $params
        );     
    }
    
    /**
     * for manageApiUsage
     * @param array
     * 
     * return @array
     */
    public function manageApiUsage(array $params = []) {
      $route = $this->getRoute(__FUNCTION__, $params);
        return $this->client->post(
                        $route, $params
        );   
    }
    
    /**
     * for manageVersion
     * @param array
     * 
     * return @array
     */
    public function manageVersion(array $params = []) {
      $route = $this->getRoute(__FUNCTION__, $params);
        return $this->client->post(
                        $route, $params
        );   
    }
    
    /**
     * for saveJobConfig
     * @param array
     * 
     * return @array
     */
    public function saveJobConfig(array $params) {
      $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','saveJobConfig');
        return $this->client->post(
                        $route, $params
        );   
    }
    
    /**
     * for runJob
     * @param array
     * 
     * return @array
     */
    public function runJob(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','runJob');
        return $this->client->post(
                        $route, $params
        ); 
    }
    /**
     * for createArchiveJobConfig
     * @param array
     * 
     * return @array
     */
    public function createArchiveJobConfig(array $params) {
      $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','createArchiveJobConfig');
        return $this->client->post(
                        $route, $params
        );   
    }
    
    /**
     * for createThumbnail
     * @param array
     * 
     * return @array
     */
    public function createThumbnail(array $params) {
      $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','createThumbnail');
         return $this->client->uploadMultipart(
                        $route, $params
        );   
    }
    
    /**
     * for extract api
     * @param array
     * 
     * return @array
     */
    public function extract(array $params) {
      $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','extract');
        return $this->client->post(
                        $route, $params
        );   
    }
    
    /**
     * for extractPages
     * @param array
     * 
     * return @array
     */
    public function extractPages(array $params) {
      $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','extractPages');
         return $this->client->uploadMultipart(
                        $route, $params
        ); 
    }
    
    
    /**
     * for produceDocument
     * @param array
     * 
     * return @array
     */
    public function produceDocuments(array $params) {
       $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','produceDocuments');
        return $this->client->post(
                        $route, $params
        );  
    }
    
    /**
     * for dropDocument
     * @param array
     * 
     * return @array
     */
    public function dropDocument(array $params) {
       $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','dropDocument');
        return $this->client->post(
                        $route, $params
        );  
    }
    
    /**
     * for getConententDocument Api
     * @param array
     * 
     * return @array
     */
    public function getContentDocument(array $params) {
       $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','getContentDocument');
        return $this->client->post(
                        $route, $params
        );  
    }
    
    /**
     * for convertToPdf Api
     * @param array
     * 
     * return @array
     */
    public function convertToPdf(array $params) {
       $route = $this->getRoute(__FUNCTION__, $params);
        
        $this->checkValidationSchemaGetData($params,$route,'post','convertToPdf');
        $this->checkParamConditionValidate($params,'convertToPdf');
        return $this->client->post(
                        $route, $params
        );  
    }
    
    /**
     * get documents
     * @param array
     * 
     * return @array
     */
    public function getDocuments(array $params){
        $route = $this->getRoute(__FUNCTION__);
        $this->checkValidationSchemaGetData($params,$route,'get','getDocuments');
       return $this->client->get(
               $route, $params);
    }
    /**
     * stamp pdf
     * @param array
     * 
     * return @array
     */
    public function stamp(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','stamp');
        $this->checkParamConditionValidate($params,'stamp');
        return $this->client->post(
                        $route, $params
        );  
    }
    
    
    /**
     * split pdf
     * @param array
     * 
     * return @array
     */
    public function split(array $params) {
       $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','split');
        return $this->client->post(
                        $route, $params
        );  
    }
    
    /**
     * to create image
     * @param array
     * 
     * return @array
     */
    public function createImages(array $params) {
       $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','createImages');
        return $this->client->post(
                        $route, $params
        ); 
    }

    /**
     * To get pdfoptimizater
     * @param array
     * 
     * return @array
     * 
     */
    public function optimize(array $params) {
        $route = $this->getRoute(__FUNCTION__, $params);

        $this->checkValidationSchemaGetData($params,$route,'post','optimize');
        return $this->client->post(
                        $route, $params
        );
    }
    
    /**
     * To get PdfA
     * @param array
     * 
     * return @array
     */
    public function pdfA(array $params) {
         $route = $this->getRoute(__FUNCTION__, $params);
         $this->checkValidationSchemaGetData($params,$route,'post','pdfA');
         return $this->client->post(
                        $route, $params
        );
    }
    
    /**
     * To merge Pdf
     * @param array
     * 
     * return @array
     */
    public function merge(array $params) {
         $route = $this->getRoute(__FUNCTION__, $params);
         $this->checkValidationSchemaGetData($params,$route,'post', 'merge');
         $this->checkParamConditionValidate($params,'merge');
         return $this->client->post(
                        $route, $params
        );
    }

    

    /**
     * To get jobconfig parameter
     * @param array
     * 
     * return @array
     */
    public function jobConfig() {
        $response = $this->client->get($this->getRoute(__FUNCTION__));
        return $response;
    }

}

