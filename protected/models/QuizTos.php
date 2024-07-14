<?php

/**
 * This is the model class for table "tbl_quiz_tos".
 *
 * The followings are the available columns in table 'tbl_quiz_tos':
 * @property integer $id
 * @property integer $quiz_id
 * @property integer $subject_competency_id
 * @property integer $question_taxonomy_id
 * @property integer $no_of_questions
 * @property integer $points
 */
class QuizTos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_quiz_tos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('quiz_id, subject_competency_id, question_taxonomy_id, no_of_questions, points', 'required'),
			array('quiz_id, subject_competency_id, question_taxonomy_id, no_of_questions, points', 'numerical', 'integerOnly' => true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, quiz_id, subject_competency_id, question_taxonomy_id, no_of_questions, points', 'safe', 'on' => 'search'),
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
			'quiz' => array(self::BELONGS_TO, 'Quiz', 'quiz_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'quiz_id' => 'Quiz',
			'subject_competency_id' => 'Subject Competency',
			'question_taxonomy_id' => 'Question Taxonomy',
			'no_of_questions' => 'No of Questions',
			'points' => 'Points',
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
		$criteria->compare('quiz_id', $this->quiz_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return QuestionChoice the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}
