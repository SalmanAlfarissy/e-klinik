<?php

/**
 * This is the model class for table "pembayaran".
 *
 * The followings are the available columns in table 'pembayaran':
 * @property integer $id
 * @property integer $pendaftaran_pasien_id
 * @property string $total_biaya
 * @property string $created_at
 * @property string $updated_at
 *
 * The followings are the available model relations:
 * @property PendaftaranPasien $pendaftaranPasien
 */
class Pembayaran extends CActiveRecord
{
	public $nama_pasien;
	public $total_bayar;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pembayaran';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pendaftaran_pasien_id, total_biaya, total_bayar', 'required'),
			array('pendaftaran_pasien_id', 'numerical', 'integerOnly'=>true),
			array('total_biaya', 'length', 'max'=>10),
			array('total_bayar', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pendaftaran_pasien_id, nama_pasien, total_biaya, created_at', 'safe', 'on'=>'search'),
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
			'nama_pasien' => 'Nama Pasien',
			'pendaftaran_pasien_id' => 'Pasien',
			'total_biaya' => 'Total Biaya',
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
		$criteria->compare('total_biaya',$this->total_biaya,true);
		$criteria->compare('created_at',$this->created_at,true);

		$criteria->with = array('pendaftaranPasien');
        $criteria->compare('pendaftaranPasien.nama_pasien', $this->nama_pasien, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pembayaran the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
