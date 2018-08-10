<?php

namespace Pdf4me\API\Traits\Schema;
use Pdf4me\API\Exceptions\CustomException;


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
        //echo "<pre>".$subkeyparam;
        //is_array($params); exit();
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
              // echo "<pre>"; print_r($params[$keyschema]); exit();
                foreach($params[$keyschema] as $keyparam=>$paramvalues) {
                   // echo "<pre>".$subkeyparam."---".$keyparam."$$$".'';
                    if(isset($paramvalues[$subkeyparam])) {
                       // echo "aa".$paramvalues[$subkeyparam]; 
                        return $paramvalues[$subkeyparam];
                    }
                    else {
                        //echo "qq".$subkeyparam."%%%".$keyparam;
                        //echo "<pre>".$subkeyparam;print_r($keyparam); exit();
                        return ($subkeyparam===$keyparam)?$paramvalues:null;
                    }
                    //echo "<pre>";print_r($paramvalues); exit();
                    //return isset($paramvalues[$subkeyparam]) ? $paramvalues[$subkeyparam] : null;
                }
            }
            else
             return isset($params[$keyschema][$subkeyparam]) ? $params[$keyschema][$subkeyparam] : null;
        }
        else {
            
                        return isset($params[$indexkey][$keyschema][$subkeyparam]) ? $params[$indexkey][$keyschema][$subkeyparam] : null;
                    }
    }

    public function setRequiredValidate($subparamvalue,$keyschema) {
       // echo "<pre>"; print_r($keyschema);
        if ((isset($subparamvalue['required'])&&($subparamvalue['required'] == 1)) || ((isset($keyschema['required'])) && $keyschema['required'] == 1)) {
            throw new CustomException('The '.$keyschema . ' cannot be None');
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
                        $this->setRequiredValidate($subparamvalue,$keyschema);
                        
                    }
                }
    }
    
    /*
     * check if required
     */
    public function checkIfRequired($isParamExit,$schemavalue,  $keyschema) {
        if ($isParamExit == null) {
            //echo "q111";
            //echo "<pre>"; print_r($keyschema);
                    $this->setRequiredValidate($schemavalue,$keyschema);
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
                    $this->checkIfRequired($isParamExit,$schemavalue,  $keyschema);
                    
                    
                    }
                else {
               
                    $isParamExit = $this->hasKey($indexkey, $keyschema, $subkeyparam, $params, $superIndex,$primarysuperIndex);
                    
                   // echo "index->".$indexkey."keyschema->".$keyschema."subkeyparam->".$subkeyparam."superIndex->".$superIndex."primarysuperIndex->".$primarysuperIndex; 
                    if (isset($subparamvalue['required'])&&($isParamExit == '')) {
                         
                            throw new CustomException('The '.$keyschema.'.'.$subkeyparam . ' cannot be None');
                        }
                       
                    foreach ($subparamvalue['parameters'] as $keyfield => $fieldvalue) {
                       
                        if (($keyfield == 'required')&&($isParamExit == '')) {
                            throw new CustomException('The '.$fieldvalue . ' cannot be None');
                        }
                        
                        if ($isParamExit != '') {
                            //echo "jjjjj".$keyschema."aaa".$subkeyparam;
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
                                        throw new CustomException($keyschema.'.'.$subkeyparam . ' only allows integer values');
                                    }
                                    if(($fieldvalue == 'string')&&(!is_string($isParamExit))) {
                                        throw new CustomException($keyschema.'.'.$subkeyparam . ' only allows string values');
                                    }                                  
                                    if(($fieldvalue == 'upload')&&(!file_exists($isParamExit))) {
                                        throw new CustomException('File ' . $isParamExit . ' could not be found');
                                    }
                                   break;
                                case 'enum':
                                   // echo "<pre>";print_r($isParamExit; exit();
                                    if (!in_array(strtolower($isParamExit), $fieldvalue)) {
                                    throw new CustomException($keyschema.'.'.$subkeyparam . ' only allows these values'.json_encode($fieldvalue));
                                }
                                break;
                                case 'items':
                                    //echo "<pre>".$subkeyparam."--".$keyfield; print_r($isParamExit[0]);
                                    //exit();
                                    if(count($isParamExit)==0) {
                                        throw new CustomException($keyschema.'.'.$subkeyparam . ' cannot be empty'); 
                                    }
                                    if(($fieldvalue['type'] == 'integer')&& (!array_map("is_numeric", $isParamExit))) {
                                       throw new CustomException($keyschema.'.'.$subkeyparam . ' only allows integer values'); 
                                    }
                                    if(($fieldvalue['type'] == 'string')&&(!array_map("is_string", $isParamExit))) {
                                       throw new CustomException($keyschema.'.'.$subkeyparam . ' only allows string values'); 
                                    }
//                                    if(($fieldvalue == 'boolean')&&($isParamExit!='true'||$isParamExit!='false')) {
//                                        throw new CustomException($subkeyparam . ' only allows boolean values');
//                                    }
                                    
                                    if((isset($fieldvalue['enum']))&& !in_array(implode(',', array_map("strtolower", $isParamExit)), array_map("strtolower",$fieldvalue['enum']))) {
                                        throw new CustomException($keyschema.'.'.$subkeyparam . ' only allows these values'.json_encode(array_map("strtolower",$fieldvalue['enum'])));
                                    }
                                break;    
                            }
    }

}
