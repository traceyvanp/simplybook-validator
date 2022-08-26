<?php


class ExternalValidatorException extends Exception {

    protected $_intakeFieldId = null;
    protected $_fieldId = null;
    protected $_data = array();


    /**
     * @return null|string
     * @return self
     */
    public function getIntakeFieldId(){
        return $this->_intakeFieldId;
    }

    /**
     * @return null
     */
    public function getFieldId(){
        return $this->_fieldId;
    }
}

?>