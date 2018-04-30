<?php

namespace Ynooxpdf4me\API\Traits\Schema;
use Ynooxpdf4me\API\Exceptions\CustomException;


/**
 * Trait ResourceName
 * */
trait PdfDataContractValidate {

    use PdfSchema;
    /**
     * Appends the prefix to resource names
     * @return string
     */
    protected function checkValidationSchemaData($params,$route, $currentSchema = null) {
         $schemaData = json_decode($this->getValidationSchemaData(), true)[$route];
        
        if (is_array($schemaData)) {
            foreach ($schemaData as $keyschema => $schemavalue) {
               
                if (array_key_exists($keyschema,$params)) {
                    $this->getsubContracts($schemavalue, $params, $keyschema);
                } else {
                    if ((isset($keyschema['required'])) && ($keyschema['required'] == 1)) {
                         throw new MissingParametersException();
                    }
                }
            }
            
        }
    }
    
    public function hasKey($indexkey, $keyschema, $subkeyparam, $params) {
        
        if ($indexkey == '') {
                        return isset($params[$keyschema][$subkeyparam]) ? $params[$keyschema][$subkeyparam] : null;
        } else {
                        return isset($params[$indexkey][$keyschema][$subkeyparam]) ? $params[$indexkey][$keyschema][$subkeyparam] : null;
                    }
    }

    public function setRequiredValidate($subparamvalue,$keyschema) {
        if ((isset($subparamvalue['required'])) || ((isset($keyschema['required'])) && $keyschema['required'] == 1)) {
            throw new CustomException($subkeyparam . 'field are required');
        }
    }

    public function getsubContracts($schemavalue, &$params, $keyschema, $indexkey = null) {

        if (is_array($schemavalue)) {

            foreach ($schemavalue as $subkeyparam => $subparamvalue) {

                if (is_array($subparamvalue) && (!isset($subparamvalue['parameters']))) {

                   $isParamExit = $this->hasKey($indexkey, $keyschema, $subkeyparam, $params);
                 
                    if ($isParamExit!=null) {
                         
                        $this->getsubContracts($subparamvalue, $params, $subkeyparam, $keyschema);
                        
                    } else {
                        
                        $this->setRequiredValidate($subparamvalue,$keyschema);
                        
                    }
                } else {
                    
                    $isParamExit = $this->hasKey($indexkey, $keyschema, $subkeyparam, $params);

                    foreach ($subparamvalue['parameters'] as $keyfield => $fieldvalue) {
                        //echo "<pre>"; print_r($keyfield); 
                        if ($keyfield == 'required') {
                            $datarequired = ($isParamExit == '') ? true : false;
                        }
                        
                        if ($isParamExit != '') {
                            $this->getParamaExceptions($keyfield,$fieldvalue,$isParamExit,$subkeyparam);
                            

                        }
                    }
                }
            }
        }
    }
    
    public function getParamaExceptions($keyfield,$fieldvalue,$isParamExit,$subkeyparam) {
        switch ($keyfield) {
                                case 'type':
                                   
                                    if(($fieldvalue == 'integer')&&(!is_numeric($isParamExit))) {
                                        throw new CustomException($subkeyparam . ' only allows integer values');
                                    }
                                    if(($fieldvalue == 'string')&&(!is_string($isParamExit))) {
                                        throw new CustomException($subkeyparam . ' only allows string values');
                                    }
                                    if(($fieldvalue == 'upload')&&(!file_exists($isParamExit))) {
                                        throw new CustomException('File ' . $subkeyparam . ' could not be found in ');
                                    }
                                   break;
                                case 'enum':
                                    
                                    if (!in_array($isParamExit, $fieldvalue)) {
                                    throw new CustomException($subkeyparam . ' only allows these values'.json_encode($fieldvalue));
                                }
                                break;
                                case 'items':
                                    if($fieldvalue['type'] == 'integer') {
                                       throw new CustomException($subkeyparam . ' only allows integer values'); 
                                    }
                                    if($fieldvalue['type'] == 'string') {
                                       throw new CustomException($subkeyparam . ' only allows string values'); 
                                    }
                                    
                                    if(isset($fieldvalue['enum'])) {
                                        throw new CustomException($subkeyparam . ' only allows these values'.json_encode($fieldvalue['enum']));
                                    }
                                break;    
                            }
    }

}
