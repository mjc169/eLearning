<?php

/**
 * This is the model class for table "tbl_class_assignment".
 *
 * The followings are the available columns in table 'tbl_class_assignment':
 * @property integer $id
 * @property integer $subject_id
 * @property integer $student_id
 * @property integer $teacher_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Account $student
 * @property Account $teacher
 * @property Subject $subject
 */
class ClassAssignment extends CActiveRecord
{
	private $oldAttributeValues;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_class_assignment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subject_id, student_id, teacher_id', 'required'),
			array('subject_id, student_id', 'checkUniqueness'), // Custom rule
			array('subject_id, student_id, teacher_id, status', 'numerical', 'integerOnly' => true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, subject_id, student_id, teacher_id, status', 'safe', 'on' => 'search'),
		);
	}

	public function checkUniqueness($attribute, $params)
	{
		$criteria = new CDbCriteria;
		$criteria->addInCondition('subject_id', array($this->subject_id));
		$criteria->addInCondition('student_id', array($this->student_id));
		$model = self::model()->find($criteria);

		if ($model !== null && ($model->getIsNewRecord() === false ||
			($this->{$attribute} !== $this->oldAttributeValues[$attribute]))) {


			if ($model !== null && $model->teacher_id !== $this->teacher_id) {
				$this->addError('subject_id', 'The student has already been assigned to this subject on another Teacher');
			} else {
				$this->addError('subject_id', 'You have already assigned the student to your selected subject');
			}
		}
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'student' => array(self::BELONGS_TO, 'Account', 'student_id'),
			'teacher' => array(self::BELONGS_TO, 'Account', 'teacher_id'),
			'subject' => array(self::BELONGS_TO, 'Subject', 'subject_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'subject_id' => 'Subject',
			'student_id' => 'Student',
			'teacher_id' => 'Teacher',
			'status' => 'Status',
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
		$criteria->compare('subject_id', $this->subject_id);
		$criteria->compare('student_id', $this->student_id);
		$criteria->compare('teacher_id', $this->teacher_id);
		$criteria->compare('status', $this->status);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ClassAssignment the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function getStatusLabel()
	{
		return $this->status === 1 ? 'Active' : 'Inactive';
	}

	public static function listBySubjectAndNumberOfStudents($teacher_id): array
	{
		$models = self::model()->findAll(array(
			'condition' => 'teacher_id = :teacher_id',
			'params' => array(':teacher_id' => $teacher_id),
		));
		/** might need add checking of `status` in the criteria */

		$groupBySubjects = array();
		foreach ($models as $model) {
			$groupBySubjects[$model->subject->id]['subject'] = $model->subject;
			$groupBySubjects[$model->subject->id]['students'][] = $model->student;
		}

		return $groupBySubjects;
	}

	public static function teacherClassSubjects($teacher_id): array
	{
		$groupBySubjects = self::listBySubjectAndNumberOfStudents($teacher_id);

		$subjects = [];
		foreach ($groupBySubjects as $groupBySubject) {
			$subject = $groupBySubject['subject'];
			$subjects[$subject->id] = $subject->subject;
		}

		return $subjects;
	}

	public static function listOfStudents(array $students): string
	{
		$names = [];
		foreach ($students as $account) {
			$names[] = $account->getFullName("[Admin]:" . $account->username);
		}

		return implode(', ', $names);
	}
}
