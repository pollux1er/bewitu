<?php

class MY_Form_validation extends CI_Form_validation
{
    private $_custom_field_errors = array();

    public function _execute($row, $rules, $postdata = NULL, $cycles = 0)
    {
        // Execute the parent method from CI_Form_validation.
        parent::_execute($row, $rules, $postdata, $cycles);

        // Override any error messages for the current field.
        if (isset($this->_error_array[$row['field']])
            && isset($this->_custom_field_errors[$row['field']]))
        {
            $message = str_replace(
                '%s',
                !empty($row['label']) ? $row['label'] : $row['field'],
                $this->_custom_field_errors[$row['field']]);

            $this->_error_array[$row['field']] = $message;
            $this->_field_data[$row['field']]['error'] = $message;
        }
    }

    public function set_rules($field, $label = '', $rules = '', $message = '')
    {
        $rules = parent::set_rules($field, $label, $rules);

        if (!empty($message))
        {
            $this->_custom_field_errors[$field] = $message;
        }

        return $rules;
    }
}

?>