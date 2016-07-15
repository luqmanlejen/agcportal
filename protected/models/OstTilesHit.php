<?php

/**
 * This is the model class for table "ost_tiles_hit".
 *
 * The followings are the available columns in table 'ost_tiles_hit':
 * @property integer $id
 * @property string $tiles_bm
 * @property string $tiles_bi
 * @property string $tiles_url_bm
 * @property string $tiles_url_bi
 * @property integer $hits_bm
 * @property integer $hits_bi
 * @property string $hits_last_date_bm
 * @property string $hits_last_date_bi
 */
class OstTilesHit extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ost_tiles_hit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hits_bm, hits_bi', 'numerical', 'integerOnly'=>true),
			array('tiles_bm, tiles_bi', 'length', 'max'=>50),
			array('tiles_url_bm, tiles_url_bi', 'length', 'max'=>255),
			array('hits_last_date_bm, hits_last_date_bi', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tiles_bm, tiles_bi, tiles_url_bm, tiles_url_bi, hits_bm, hits_bi, hits_last_date_bm, hits_last_date_bi', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'tiles_bm' => 'Tiles Bm',
			'tiles_bi' => 'Tiles Bi',
			'tiles_url_bm' => 'Tiles Url Bm',
			'tiles_url_bi' => 'Tiles Url Bi',
			'hits_bm' => 'Hits Bm',
			'hits_bi' => 'Hits Bi',
			'hits_last_date_bm' => 'Hits Last Date Bm',
			'hits_last_date_bi' => 'Hits Last Date Bi',
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
		$criteria->compare('tiles_bm',$this->tiles_bm,true);
		$criteria->compare('tiles_bi',$this->tiles_bi,true);
		$criteria->compare('tiles_url_bm',$this->tiles_url_bm,true);
		$criteria->compare('tiles_url_bi',$this->tiles_url_bi,true);
		$criteria->compare('hits_bm',$this->hits_bm);
		$criteria->compare('hits_bi',$this->hits_bi);
		$criteria->compare('hits_last_date_bm',$this->hits_last_date_bm,true);
		$criteria->compare('hits_last_date_bi',$this->hits_last_date_bi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OstTilesHit the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
