<?php

namespace Pdf4me\API\Traits\Schema;
use Pdf4me\API\Exceptions\Pdf4meException;

/**
 * Trait ResourceName
 * */
trait PdfSchema {

    protected $swaggerSchemaUrl = 'https://api-dev.Pdf4me.com/swagger/v1/swagger.json';
    protected $router_path='';
    protected $current_methodname='';

    /*
     * to get schema from swagger api
     */

    public function getApiSchema() {
        $schema = json_decode(file_get_contents($this->swaggerSchemaUrl));
        return array(json_decode(json_encode($schema), true));
    }
    
    /*
     * set reference schema for multiple index
     */
    public function setRefMultiSchema($subschemaref, $swaggerSchema, &$endPoint, $paramvalueschema, $paramkeyschema, $refkey, $currentTemp,$superIndex,$primaryIndex) {
                         if($superIndex!='') {
                    
                    $this->setRefSchema($subschemaref, $swaggerSchema, $endPoint, $paramvalueschema, $paramkeyschema, $refkey, $currentTemp,$superIndex,$primaryIndex);
                 }
                 else {
                    $superIndex = (($superIndex=='')&&($currentTemp != $primaryIndex))?$primaryIndex:$superIndex;
             
                    $this->setRefSchema($subschemaref, $swaggerSchema, $endPoint, $paramvalueschema, $paramkeyschema, $refkey, $currentTemp,$superIndex);
                  }
    }

    /*
     * 
     */

    /**
     * set data contract schema
     * @return string
     */
    protected function setDataContractSchema($params, $router_path, $req_type) {

        $this->router_path = $router_path;
        $swaggerSchema = $this->getApiSchema();
        if (!empty($swaggerSchema)) {
            $endPoint = [];
            $endpoint_schema = $swaggerSchema[0]['paths']['/' . $this->router_path][$req_type];
        
            foreach ($endpoint_schema as $paramkeyschema => $paramvalueschema) {
              
                if (array_key_exists("parameters", $endpoint_schema)) {
                    foreach ($endpoint_schema['parameters'] as $paramkey => $paramvalue) {
                        //to set reference definition
                        if (isset($paramvalue['schema'])) {
                            $schemaref = $this->getRefString($paramvalue['schema']['$ref']);
                           
                            $this->setRefSchema($schemaref, $swaggerSchema, $endPoint, $paramvalueschema, $paramkeyschema);
                        } else {
                            $this->setSchemaParameteres($paramvalue, $endPoint);
                        }
                    }
                }
            }
        }
       
        return $endPoint;
    }
    
    
    /*
     * set parameter
     */
    public function setSchemaParameteres($paramvalue, &$endPoint) {
    
    $index = (isset($paramvalue['name']))?$paramvalue['name']:'';
    if($index!='') {
    foreach ($paramvalue as $fieldkey => $fieldvalue) {
                                switch($fieldkey) {
                                    case 'name':
                                        if(($fieldvalue == 'file')||($fieldvalue == 'file2')||($fieldvalue == 'file1')) {
                                             $endPoint[$this->router_path][$index]['parameters']['type'] = 'upload';
                                        }
                                     break;
                                    case 'required':
                                       $endPoint[$this->router_path][$index]['parameters'][$fieldkey] = $fieldvalue;
                                     break;
                                    case 'type':
                                       $endPoint[$this->router_path][$index]['parameters'][$fieldkey] = $fieldvalue;
                                     break;
                                    case 'enum':
                                       $endPoint[$this->router_path][$index]['parameters'][$fieldkey] = array_map('strtolower', $fieldvalue);
                                    break; 
                                    
                            };                           
                            }
}
}

/*
 * set required parameter for index
 */
public function setRequiredIndex($refRequired,$refkey,$primaryIndex,$currentTemp, &$endPoint, $superIndex='',$subsuperIndex='') {
    
    if ((isset($refRequired['required'])) && (in_array($refkey, $refRequired['required']))) {
                    if(($subsuperIndex != '')&&($subsuperIndex!=$superIndex)) {
                    $endPoint[$this->router_path][$superIndex][$subsuperIndex][$primaryIndex][$currentTemp][$refkey]['required'] = 1;
                    }
                    elseif ($superIndex != '')
                        $endPoint[$this->router_path][$superIndex][$primaryIndex][$currentTemp][$refkey]['required'] = 1;
                    elseif ($primaryIndex != '')
                        $endPoint[$this->router_path][$primaryIndex][$currentTemp][$refkey]['required'] = 1;
                    elseif ($currentTemp != '')
                        $endPoint[$this->router_path][$currentTemp][$refkey]['required'] = 1;
                    else
                        $endPoint[$this->router_path][$refkey]['required'] = 1;
                }
                
}

/*
 * split array by '/'
 * return string
 */
public function getRefString($refstring) {
    $splitarrayitem = explode("/", $refstring);
    return end($splitarrayitem);
}

/*
 * set the parameters
 */
public function setendpointParameters($primaryIndex, $currentTemp, $refkey, $subkey, $subparams,&$endPoint, $superIndex,$subsuperIndex) {
    if(($subsuperIndex != '') && ($subsuperIndex!=$superIndex)) {
        $endPoint[$this->router_path][$superIndex][$subsuperIndex][$primaryIndex][$currentTemp][$refkey]['parameters'][$subkey] = $subparams;
    }
    elseif ($superIndex != '')
        $endPoint[$this->router_path][$superIndex][$primaryIndex][$currentTemp][$refkey]['parameters'][$subkey] = $subparams;
    elseif ($primaryIndex != '')
        $endPoint[$this->router_path][$primaryIndex][$currentTemp][$refkey]['parameters'][$subkey] = $subparams;
   
    elseif ($currentTemp != '')
        $endPoint[$this->router_path][$currentTemp][$refkey]['parameters'][$subkey] = $subparams;
    else
        $endPoint[$this->router_path][$refkey]['parameters'][$subkey] = $subparams;
}

/*
 * creating a json file for datacontract
 */
public function setRefSchema($schemaref, $swaggerSchema, &$endPoint, $paramvalueschema, $paramkeyschema, $currentTemp = '', $primaryIndex = '', $superIndex = '', $subsuperIndex='') {
    $refDef = $swaggerSchema[0]['definitions'][$schemaref];
 
    if ($refDef) {
        foreach ($refDef['properties'] as $refkey => $refvalue) {
              
            $this->setRequiredIndex($refDef,$refkey,$primaryIndex,$currentTemp,$endPoint,$superIndex,$subsuperIndex);
            if (isset($refvalue['$ref'])) {
               
                $subschemaref = $this->getRefString($refvalue['$ref']);
                $this->setRefMultiSchema($subschemaref, $swaggerSchema, $endPoint, $paramvalueschema, $paramkeyschema, $refkey, $currentTemp,$superIndex,$primaryIndex);

                 } 
                 else {
 
                if (is_array($refvalue)) {

                    if (isset($refvalue['type']) && ($refvalue['type'] == 'array') && is_array($refvalue['items']) && isset($refvalue['items']['$ref'])) {
                        $subitemschemaref = $this->getRefString($refvalue['items']['$ref']);
                        $superIndex = (($superIndex=='')&&($currentTemp != $primaryIndex))?$primaryIndex:$superIndex;
                        $this->setRefSchema($subitemschemaref, $swaggerSchema, $endPoint, $paramvalueschema, $paramkeyschema, $refkey, $currentTemp, $superIndex);
                    } 
                    else {
                      
                        foreach ($refvalue as $subkey => $subparams) {
                            switch($subkey) {
                               case  'required':
                                   $this->setendpointParameters($primaryIndex, $currentTemp, $refkey, $subkey, $subparams,$endPoint, $superIndex,$subsuperIndex);
                                   break;
                               case  'type':
                                   $this->setendpointParameters($primaryIndex, $currentTemp, $refkey, $subkey, $subparams,$endPoint, $superIndex,$subsuperIndex);
                                   break;
                               case  'enum':
                                   $subparams = array_map('strtolower', $subparams);
                                   $this->setendpointParameters($primaryIndex, $currentTemp, $refkey, $subkey, $subparams,$endPoint, $superIndex,$subsuperIndex);
                                   break;
                               case  'items':
                                   $this->setendpointParameters($primaryIndex, $currentTemp, $refkey, $subkey, $subparams,$endPoint, $superIndex,$subsuperIndex);
                                   break;
                            }
                           
                        }
                    }
                }
            }
        }
    }
}

/*
 * 
 */
public function checkParamTypeCasting($schemavalue,$keyschema,$reqField) {
     foreach($schemavalue as $paramkey => $paramfield) {
               $this->getParamaExceptions($paramkey,$paramfield,$reqField,$keyschema);  
   
       }
}

/*
 * 
 */
public function checkValidationSchemaGetData($params,$route,$req_type,$methname=null) {
    
    if(count($params)==0) {
        throw new Pdf4meException('The '.$methname . ' cannot be None');
    }
    $this->current_methodname = $methname;
   $schemaData = $this->setDataContractSchema($params, $route, $req_type)[$route];
   //echo "<pre>"; print_r($schemaData); exit();
   foreach ($schemaData as $keyschema => $schemavalue) {
            $schemaparam = isset($schemavalue['parameters'])?$schemavalue['parameters']:'';
            $param = isset($params[$keyschema])?$params[$keyschema]:'';
            if(isset($schemavalue['parameters'])) {
            if(($param=='')) {
               $this->setRequiredValidate($schemavalue['parameters'],$keyschema); 
               continue;
            }
            $this->checkParamTypeCasting($schemaparam,$keyschema,$param);
            }
            elseif(!isset($schemavalue['parameters'])) {
               
                $this->getsubContracts($schemavalue, $params, $keyschema);
            }
   }
}

/*

*/
public function checkParamConditionValidate($params,$methname,$customtext='') {
    
    if($methname=='merge') {
       if(!(isset($params['documents'][0]))||(count($params['documents'])<2)) {
        throw new Pdf4meException('The merge documents must contain at least two documents');
       }
    }
    
    if($methname=='stamp') {
        if(!(isset($params['stampAction']['text']))&&(!(isset($params['stampAction']['image'])))) {
            throw new Pdf4meException('The image and text parameter of stampAction cannot both be None.');
           }
    }

    if($methname=='optimize') {
        if($customtext=='optimizeAction.useProfile') {
            throw new Pdf4meException('The '.$customtext.' must be set to true');
        }
    }

    if($methname=='split') {
        if($customtext=='splitAction.splitAfterPage') {
            throw new Pdf4meException('The '.$customtext.' cannot be zero');
        }
    }

    if($methname=='convertToPdf') {
        if(!(isset($params['document']['name']))) {
            throw new Pdf4meException('The document.name cannot be none');
        }
    }


}
}
