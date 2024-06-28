<?php

/**
 * This is the model class for table "tbl_question".
 *
 * The followings are the available columns in table 'tbl_question':
 * @property integer $id
 * @property string $question
 * @property integer $question_type
 * @property integer $file_id
 * @property integer $taxonomy_id
 * @property integer $competency_id
 * @property integer $status
 */
class Question extends CActiveRecord
{
	public $choices;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_question';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('question, taxonomy_id, competency_id', 'required'),
			array('question_type, file_id, taxonomy_id, competency_id, status', 'numerical', 'integerOnly' => true),
			array('choices', 'validateChoices'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, question, question_type, file_id, taxonomy_id, competency_id, status', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'questionChoices' => array(self::HAS_MANY, 'QuestionChoice', 'question_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'question' => 'Question',
			'question_type' => 'Question Type',
			'file_id' => 'File',
			'taxonomy_id' => 'Taxonomy',
			'competency_id' => 'Competency',
			'status' => 'Status',
			'choices' => 'Question Choices'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('question', $this->question, true);
		$criteria->compare('question_type', $this->question_type);
		$criteria->compare('file_id', $this->file_id);
		$criteria->compare('taxonomy_id', $this->taxonomy_id);
		$criteria->compare('competency_id', $this->competency_id);
		$criteria->compare('status', $this->status);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Question the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function getStatusLabel()
	{
		return $this->status === 1 ? 'Active' : 'Inactive';
	}

	// Custom validation for choices
	public function validateChoices($attribute, $params, $isSave = false)
	{
		//check if there is less than 2 choices
		$choicesCtr = 0;
		$hasCorrectChoices = false;

		foreach ($this->choices as $choice) {

			if ($choice['choice'] !== "")
				$choicesCtr++;

			if ($choice['is_correct'] == "1")
				$hasCorrectChoices = true;
		}

		if ($choicesCtr < 2 || !$hasCorrectChoices) {
			$this->addError('choices', "Must have atleast 2 choices and a correct answer");
			return;
		}

		//check if choices properties are valid
		foreach ($this->choices as $choice) {

			//skip blank choices if they are not a model yet
			if ($choice['choice'] === "" && empty($choice['id']))
				return;

			$questionChoice = new QuestionChoice;
			if (!empty($choice['id'])) {
				$questionChoice = QuestionChoice::model()->findByPk($choice['id']);
			}

			$questionChoice->attributes = $choice;

			$valid = $questionChoice->validate();

			if (!$valid) {
				$errors = $questionChoice->getErrors();

				// Loop through each attribute and its errors
				foreach ($errors as $attribute => $attributeErrors) {
					foreach ($attributeErrors as $error) {
						$this->addError('choices', $error);
					}
				};
			}

			if ($isSave === true) {

				$questionChoice->question_id = $this->id;
				$questionChoice->save(false);
			}
		}

		return;
	}

	public function afterFind()
	{
		foreach ($this->questionChoices as $questionChoice) {
			$this->choices[] =  [
				'id' => $questionChoice->id,
				'is_correct' => $questionChoice->is_correct,
				'choice' => $questionChoice->choice,
				'status' => $questionChoice->status,
			];
		}

		$existingChoicesCount = count($this->questionChoices);

		for ($x = $existingChoicesCount; $x < 4; $x++) {
			$this->choices[] =  [
				'id' => "",
				'is_correct' => 0,
				'choice' => "",
				'status' => 0,
			];
		}


		return parent::afterFind();
	}

	public static function questionTypeList()
	{
		return [
			1 => "Multiple Choice",
			2 => "True or False",
		];
	}
}
