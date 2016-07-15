<?php

/**
 * This is the model class for table "LKP_GRED".
 *
 * The followings are the available columns in table 'LKP_GRED':
 * @property integer $GRED_ID
 * @property string $GRED
 * @property integer $GRED_SUSUNAN
 */
class LkpGred extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'LKP_GRED';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('GRED_ID', 'required'),
            array('GRED_ID, GRED_SUSUNAN', 'numerical', 'integerOnly' => true),
            array('GRED', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('GRED_ID, GRED, GRED_SUSUNAN', 'safe', 'on' => 'search'),
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
            'GRED_ID' => 'Grade',
            'GRED' => 'Gred',
            'GRED_SUSUNAN' => 'Gred Susunan',
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

        $criteria->compare('GRED_ID', $this->GRED_ID);
        $criteria->compare('GRED', $this->GRED, true);
        $criteria->compare('GRED_SUSUNAN', $this->GRED_SUSUNAN);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return LKPGRED the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function getgredlist(){
        $model = LkpGred::model()->findAll(array('order' => 'GRED_SUSUNAN ASC'));
        return CHtml::listData($model, 'GRED_ID', 'GRED');
    }

}
