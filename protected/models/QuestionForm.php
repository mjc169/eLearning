<?php 

class QuestionForm extends CFormModel {
    public $question;
    public $choices;
  
    // Define validation rules
    public function rules() {
      return array(
        // Required fields
        array('question, choices', 'required'),
        // Minimum number of choices
        array('choices', 'validateChoices'),
      );
    }
  
    // Custom validation for choices
    public function validateChoices($attribute, $params) {
      if (count($this->$attribute) < 2) {
        $this->addError($attribute, 'There must be at least two choices.');
      }
    }
  }