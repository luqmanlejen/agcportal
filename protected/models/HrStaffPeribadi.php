<?php

/**
 * This is the model class for table "hr_staff_peribadi".
 *
 * The followings are the available columns in table 'hr_staff_peribadi':
 * @property integer $STF_ID
 * @property string $STF_GELARAN_ID
 * @property string $STF_NAMA
 * @property string $STF_NOKP_BARU
 * @property string $STF_EMAIL
 * @property string $STF_EMAIL_2
 * @property string $STF_NO_TEL_PEJABAT
 * @property string $STF_EXTENSION
 * @property string $STF_FLAG_JENIS_STAF
 * @property string $STF_NO_KEKANANAN
 * @property string $STF_SUPERVISOR_ID
 * @property string $STF_GAMBAR_FILE
 * @property integer $STF_STATUS_KEAKTIFAN_ID
 * @property integer $STF_TITLE
 */
class HrStaffPeribadi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'HR_STAF_PERIBADI';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('STF_GELARAN_ID, STF_NAMA, STF_NOKP_BARU, STF_EMAIL, STF_EMAIL_2, STF_NO_TEL_PEJABAT, STF_EXTENSION, STF_FLAG_JENIS_STAF, STF_NO_KEKANANAN, STF_SUPERVISOR_ID, STF_GAMBAR_FILE', 'required'),
			array('STF_STATUS_KEAKTIFAN_ID, STF_TITLE', 'numerical', 'integerOnly'=>true),
			array('STF_GELARAN_ID, STF_NAMA, STF_NOKP_BARU, STF_EMAIL, STF_EMAIL_2, STF_NO_TEL_PEJABAT, STF_EXTENSION, STF_FLAG_JENIS_STAF, STF_NO_KEKANANAN, STF_SUPERVISOR_ID, STF_GAMBAR_FILE', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('STF_ID, STF_GELARAN_ID, STF_NAMA, STF_NOKP_BARU, STF_EMAIL, STF_EMAIL_2, STF_NO_TEL_PEJABAT, STF_EXTENSION, STF_FLAG_JENIS_STAF, STF_NO_KEKANANAN, STF_SUPERVISOR_ID, STF_GAMBAR_FILE, STF_STATUS_KEAKTIFAN_ID, STF_LEVEL, STF_USERNAME, STF_JWTN_ID, STF_GRED_ID, STF_TITLE', 'safe', 'on'=>'search'),
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
                    'penempatan_rel' => array(self::BELONGS_TO, 'HrPenempatan', array('STF_ID'=>'PEN_STF_ID')),
                    'unit_rel' => array(self::BELONGS_TO, 'LkpUnit', array('PEN_UNIT_ID'=>'UNIT_ID'), 'through'=>'penempatan_rel'),
                    'jawatan_rel' => array(self::BELONGS_TO, 'LkpHrJawatan', array('STF_JWTN_ID'=>'JTN_ID')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'STF_ID' => 'Stf',
			'STF_GELARAN_ID' => 'Stf Gelaran',
			'STF_NAMA' => 'Name',
			'STF_NOKP_BARU' => 'Stf Nokp Baru',
			'STF_EMAIL' => 'Email',
			'STF_EMAIL_2' => 'Stf Email 2',
			'STF_NO_TEL_PEJABAT' => 'Tel. No',
			'STF_EXTENSION' => 'Stf Extension',
			'STF_FLAG_JENIS_STAF' => 'Stf Flag Jenis Staf',
			'STF_NO_KEKANANAN' => 'Stf No Kekananan',
			'STF_SUPERVISOR_ID' => 'Stf Supervisor',
			'STF_GAMBAR_FILE' => 'Stf Gambar File',
			'STF_STATUS_KEAKTIFAN_ID' => 'Stf Status Keaktifan',
                        'STF_LEVEL' => 'Staff Level',
                        'STF_USERNAME' => 'Staff Username',
                        'STF_JWTN_ID' => 'Position',
                        'STF_GRED_ID' => 'Grade',
                    'STF_TITLE' => 'Title'
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

		$criteria->compare('STF_ID',$this->STF_ID);
		$criteria->compare('STF_GELARAN_ID',$this->STF_GELARAN_ID,true);
		$criteria->compare('STF_NAMA',$this->STF_NAMA,true);
		$criteria->compare('STF_NOKP_BARU',$this->STF_NOKP_BARU,true);
		$criteria->compare('STF_EMAIL',$this->STF_EMAIL,true);
		$criteria->compare('STF_EMAIL_2',$this->STF_EMAIL_2,true);
		$criteria->compare('STF_NO_TEL_PEJABAT',$this->STF_NO_TEL_PEJABAT,true);
		$criteria->compare('STF_EXTENSION',$this->STF_EXTENSION,true);
		$criteria->compare('STF_FLAG_JENIS_STAF',$this->STF_FLAG_JENIS_STAF,true);
		$criteria->compare('STF_NO_KEKANANAN',$this->STF_NO_KEKANANAN,true);
		$criteria->compare('STF_SUPERVISOR_ID',$this->STF_SUPERVISOR_ID,true);
		$criteria->compare('STF_GAMBAR_FILE',$this->STF_GAMBAR_FILE,true);
		$criteria->compare('STF_STATUS_KEAKTIFAN_ID',$this->STF_STATUS_KEAKTIFAN_ID);
                $criteria->compare('STF_LEVEL',$this->STF_LEVEL,true);
                $criteria->compare('STF_USERNAME',$this->STF_USERNAME,true);
                $criteria->compare('STF_JWTN_ID',$this->STF_JWTN_ID,true);
                $criteria->compare('STF_GRED_ID',$this->STF_GRED_ID,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HrStaffPeribadi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
