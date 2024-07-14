<?php

/**
 * This is the model class for table "tbl_student".
 *
 * The followings are the available columns in table 'tbl_student':
 * @property integer $id
 * @property integer $account_id
 * @property string $lastname
 * @property string $firstname
 * @property string $middlename
 * @property integer $gender
 * @property integer $year_level
 * @property integer $section
 *
 * The followings are the available model relations:
 * @property Account $account
 * @property Section $section0
 * @property YearLevel $yearLevel
 */
class Student extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lastname, firstname, gender, year_level, section', 'required'),
			array('account_id, gender, year_level, section', 'numerical', 'integerOnly' => true),
			array('lastname, firstname, middlename', 'length', 'max' => 255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, account_id, lastname, firstname, middlename, gender, year_level, section', 'safe', 'on' => 'search'),
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
			'account' => array(self::BELONGS_TO, 'Account', 'account_id'),
			'section0' => array(self::BELONGS_TO, 'Section', 'section'),
			'yearLevel' => array(self::BELONGS_TO, 'YearLevel', 'year_level'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'account_id' => 'Account',
			'lastname' => 'Lastname',
			'firstname' => 'Firstname',
			'middlename' => 'Middlename',
			'gender' => 'Gender',
			'year_level' => 'Year Level',
			'section' => 'Section',
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
		$criteria->compare('account_id', $this->account_id);
		$criteria->compare('lastname', $this->lastname, true);
		$criteria->compare('firstname', $this->firstname, true);
		$criteria->compare('middlename', $this->middlename, true);
		$criteria->compare('gender', $this->gender);
		$criteria->compare('year_level', $this->year_level);
		$criteria->compare('section', $this->section);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Student the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public static function dataList()
	{
		$models = self::model()->findAll();
		/** might need add checking of `status` in the criteria */

		$lookupOptions = array();
		foreach ($models as $item) {
			$lookupOptions[$item->id] = "[$item->subject_code] $item->subject - $item->description";
		}

		return $lookupOptions;
	}
}
