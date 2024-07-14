<?php

/**
 * This is the model class for table "tbl_subject".
 *
 * The followings are the available columns in table 'tbl_subject':
 * @property integer $id
 * @property string $subject_code
 * @property string $subject
 * @property string $description
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property ClassAssignment[] $classAssignments
 */
class Subject extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_subject';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subject_code', 'unique'),
			array('subject_code, subject, description', 'required'),
			array('status', 'numerical', 'integerOnly' => true),
			array('subject_code', 'length', 'max' => 128),
			array('subject', 'length', 'max' => 255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, subject_code, subject, description, status', 'safe', 'on' => 'search'),
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
			'classAssignments' => array(self::HAS_MANY, 'ClassAssignment', 'subject_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'subject_code' => 'Subject Code',
			'subject' => 'Subject',
			'description' => 'Description',
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
		$criteria->compare('subject_code', $this->subject_code, true);
		$criteria->compare('subject', $this->subject, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('status', $this->status);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Subject the static model class
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

	public function getStatusLabel()
	{
		return $this->status === 1 ? 'Active' : 'Inactive';
	}
}
