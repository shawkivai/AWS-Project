<?php

/**
 * This is the model class for table "status".
 *
 * The followings are the available columns in table 'status':
 * @property integer $serial
 * @property integer $user_id
 * @property string $designation
 * @property string $privacy
 * @property string $share
 * @property string $status
 * @property string $image
 */
class Status extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'status';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, designation, privacy, share, status, image', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('designation, privacy, share, status, image', 'length', 'max'=>100),
            array('image', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('serial, user_id, designation, privacy, share, status, image', 'safe', 'on'=>'search'),

//            array('image', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update'),
//            array('title, image', 'length', 'max'=>255, 'on'=>'insert,update'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'serial' => 'Serial',
			'user_id' => 'User',
			'designation' => 'Designation',
			'privacy' => 'Privacy',
			'share' => 'Share',
			'status' => 'Status',
			'image' => 'Image',
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

		$criteria->compare('serial',$this->serial);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('designation',$this->designation,true);
		$criteria->compare('privacy',$this->privacy,true);
		$criteria->compare('share',$this->share,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Status the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
