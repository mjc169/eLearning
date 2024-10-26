<?php

/**
 * This is the model class for table "tbl_subject_competency".
 *
 * The followings are the available columns in table 'tbl_subject_competency':
 * @property integer $id
 * @property integer $subject_id
 * @property string $learning_competency
 * @property integer $status
 */
class SubjectCompetency extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_subject_competency';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subject_id, learning_competency', 'required'),
			array('subject_id, status', 'numerical', 'integerOnly' => true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, subject_id, learning_competency, status', 'safe', 'on' => 'search'),
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
			'learning_competency' => 'Learning Competency',
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
		$criteria->compare('learning_competency', $this->learning_competency, true);
		$criteria->compare('status', $this->status);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SubjectCompetency the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public static function dataList($subject_id)
	{
		$models = self::model()->findAll(array(
			'condition' => 'subject_id = :subject_id',
			'params' => array(':subject_id' => $subject_id),
		));
		/** might need add checking of `status` in the criteria */

		$lookupOptions = array();
		foreach ($models as $item) {
			$lookupOptions[$item->id] = sprintf("[%s] - ", $item->subject->subject_code) . $item->learning_competency;
		}

		return $lookupOptions;
	}

	public function getStatusLabel()
	{
		return $this->status === 1 ? 'Active' : 'Inactive';
	}
}
