<?php

/**
 * This is the model class for table "hr_fax".
 *
 * The followings are the available columns in table 'hr_fax':
 * @property integer $FAX_ID
 * @property string $FAX_SEC_UNIT
 * @property string $FAX_NO
 * @property string $FAX_DIVISION
 * @property integer $FAX_PARENT_LANG
 * @property string $FAX_LANG
 * @property integer $FAX_SORT
 * @property integer $FAX_FLAG_DELETE
 * @property string $FAX_CREATED_BY
 * @property string $FAX_CREATED_DT
 * @property string $FAX_UPDATED_BY
 * @property string $FAX_UPDATED_DT
 */
class Fax extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'HR_FAX';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('FAX_SEC_UNIT', 'required'),
            array('FAX_PARENT_LANG, FAX_SORT, FAX_FLAG_DELETE', 'numerical', 'integerOnly' => true),
            array('FAX_SEC_UNIT, FAX_SEC_UNIT2, FAX_DIVISION', 'length', 'max' => 255),
            array('FAX_NO', 'length', 'max' => 50),
            array('FAX_LANG', 'length', 'max' => 2),
            array('FAX_CREATED_BY, FAX_UPDATED_BY', 'length', 'max' => 100),
            array('FAX_CREATED_DT, FAX_UPDATED_DT', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('FAX_ID, FAX_SEC_UNIT, FAX_SEC_UNIT2, FAX_NO, FAX_DIVISION, FAX_PARENT_LANG, FAX_LANG, FAX_SORT, FAX_FLAG_DELETE, FAX_CREATED_BY, FAX_CREATED_DT, FAX_UPDATED_BY, FAX_UPDATED_DT', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'reladmin' => array(self::BELONGS_TO, 'OstUser', '', 'foreignKey' => array('FAX_UPDATED_BY' => 'id')),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'FAX_ID' => 'ID',
            'FAX_SEC_UNIT' => 'Unit',
            'FAX_SEC_UNIT2' => 'Unit',
            'FAX_NO' => 'Fax No',
            'FAX_DIVISION' => 'Division',
            'FAX_PARENT_LANG' => 'Fax Parent Lang',
            'FAX_LANG' => 'Language',
            'FAX_SORT' => 'Sort',
            'FAX_FLAG_DELETE' => 'Flag',
            'FAX_CREATED_BY' => 'Created By',
            'FAX_CREATED_DT' => 'Created Date',
            'FAX_UPDATED_BY' => 'Updated By',
            'FAX_UPDATED_DT' => 'Updated Date',
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

        $criteria->compare('FAX_ID', $this->FAX_ID);
        $criteria->compare('FAX_SEC_UNIT', $this->FAX_SEC_UNIT, true);
        $criteria->compare('FAX_SEC_UNIT2', $this->FAX_SEC_UNIT2, true);
        $criteria->compare('FAX_NO', $this->FAX_NO, true);
        //$criteria->compare('FAX_DIVISION', $this->FAX_DIVISION, true);
        $criteria->compare('FAX_PARENT_LANG', $this->FAX_PARENT_LANG);
        $criteria->compare('FAX_LANG', $this->FAX_LANG, true);
        $criteria->compare('FAX_SORT', $this->FAX_SORT);
        $criteria->compare('FAX_FLAG_DELETE', $this->FAX_FLAG_DELETE);
        $criteria->compare('FAX_CREATED_BY', $this->FAX_CREATED_BY, true);
        $criteria->compare('FAX_CREATED_DT', $this->FAX_CREATED_DT, true);
        $criteria->compare('FAX_UPDATED_BY', $this->FAX_UPDATED_BY, true);
        $criteria->compare('FAX_UPDATED_DT', $this->FAX_UPDATED_DT, true);
        
        if($this->FAX_DIVISION != 0){
            $criteria->compare('FAX_DIVISION',$this->FAX_DIVISION, true);
        }
        
        
        $criteria->addCondition('t.FAX_FLAG_DELETE != 1');
        
        if (!isset($_GET['Fax_sort']))
            $criteria->order = 't.FAX_SORT ASC';
        
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Fax the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function beforeSave() {
        $this->FAX_UPDATED_BY = Yii::app()->session['user_id'];
        $this->FAX_UPDATED_DT = new CDbExpression('NOW()');
        if ($this->isNewRecord) {
            $this->FAX_CREATED_BY = Yii::app()->session['user_id'];
            $this->FAX_CREATED_DT = new CDbExpression('NOW()');
        }
        return parent::beforeSave();
    }
    
    public function displaylang() {

        $output = '<img src="images/lang/en.png">&nbsp;';
        $model = Fax::model()->findByPk($this->FAX_ID);
        if (sizeof($model) > 0) {
            
                if ($model['FAX_SEC_UNIT2'] == '')
                    $output .= '<img src="images/lang/my.png" style="opacity:0.2;">&nbsp;';
                else
                    $output .= '<img src="images/lang/my.png">&nbsp;';
        }
        echo $output;
    }
    
    public function displayDivision($id){
        $fax = Fax::model()->findByPk($id);
        $model = LkpBahagian::model()->findByAttributes(array('BAHAGIAN_ID'=>$fax->FAX_DIVISION));
        if(sizeof($model)>0){
            echo $model->BAHAGIAN;
        } else {
            echo "Data doesn't exits";
        }
    }

}
