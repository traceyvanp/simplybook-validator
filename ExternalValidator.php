<?php


class ExternalValidator {

    const PRODUCT_ERROR = 1;
    const INTAKE_FORM_UNKNOWN_CHECK = 2;

    protected $_errors = array(
        self::PRODUCT_ERROR => 'The number of hunt packages must be equal to or greater than the number of hunters in your party.',
        self::INTAKE_FORM_UNKNOWN_CHECK => '"Number of Hunters" field is missing.'
    );

    protected $_fieldsNameMap = array(
        'hunters_id' => '7008b1093d4364990ee9d7489967a0e3'
        //'checkNumber' => 'Check number',
        //'checkString' => 'Some string',
        //'dateOfBirth' => 'Date of birth',
    );

    public function validate($bookingData){
        try{
            $timeStart = microtime(true);
            $this->_log($bookingData);
            //return the value of the first intake field id converted to integer value.
            $numhuntersField = $this->_findField('hunters_id', $bookingData['additional_fields_values'], $this->_fieldsNameMap);
            //loop through the products array and return the sum of the product quantities.
            $products = $this->_sumproducts($bookingData);
            

            //Validate that the number of hunters is less than or equal to the sum of products, else return an error.
            if (intval($numhuntersField['value']) > $products) {
                $this->_error(self::PRODUCT_ERROR);
                return false; 
                }

            //log
            $timeEnd = microtime(true);
            $executionTime = $timeEnd - $timeStart;

            return array();
          
        } catch(ExternalValidatorException $e){ //validator Error
            return $this->_sendError($e);
        } catch (Exception $e){ // other error
            $result = array(
                'errors' => array($e->getMessage())
            );
            $this->_log($result);
            return $result;
        }
    }

    //function to return sum of quantity of products
    protected function _sumproducts($data) {
        $sum = 0;
        foreach($data['products'] as $elem) {
            $sum += intval(($elem['qty']));
        }
        return $sum;
    }

    protected function _findField($fieldKey, $addFields, $map){
        $mapType = 'field_name';

        if(isset($map[$fieldKey])) {
            $fieldName = $map[$fieldKey];

            foreach ($addFields as $additionalField) {
                if (strtolower(trim($additionalField[$mapType])) == strtolower(trim($fieldName))) {
                    return $additionalField;
                }
            }
        }
        return null;
    }


    /**
     * Generation error for output on the Simplybook.me booking page
     *
     * @param ExternalValidatorException $e
     * @return array[]|array[][]
     */
     protected function _sendError(ExternalValidatorException $e){
        if($e->getFieldId()){
            $result = array(
                array(
                    'id' => $e->getFieldId(),
                    'errors' => array($e->getMessage())
                )
            );
            $this->_log($result);
            return $result;
        }else if($e->getIntakeFieldId()){
            $result = array(
                'additional_fields' => array(
                    array(
                        'id' => $e->getIntakeFieldId(),
                        'errors' => array($e->getMessage())
                    )
                )
            );
            $this->_log($result);
            return $result;
        } else {
            $result = array(
                'errors' => array($e->getMessage())
            );
            $this->_log($result);
            return $result;
        }
    }
    
    /**
     * @param int $code
     * @param null|array $fieldId
     * @param null|array $intakeFieldId
     * @param null|array $data
     * @throws ExternalValidatorException
     */
     
    protected function _error($code, $fieldId = null, $intakeFieldId = null, $data = NULL) {
        $message = '';
        if (isset($this->_errors[$code])) {
            $message = $this->_errors[$code];
        }
        $this->_throwError($message, $code, $fieldId, $intakeFieldId, $data);
    }

    
    /** 
     * @param string $message
     * @param int $code
     * @param null|string $fieldId
     * @param array $data
     * @throws ExternalValidatorException
    */ 
    protected function _throwError($message, $code = -1, $fieldId = null, $intakeFieldId = null, $data = array()) {
        $error = new ExternalValidatorException($message, $code);
        if($fieldId){
            $error->setFieldId($fieldId);
        }
        if($intakeFieldId){
            $error->setIntakeFieldId($intakeFieldId);
        }
        if ($data && count($data)) {
            $error->setData($data);
        }
        throw $error;
    }
    

    /**
     * Log to file
     * @param $var
     * @param string $name
     */
    protected function _log($var, $name = 'log'){
        $bugtrace = debug_backtrace();
        $bugTraceIterator = 0;
        //dump var to string
        ob_start();
        var_dump( $var );
        $data = ob_get_clean();

        $logContent = "\n\n" .
            "--------------------------------\n" .
            date("d.m.Y H:i:s") . "\n" .
            "{$bugtrace[$bugTraceIterator]['file']} : {$bugtrace[$bugTraceIterator]['line']}\n\n" .
            $data . "\n" .
            "--------------------------------\n";

        $fh = fopen( $name . '.txt', 'a');
        fwrite($fh, $logContent);
        fclose($fh);
    }

}
?>
