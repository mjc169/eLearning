<?php

/**
 * This is the model class for table "tbl_year_level".
 *
 * The followings are the available columns in table 'tbl_year_level':
 * @property integer $id
 * @property string $year_level
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Student[] $students
 */
class YearLevel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_year_level';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('year_level', 'required'),
			array('status', 'numerical', 'integerOnly' => true),
			array('year_level', 'length', 'max' => 255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, year_level, status', 'safe', 'on' => 'search'),
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
			'students' => array(self::HAS_MANY, 'Student', 'year_level'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'year_level' => 'Year Level',
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
		$criteria->compare('year_level', $this->year_level, true);
		$criteria->compare('status', $this->status);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return YearLevel the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function getAllData()
	{
	}

	public static function dataList()
	{
		$models = self::model()->findAll(array(
			'order' => 'id ASC',
		));
		/** might need add checking of `status` in the criteria */

		$lookupOptions = array();
		foreach ($models as $item) {
			$lookupOptions[$item->id] = $item->year_level;
		}

		return $lookupOptions;
	}

	public function getStatusLabel()
	{
		return $this->status === 1 ? 'Active' : 'Inactive';
	}
}
