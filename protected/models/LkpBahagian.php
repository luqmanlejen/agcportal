<?php

/**
 * This is the model class for table "lkp_bahagian".
 *
 * The followings are the available columns in table 'lkp_bahagian':
 * @property integer $BAHAGIAN_ID
 * @property string $BAHAGIAN
 * @property string $BAHAGIAN_EN
 * @property integer $sort
 * @property integer $hide
 */
class LkpBahagian extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'LKP_BAHAGIAN';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('BAHAGIAN_ID', 'required'),
			array('BAHAGIAN_ID, sort, hide', 'numerical', 'integerOnly'=>true),
			array('BAHAGIAN, BAHAGIAN_EN', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('BAHAGIAN_ID, BAHAGIAN, BAHAGIAN_EN, sort, hide', 'safe', 'on'=>'search'),
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
			'BAHAGIAN_ID' => 'Bahagian',
			'BAHAGIAN' => 'Division (Malay Version)',
                        'BAHAGIAN_EN' => 'Division (English Version)',
                        'sort' => 'Sort',
                        'hide' => 'Status',
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

		$criteria->compare('BAHAGIAN_ID',$this->BAHAGIAN_ID);
		$criteria->compare('BAHAGIAN',$this->BAHAGIAN,true);
                $criteria->compare('BAHAGIAN_EN',$this->BAHAGIAN_EN,true);
                
                $criteria->order = 't.hide ASC, t.sort ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LkpBahagian the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
    public function getdeptlist2() {
        //$label = array('0' => '-- Please Choose --');
        //if (Yii::app()->session['lang'] == 'my')
            //$label = array('0' => '-- Sila Pilih --');
//        if ($parent_cat != '') {
        $output = array();
        $model = LkpBahagian::model()->findAll(array("condition" => "hide='0' ORDER BY sort ASC"));
        if (sizeof($model) > 0) {
            foreach ($model as $row) {
                if(Yii::app()->session['lang'] === 'my'){
                    $output[$row->BAHAGIAN_ID] = $row->BAHAGIAN;
                }else{
                    $output[$row->BAHAGIAN_ID] = $row->BAHAGIAN_EN;
                }
            }
        }
//        }
        return $output;
//        return array('' => $label) + CHtml::listData($model, 'BAHAGIAN_ID', function($model){
//            return PortalTranslation::TranslateCatTitle($model->BAHAGIAN_ID, $model->BAHAGIAN);
//        });
    }
    
    public function getdeptlist() {
        /*$models = LkpBahagian::model()->findAll();
        if(Yii::app()->session['lang'] === 'my'){
            return CHtml::listData($models, 'BAHAGIAN_ID', 'BAHAGIAN');
        }else{
            return CHtml::listData($models, 'BAHAGIAN_ID', 'BAHAGIAN_EN');
        }*/
        $output = array();
        $model = LkpBahagian::model()->findAll(array("condition" => "hide='0' ORDER BY sort ASC"));
        if (sizeof($model) > 0) {
            foreach ($model as $row) {
                if(Yii::app()->session['lang'] === 'my'){
                    $output[$row->BAHAGIAN_ID] = $row->BAHAGIAN;
                }else{
                    $output[$row->BAHAGIAN_ID] = $row->BAHAGIAN;
                }
            }
        }
//        }
        return $output;
    }
    
    public function displayStatus($id){
        $model = $this->model()->findByPk($id);
        if($model->hide == 0){
            echo 'Display';
        }else{
            echo 'Hide';
        }
    }
    
}