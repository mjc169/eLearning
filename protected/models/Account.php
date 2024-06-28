<?php

/**
 * This is the model class for table "tbl_account".
 *
 * The followings are the available columns in table 'tbl_account':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email_address
 * @property string $salt
 * @property integer $account_type
 * @property integer $status
 * @property string $date_created
 * @property string $date_updated
 *
 * The followings are the available model relations:
 * @property ClassAssignment[] $classAssignments
 * @property ClassAssignment[] $classAssignments1
 * @property File[] $files
 * @property FileAssignment[] $fileAssignments
 * @property Student[] $students
 * @property Teacher[] $teachers
 */
class Account extends CActiveRecord
{
	const ACCOUNT_TYPE_ADMIN = 1;
	const ACCOUNT_TYPE_TEACHER = 2;
	const ACCOUNT_TYPE_STUDENT = 3;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_account';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, email_address', 'unique'),
			array('username, password, email_address, account_type', 'required'),
			array('account_type, status', 'numerical', 'integerOnly' => true),
			array('username, email_address', 'length', 'max' => 128),
			array('password, salt', 'length', 'max' => 255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, email_address, salt, account_type, status, date_created, date_updated', 'safe', 'on' => 'search'),
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
			'classAssignments' => array(self::HAS_MANY, 'ClassAssignment', 'student_id'),
			'classAssignments1' => array(self::HAS_MANY, 'ClassAssignment', 'teacher_id'),
			'files' => array(self::HAS_MANY, 'File', 'uploader_id'),
			'fileAssignments' => array(self::HAS_MANY, 'FileAssignment', 'receiver_id'),
			'students' => array(self::HAS_MANY, 'Student', 'account_id'),
			'teachers' => array(self::HAS_MANY, 'Teacher', 'account_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'email_address' => 'Email Address',
			'salt' => 'Salt',
			'account_type' => 'Account Type',
			'status' => 'Status',
			'date_created' => 'Date Created',
			'date_updated' => 'Date Updated',
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
		$criteria->compare('username', $this->username, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('email_address', $this->email_address, true);
		$criteria->compare('salt', $this->salt, true);
		$criteria->compare('account_type', $this->account_type);
		$criteria->compare('status', $this->status);
		$criteria->compare('date_created', $this->date_created, true);
		$criteria->compare('date_updated', $this->date_updated, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Account the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave()
	{
		if ($this->isNewRecord)
			$this->date_created = date('Y-m-d H:i:s');

		$this->date_updated = date('Y-m-d H:i:s');

		return parent::beforeSave();
	}

	public function isAccountType(int $account_type): bool
	{
		return (int)$this->account_type === $account_type;
	}

	public static function generateRandomStringWithUniqid(int $length = 10): string
	{
		// Generate a unique ID with more entropy (true argument)
		$uniqId = uniqid('', true);

		// Extract and return the first 10 characters
		return substr($uniqId, 0, $length);
	}

	public function getAccountTypeLabel()
	{
		if ($this->account_type === self::ACCOUNT_TYPE_ADMIN)
			return 'Admin';

		if ($this->account_type === self::ACCOUNT_TYPE_TEACHER)
			return 'Teacher';

		if ($this->account_type === self::ACCOUNT_TYPE_STUDENT)
			return 'Student';
	}

	public function getStatusLabel()
	{
		return $this->status === 1 ? 'Active' : 'Inactive';
	}
}
