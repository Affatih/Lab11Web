<?php 
// File: class/Form.php
class Form 
{ 
    private $fields = array(); 
    private $action; 
    private $submit = "Submit Form"; 
    private $jumField = 0; 

    public function __construct($action, $submit) 
    { 
        $this->action = $action; 
        $this->submit = $submit; 
    } 

    public function displayForm() 
    { 
        echo "<form action='" . $this->action . "' method='POST'>"; 
        echo '<table class="form-table" width="100%" border="0">'; 

        foreach ($this->fields as $field) { 
            echo "<tr><td class='label-col'>" . $field['label'] . "</td>"; 
            echo "<td>"; 

            switch ($field['type']) { 
                
                case 'textarea': 
                    echo "<textarea name='" . $field['name'] . "' cols='30' rows='4'></textarea>"; 
                    break; 

                case 'select': 
                    echo "<select name='" . $field['name'] . "'>"; 
                    foreach ($field['options'] as $value => $label) { 
                        echo "<option value='" . $value . "'>" . $label . "</option>"; 
                    } 
                    echo "</select>"; 
                    break; 
                
                // ... (Radio, Checkbox, Password, dll.)

                default: 
                    echo "<input type='text' name='" . $field['name'] . "'>"; 
                    break; 
            } 

            echo "</td></tr>"; 
        } 

        echo "<tr><td colspan='2' class='submit-col'><input type='submit' value='" . $this->submit . "'></td></tr>"; 
        echo "</table>"; 
        echo "</form>"; 
    } 

    public function addField($name, $label, $type = "text", $options = array()) 
    { 
        $this->fields[$this->jumField]['name']    = $name; 
        $this->fields[$this->jumField]['label']   = $label; 
        $this->fields[$this->jumField]['type']    = $type; 
        $this->fields[$this->jumField]['options'] = $options; 
        $this->jumField++; 
    } 
} 
?>