<?php

/**
 * This is the model class for table "tbl_quiz".
 *
 * The followings are the available columns in table 'tbl_quiz':
 * @property integer $id
 * @property string $title
 * @property string $instructions
 * @property integer $time_limit
 * @property integer $shuffle
 * @property integer $limit_to_one
 * @property integer $lock_question
 * @property string $due_date
 * @property string $availability_date
 * @property string $lock_date
 */
class Quiz extends CActiveRecord
{
	public $questions;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_quiz';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subject_id, title, instructions, time_limit, shuffle, limit_to_one, due_date, availability_date, lock_date', 'required'),
			array('subject_id, time_limit, shuffle, limit_to_one, lock_question', 'numerical', 'integerOnly' => true),
			array('title', 'length', 'max' => 255),
			array('questions', 'validateTos'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, subject_id, title, instructions, time_limit, shuffle, limit_to_one, lock_question, due_date, availability_date, lock_date', 'safe', 'on' => 'search'),
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
			'quizQuestions' => array(self::HAS_MANY, 'QuizQuestion', 'quiz_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'instructions' => 'Instructions',
			'time_limit' => 'Time Limit',
			'shuffle' => 'Shuffle',
			'limit_to_one' => 'Limit To One',
			'lock_question' => 'Lock Question',
			'due_date' => 'Due Date',
			'availability_date' => 'Availability Date',
			'lock_date' => 'Lock Date',
			'questions' => 'Quiz Question Competency & Taxonomy'
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
		$criteria->compare('title', $this->title, true);
		$criteria->compare('instructions', $this->instructions, true);
		$criteria->compare('time_limit', $this->time_limit);
		$criteria->compare('shuffle', $this->shuffle);
		$criteria->compare('limit_to_one', $this->limit_to_one);
		$criteria->compare('lock_question', $this->lock_question);
		$criteria->compare('due_date', $this->due_date, true);
		$criteria->compare('availability_date', $this->availability_date, true);
		$criteria->compare('lock_date', $this->lock_date, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Quiz the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	// Custom validation for choices
	public function validateTos($attribute, $params, $isSave = false)
	{
		//check if there is less than 2 choices
		$questionsCtr = 0;

		if ($isSave === false) {
			foreach ($this->questions as $question) {
				if ($question['competency'] !== "" && $question['taxonomy'] !== "" && $question['questionNo'] !== "")
					$questionsCtr++;
			}

			if ($questionsCtr < 1) {
				$this->addError('questions', "Must have atleast 1 Question with Competency, Taxonomy, and No. of Questions");
				return;
			}

			return; // early return for validation only
		}


		//check if choices properties are valid

		foreach ($this->questions as $requestTos) {

			//skip blank choices if they are not a model yet
			if ($requestTos['competency'] === "" || $requestTos['taxonomy'] === "" || $requestTos['questionNo'] === "") {
				continue;
			}

			$quizTos = new QuizTos;
			if (!empty($requestTos['id'])) {
				$quizTos = QuizTos::model()->findByPk($requestTos['id']);
			}

			$quizTos->quiz_id = $this->id;
			$quizTos->subject_competency_id = $requestTos['competency'];
			$quizTos->question_taxonomy_id = $requestTos['taxonomy'];
			$quizTos->no_of_questions = $requestTos['questionNo'];
			$quizTos->points = 1; //set to 1 for now

			$valid = $quizTos->validate();

			if (!$valid) {
				$errors = $quizTos->getErrors();

				// Loop through each attribute and its errors
				foreach ($errors as $attribute => $attributeErrors) {
					foreach ($attributeErrors as $error) {
						//$this->addError('questions', $error);
						print_r($error);
						exit;
					}
				};
			} else {
				$quizTos->save(false);
			}
		}
	}

	public function afterFind()
	{
		/** walang after find kasi hindi naman na-ssave ung INPUT for competency and taxonomy for now */
		//foreach ($this->quizQuestions as $quizQuestion) {
		//}
		$existingChoicesCount = 0;

		for ($x = $existingChoicesCount; $x < 10; $x++) {
			$this->questions[] =  [
				'id' => "",
				'competency' => "",
				'taxonomy' => "",
				'questionNo' => "1",
				'point' => "1",
			];
		}

		return parent::afterFind();
	}
}
