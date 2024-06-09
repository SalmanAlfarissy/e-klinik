<?php

/**
 * This is the model class for table "pasien_obat".
 *
 * The followings are the available columns in table 'pasien_obat':
 * @property integer $id
 * @property integer $pendaftaran_pasien_id
 * @property integer $obat_id
 * @property integer $jumlah
 * @property string $created_at
 * @property string $updated_at
 *
 * The followings are the available model relations:
 * @property Obat $obat
 * @property PendaftaranPasien $pendaftaranPasien
 */
class PasienObat extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pasien_obat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pendaftaran_pasien_id, obat_id, jumlah', 'required'),
			array('pendaftaran_pasien_id, obat_id, jumlah', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pendaftaran_pasien_id, obat_id, jumlah, created_at', 'safe', 'on'=>'search'),
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
			'obat' => array(self::BELONGS_TO, 'Obat', 'obat_id'),
			'pendaftaranPasien' => array(self::BELONGS_TO, 'PendaftaranPasien', 'pendaftaran_pasien_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pendaftaran_pasien_id' => 'Pendaftaran Pasien',
			'obat_id' => 'Obat',
			'jumlah' => 'Jumlah',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('pendaftaran_pasien_id',$this->pendaftaran_pasien_id);
		$criteria->compare('obat_id',$this->obat_id);
		$criteria->compare('jumlah',$this->jumlah);
		$criteria->compare('created_at',$this->created_at,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PasienObat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
