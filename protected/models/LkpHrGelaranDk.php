<?php

/**
 * This is the model class for table "lkp_hr_gelaran_dk".
 *
 * The followings are the available columns in table 'lkp_hr_gelaran_dk':
 * @property integer $GDK_ID
 * @property integer $GDK_DK_ID
 * @property string $GDK_GELARAN
 * @property string $GDK_TKH_CIPTA
 * @property integer $GDK_ID_CIPTA
 * @property string $GDK_TKH_KEMASKINI
 * @property integer $GDK_ID_KEMASKINI
 */
class LkpHrGelaranDk extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'LKP_HR_GELARAN_DK';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('GDK_DK_ID, GDK_ID_CIPTA, GDK_ID_KEMASKINI', 'numerical', 'integerOnly' => true),
            array('GDK_GELARAN', 'length', 'max' => 50),
            array('GDK_TKH_CIPTA, GDK_TKH_KEMASKINI', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('GDK_ID, GDK_DK_ID, GDK_GELARAN, GDK_TKH_CIPTA, GDK_ID_CIPTA, GDK_TKH_KEMASKINI, GDK_ID_KEMASKINI', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'reladmin' => array(self::BELONGS_TO, 'OstUser', '', 'foreignKey' => array('GDK_ID_KEMASKINI' => 'id'))
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'GDK_ID' => 'Gdk',
            'GDK_DK_ID' => 'Gdk Dk',
            'GDK_GELARAN' => 'Honorary Title',
            'GDK_TKH_CIPTA' => 'Created Date',
            'GDK_ID_CIPTA' => 'Created By',
            'GDK_TKH_KEMASKINI' => 'Updated Date',
            'GDK_ID_KEMASKINI' => 'Updated By',
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

        $criteria->compare('GDK_ID', $this->GDK_ID);
        $criteria->compare('GDK_DK_ID', $this->GDK_DK_ID);
        $criteria->compare('GDK_GELARAN', $this->GDK_GELARAN, true);
        $criteria->compare('GDK_TKH_CIPTA', $this->GDK_TKH_CIPTA, true);
        $criteria->compare('GDK_ID_CIPTA', $this->GDK_ID_CIPTA);
        $criteria->compare('GDK_TKH_KEMASKINI', $this->GDK_TKH_KEMASKINI, true);
        $criteria->compare('GDK_ID_KEMASKINI', $this->GDK_ID_KEMASKINI);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return LkpHrGelaranDk the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function beforeSave() {
        $this->GDK_ID_KEMASKINI = Yii::app()->session['user_id'];
        $this->GDK_TKH_KEMASKINI = new CDbExpression('NOW()');
        if ($this->isNewRecord) {
            $this->GDK_ID_CIPTA = Yii::app()->session['user_id'];
            $this->GDK_TKH_CIPTA = new CDbExpression('NOW()');
        }
        return parent::beforeSave();
    }
    
    public function getList(){
        $model = LkpHrGelaranDk::model()->findAll();
        return CHtml::listData($model, 'GDK_ID', 'GDK_GELARAN');
    }    
}
