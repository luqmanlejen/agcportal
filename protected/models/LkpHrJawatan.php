<?php

/**
 * This is the model class for table "LKP_HR_JAWATAN".
 *
 * The followings are the available columns in table 'LKP_HR_JAWATAN':
 * @property integer $JTN_ID
 * @property string $JTN_JWTN_NAMA
 */
class LkpHrJawatan extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'LKP_HR_JAWATAN';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('JTN_ID', 'required'),
            array('JTN_ID', 'numerical', 'integerOnly' => true),
            array('JTN_JWTN_NAMA', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('JTN_ID, JTN_JWTN_NAMA', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'JTN_ID' => 'Jtn',
            'JTN_JWTN_NAMA' => 'Jtn Jwtn Nama',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('JTN_ID', $this->JTN_ID);
        $criteria->compare('JTN_JWTN_NAMA', $this->JTN_JWTN_NAMA, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return LKPHRJAWATAN the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
//     $model = LkpStfLevel::model()->findAll();
//        return Chtml::listData($model, 'STF_LEVEL', 'LEVEL_DESC');
        
    public function getpositionlist(){
        $model = LkpHrJawatan::model()->findAll(array('order' => 'JTN_JWTN_NAMA ASC'));
        return CHtml::listData($model, 'JTN_ID', 'JTN_JWTN_NAMA');
//        echo sizeof($model);
//        exit;
    }
}
