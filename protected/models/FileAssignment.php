<?php

/**
 * This is the model class for table "tbl_file_assignment".
 *
 * The followings are the available columns in table 'tbl_file_assignment':
 * @property integer $id
 * @property integer $file_id
 * @property integer $receiver_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Account $receiver
 * @property File $file
 */
class FileAssignment extends CActiveRecord
{
	public $teacher_class_subject_id;

	private $oldAttributeValues;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_file_assignment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('file_id', 'required'),
			array('receiver_id, teacher_class_subject_id', 'eitherRequired'),
			array('file_id, receiver_id', 'checkUniqueness'), // Custom rule
			array('file_id, receiver_id, teacher_class_subject_id, status', 'numerical', 'integerOnly' => true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, file_id, receiver_id, status', 'safe', 'on' => 'search'),
		);
	}

	public function eitherRequired($attribute, $params)
	{
		if (empty($this->receiver_id) && empty($this->teacher_class_subject_id)) {
			$this->addError($attribute, 'At least one of Receiver or Teacher class must be filled.');
		}
	}

	public function checkUniqueness($attribute, $params)
	{
		if (empty($this->receiver_id) && !empty($this->teacher_class_subject_id))
			return;

		$criteria = new CDbCriteria;
		$criteria->addInCondition('file_id', array($this->file_id));
		$criteria->addInCondition('receiver_id', array($this->receiver_id));
		$model = self::model()->find($criteria);

		if ($model !== null && ($model->getIsNewRecord() === false ||
			($this->{$attribute} !== $this->oldAttributeValues[$attribute]))) {
			$this->addError('file_id', 'You have already shared the file to the user');
		}
	}

	protected function afterFind()
	{
		parent::afterFind();
		$this->oldAttributeValues = $this->attributes; // Store original values (this is important for `checkUniqueness` to work)
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'receiver' => array(self::BELONGS_TO, 'Account', 'receiver_id'),
			'file' => array(self::BELONGS_TO, 'File', 'file_id'),
		);
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'file_id' => 'File',
			'receiver_id' => 'Receiver',
			'status' => 'Status',
			'teacher_class_subject_id' => 'Teacher Classes',
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
		$criteria->compare('file_id', $this->file_id);
		$criteria->compare('receiver_id', $this->receiver_id);
		$criteria->compare('status', $this->status);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FileAssignment the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function getStatusLabel()
	{
		return $this->status === 1 ? 'Active' : 'Inactive';
	}


	public static function listOfReceivers($file_id): string
	{
		$criteria = new CDbCriteria();
		$criteria->compare('file_id', $file_id);

		$models = self::model()->findAll($criteria);

		$names = [];
		foreach ($models as $model) {
			$names[] = $model->receiver->getFullName("[Admin]:" . $model->receiver->username);
		}

		return implode(', ', $names);
	}
}
