<?php

/**
 * This is the model class for table "pendaftaran_pasien".
 *
 * The followings are the available columns in table 'pendaftaran_pasien':
 * @property integer $id
 * @property string $nama_pasien
 * @property string $jenis_kelamin
 * @property string $alamat_pasien
 * @property string $tanggal_lahir
 * @property string $created_at
 * @property string $updated_at
 *
 * The followings are the available model relations:
 * @property PasienObat[] $pasienObats
 * @property PasienTindakan[] $pasienTindakans
 * @property Pembayaran[] $pembayarans
 */
class PendaftaranPasien extends CActiveRecord
{
	public $total_biaya;
	public $tanggal_pebayaran;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pendaftaran_pasien';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_pasien, jenis_kelamin, tanggal_lahir', 'required'),
			array('tanggal_lahir', 'date', 'format'=>'yyyy-MM-dd'),
			array('nama_pasien', 'length', 'max'=>255),
			array('jenis_kelamin', 'length', 'max'=>9),
			array('alamat_pasien', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('nama_pasien, total_biaya, tanggal_pebayaran, jenis_kelamin, alamat_pasien, tanggal_lahir, created_at', 'safe', 'on'=>'search'),
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
			'pasienObats' => array(self::HAS_MANY, 'PasienObat', 'pendaftaran_pasien_id'),
			'pasienTindakans' => array(self::HAS_MANY, 'PasienTindakan', 'pendaftaran_pasien_id'),
			'pembayarans' => array(self::HAS_ONE, 'Pembayaran', 'pendaftaran_pasien_id'),
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
			'jenis_kelamin' => 'Jenis Kelamin',
			'alamat_pasien' => 'Alamat Pasien',
			'tanggal_lahir' => 'Tanggal Lahir',
			'total_biaya' => 'Total Bayar',
			'tanggal_pebayaran' => 'Tanggal Pembayaran',
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
		$criteria->compare('nama_pasien',$this->nama_pasien,true);
		$criteria->compare('jenis_kelamin',$this->jenis_kelamin,true);
		$criteria->compare('alamat_pasien',$this->alamat_pasien,true);
		$criteria->compare('tanggal_lahir',$this->tanggal_lahir,true);
		$criteria->compare('created_at',$this->created_at,true);

		$criteria->with = array('pasienObats', 'pasienTindakans', 'pembayarans');
		$criteria->compare('pembayarans.total_biaya', $this->total_biaya, true);
		$criteria->compare('pembayarans.created_at', $this->tanggal_pebayaran, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PendaftaranPasien the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getUmur()
    {
		if ($this->tanggal_lahir !== null) {
			$today = new DateTime();
			$birthdate = new DateTime($this->tanggal_lahir);
			$age = $today->diff($birthdate)->y;
			return $age . ' Tahun ';
		} else {
			return null;
		}
    }
	
}
