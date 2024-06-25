<?php

/**
 * This is the model class for table "tbl_file".
 *
 * The followings are the available columns in table 'tbl_file':
 * @property integer $id
 * @property integer $uploader_id
 * @property string $original_filename
 * @property string $file_extension
 * @property string $e_filename
 * @property string $bvalue
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Account $uploader
 * @property FileAssignment[] $fileAssignments
 */
class File extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_file';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uploader_id, original_filename, file_extension, e_filename, bvalue', 'required'),
			array('uploader_id, status', 'numerical', 'integerOnly'=>true),
			array('original_filename, e_filename', 'length', 'max'=>255),
			array('file_extension', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, uploader_id, original_filename, file_extension, e_filename, bvalue, status', 'safe', 'on'=>'search'),
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
			'uploader' => array(self::BELONGS_TO, 'Account', 'uploader_id'),
			'fileAssignments' => array(self::HAS_MANY, 'FileAssignment', 'file_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'uploader_id' => 'Uploader',
			'original_filename' => 'Original Filename',
			'file_extension' => 'File Extension',
			'e_filename' => 'E Filename',
			'bvalue' => 'Bvalue',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('uploader_id',$this->uploader_id);
		$criteria->compare('original_filename',$this->original_filename,true);
		$criteria->compare('file_extension',$this->file_extension,true);
		$criteria->compare('e_filename',$this->e_filename,true);
		$criteria->compare('bvalue',$this->bvalue,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return File the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getShortenedBvalue(){
		$max_length = "50";
		$original_string = $this->bvalue;
		if (strlen($original_string) > $max_length) {
			return substr($original_string, 0, $max_length) . "...";
		} else {
			return $original_string;
		}
	}
}
