<?php

/**
 * This is the model class for table "tbl_teacher_subject".
 *
 * The followings are the available columns in table 'tbl_teacher_subject':
 * @property integer $id
 * @property integer $teacher_id
 * @property string $subject_id
 *
 * The followings are the available model relations:
 * @property Account $account
 */
class TeacherSubject extends CActiveRecord
{
	private $oldAttributeValues;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_teacher_subject';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('teacher_id, subject_id', 'required'),
			array('teacher_id, subject_id', 'checkUniqueness'), // Custom rule
			array('teacher_id, subject_id', 'numerical', 'integerOnly' => true),
			array('teacher_id, subject_id', 'length', 'max' => 255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, teacher_id, subject_id', 'safe', 'on' => 'search'),
		);
	}

	public function checkUniqueness($attribute, $params)
	{
		$criteria = new CDbCriteria;
		$criteria->addInCondition('teacher_id', array($this->teacher_id));
		$criteria->addInCondition('subject_id', array($this->subject_id));
		$model = self::model()->find($criteria);

		if ($model !== null && ($model->getIsNewRecord() === false ||
			($this->{$attribute} !== $this->oldAttributeValues[$attribute]))) {

			$this->addError('subject_id', 'You have already assigned this subject to the teacher.');
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
			'teacher_id' => 'Teacher',
			'subject_id' => 'Subject',
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
		$criteria->compare('teacher_id', $this->teacher_id);
		$criteria->compare('subject_id', $this->subject_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Teacher the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public static function dataList($teacher_id)
	{
		$models = self::model()->findAll(array(
			'condition' => 'teacher_id = :teacher_id',
			'params' => array(':teacher_id' => $teacher_id),
		));
		/** might need add checking of `status` in the criteria */

		$lookupOptions = array();
		foreach ($models as $item) {
			$lookupOptions[$item->subject_id] = sprintf("[%s] - ", $item->subject->subject_code) . $item->subject->subject;
		}

		return $lookupOptions;
	}
}
