<?php

namespace Pdf4me\API\Traits\Schema;
use Pdf4me\API\Exceptions\Pdf4meException;


/**
 * Trait ResourceName
 * */
trait PdfDataContractValidate {

    use PdfSchema;
    /**
     * Appends the prefix to resource names
     * @return string
     */
    protected function checkValidationSchemaData($params,$route, $req_type, $currentSchema = null) {
         $schemaData = $this->setDataContractSchema($params, $route, $req_type)[$route];
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
    
    public function hasKey($indexkey, $keyschema, $subkeyparam, $params, $superIndex = null, $primarysuperIndex = null) {
        
        if($primarysuperIndex!='') {
            return isset($params[$primarysuperIndex][$superIndex][$indexkey][$keyschema][$subkeyparam]) ? $params[$primarysuperIndex][$superIndex][$indexkey][$keyschema][$subkeyparam] : null;
        }
        elseif($superIndex!='') {
            return isset($params[$superIndex][$indexkey][$keyschema][$subkeyparam]) ? $params[$superIndex][$indexkey][$keyschema][$subkeyparam] : null;
        }
        elseif (($indexkey == '') && ($subkeyparam == 'required')) {
            
                        return isset($params[$keyschema]) ? $params[$keyschema] : null;
        } 
        elseif($subkeyparam == 'required') {
            return isset($params[$indexkey][$keyschema]) ? $params[$indexkey][$keyschema] : 4;
        }
        elseif ($indexkey == '') {
            
            if(!(isset($params[$keyschema][$subkeyparam]))&&(isset($params[$keyschema]))&&(is_array($params[$keyschema]))) {
             
                foreach($params[$keyschema] as $keyparam=>$paramvalues) {
                   
                    if(isset($paramvalues[$subkeyparam])) {
                       
                        return $paramvalues[$subkeyparam];
                    }
                    else {
                       
                        return ($subkeyparam===$keyparam)?$paramvalues:null;
                    }
                    
                }
            }
            else
             return isset($params[$keyschema][$subkeyparam]) ? $params[$keyschema][$subkeyparam] : null;
        }
        else {
            
                        return isset($params[$indexkey][$keyschema][$subkeyparam]) ? $params[$indexkey][$keyschema][$subkeyparam] : null;
                    }
    }

    public function setRequiredValidate($subparamvalue,$keyschema, $indexkey = null,$subkeyparam=null) {
 
        
        if ((isset($subparamvalue['required'])&&($subparamvalue['required'] == 1)) || ((isset($keyschema['required'])) && $keyschema['required'] == 1)) {
            $customText = ($indexkey!='')?$indexkey.'.'.$keyschema:($subkeyparam!='')?$keyschema.'.'.$subkeyparam:$keyschema;
            //$this->setRequiredValidateSubFeild($subparamvalue,$customText);
            throw new Pdf4meException('The '.$customText. ' cannot be none');
        }
    }
    
    public function setRequiredValidateSubFeild($subparamvalue,$customText) {
        foreach($subparamvalue as $subreqkey => $subreqvalue) {
                if((is_array($subreqvalue))&&(isset($subreqvalue['required']))) {
                    throw new Pdf4meException('The '.$customText.'.'.$subreqkey. ' cannot be none');
                } 
            }
    }
    
    /*
     * get reference schema for multiple index
     */
    public function getRefMultiSchema($subparamvalue, $params, $subkeyparam, $keyschema,$indexkey,$superIndex,$primarysuperIndex) {
           if($primarysuperIndex!='')
                 { 
                     
                    $isParamExit = $this->hasKey($indexkey, $keyschema, $subkeyparam, $params, $superIndex,$primarysuperIndex); 
                    $this->getsubContracts($subparamvalue, $params, $subkeyparam, $keyschema,$indexkey,$superIndex,$primarysuperIndex);
                 }
                 elseif($superIndex!='') {
                     
                     $isParamExit = $this->hasKey($indexkey, $keyschema, $subkeyparam, $params, $superIndex);
                 
                     if (is_array($isParamExit)) {
                         
                         $this->getsubContracts($subparamvalue, $params, $subkeyparam, $keyschema,$indexkey,$superIndex);
      
                    }
                 }
                 else {
                   $isParamExit = $this->hasKey($indexkey, $keyschema, $subkeyparam, $params);
                 
                    
                   if (is_array($isParamExit)) {
                        
                        $this->getsubContracts($subparamvalue, $params, $subkeyparam, $keyschema,$indexkey);
                        
                    }
                    elseif ($isParamExit!=null) {
                        
                         
                        $this->getsubContracts($subparamvalue, $params, $subkeyparam, $keyschema);
                        
                    } else {
                        
                        $this->setRequiredValidate($subparamvalue,$keyschema,'',$subkeyparam);
                        
                    }
                }
    }
    
    /*
     * check if required
     */
    public function checkIfRequired($isParamExit,$schemavalue,  $keyschema, $indexkey = null) {
        if ($isParamExit == null) {
                    $this->setRequiredValidate($schemavalue,$keyschema, $indexkey);
                    }
    }

    /*
     * get the schema with reference
     */
    public function getsubContracts($schemavalue, &$params, $keyschema, $indexkey = null, $superIndex = '',$primarysuperIndex='') {
        
        if (is_array($schemavalue)) {
            foreach ($schemavalue as $subkeyparam => $subparamvalue) {
                
                if (is_array($subparamvalue) && (!isset($subparamvalue['parameters']))) {
                 
                $this->getRefMultiSchema($subparamvalue, $params, $subkeyparam, $keyschema,$indexkey,$superIndex,$primarysuperIndex);    
                 
                } 
                elseif (($subkeyparam=='required') && ($subparamvalue == 1)) {
                    $isParamExit = $this->hasKey($indexkey, $keyschema, $subkeyparam, $params, $superIndex,$primarysuperIndex);
                    $this->checkIfRequired($isParamExit,$schemavalue,  $keyschema, $indexkey);
                    
                    
                    }
                else {
               
                    $isParamExit = $this->hasKey($indexkey, $keyschema, $subkeyparam, $params, $superIndex,$primarysuperIndex);
                    
                   
                    if (isset($subparamvalue['required'])&&($isParamExit == '')) {
                        $customText = $keyschema.'.'.$subkeyparam;    
                        $this->checkParamConditionValidate($params, $this->current_methodname, $customText);
                        throw new Pdf4meException('The '.$customText. ' cannot be none');
                        }
                       
                    foreach ($subparamvalue['parameters'] as $keyfield => $fieldvalue) {
                       
                        if (($keyfield == 'required')&&($isParamExit == '')) {
                            throw new Pdf4meException('The '.$fieldvalue . ' cannot be none');
                        }
                        
                        if ($isParamExit != '') {
                           
                            $this->getParamaExceptions($keyfield,$fieldvalue,$isParamExit,$subkeyparam,$keyschema);
                            

                        }
                    }
                }
            }
        }
    }
    
    public function getParamaExceptions($keyfield,$fieldvalue,$isParamExit,$subkeyparam,$keyschema=null) {

        switch ($keyfield) {
                                case 'type':
                                   
                                    if(($fieldvalue == 'integer')&&(!is_numeric($isParamExit))) {
                                        throw new Pdf4meException($keyschema.'.'.$subkeyparam . ' only allows integer values');
                                    }
                                    if(($fieldvalue == 'string')&&(!is_string($isParamExit))) {
                                        throw new Pdf4meException($keyschema.'.'.$subkeyparam . ' only allows string values');
                                    }                                  
                                    if(($fieldvalue == 'upload')&&(!file_exists($isParamExit))) {
                                        throw new Pdf4meException('File ' . $isParamExit . ' could not be found');
                                    }
                                   break;
                                case 'enum':
                                  
                                    if (!in_array(strtolower($isParamExit), $fieldvalue)) {
                                    throw new Pdf4meException($keyschema.'.'.$subkeyparam . ' only allows these values'.json_encode($fieldvalue));
                                }
                                break;
                                case 'items':
                                    
                                    if(count($isParamExit)==0) {
                                        throw new Pdf4meException($keyschema.'.'.$subkeyparam . ' cannot be empty'); 
                                    }
                                    if(($fieldvalue['type'] == 'integer')&& (!array_map("is_numeric", $isParamExit))) {
                                       throw new Pdf4meException($keyschema.'.'.$subkeyparam . ' only allows integer values'); 
                                    }
                                    if(($fieldvalue['type'] == 'string')&&(!array_map("is_string", $isParamExit))) {
                                       throw new Pdf4meException($keyschema.'.'.$subkeyparam . ' only allows string values'); 
                                    }
//                                    if(($fieldvalue == 'boolean')&&($isParamExit!='true'||$isParamExit!='false')) {
//                                        throw new Pdf4meException($subkeyparam . ' only allows boolean values');
//                                    }
                                    
                                    if((isset($fieldvalue['enum']))&& !in_array(implode(',', array_map("strtolower", $isParamExit)), array_map("strtolower",$fieldvalue['enum']))) {
                                        throw new Pdf4meException($keyschema.'.'.$subkeyparam . ' only allows these values'.json_encode(array_map("strtolower",$fieldvalue['enum'])));
                                    }
                                break;    
                            }
    }

}
