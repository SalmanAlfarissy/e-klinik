<?php

/**
 * This is the model class for table "tindakan".
 *
 * The followings are the available columns in table 'tindakan':
 * @property integer $id
 * @property string $nama
 * @property string $deskripsi
 * @property string $biaya
 * @property string $created_at
 * @property string $updated_at
 *
 * The followings are the available model relations:
 * @property PasienTindakan[] $pasienTindakans
 */
class Tindakan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tindakan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, biaya', 'required'),
			array('nama', 'length', 'max'=>255),
			array('biaya', 'length', 'max'=>10),
			array('deskripsi', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nama, deskripsi, biaya, created_at', 'safe', 'on'=>'search'),
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
			'pasienTindakans' => array(self::HAS_MANY, 'PasienTindakan', 'tindakan_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama',
			'deskripsi' => 'Deskripsi',
			'biaya' => 'Biaya',
			'created_at' => 'Created At',
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

		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('biaya',$this->biaya,true);
		$criteria->compare('created_at',$this->created_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tindakan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
