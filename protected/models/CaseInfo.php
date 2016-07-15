<?php

/**
 * This is the model class for table "case_info".
 *
 * The followings are the available columns in table 'case_info':
 * @property integer $id
 * @property string $case_type
 * @property string $url
 * @property string $case_cat
 * @property string $case_month
 * @property integer $case_year
 * @property integer $hits
 * @property string $lang
 * @property string $created_dt
 * @property string $created_by
 * @property string $updated_dt
 * @property string $updated_by
 * @property string $criminal_url
 * @property string $civil_url
 * @property string $parent_id
 * @property string $flag
 */
class CaseInfo extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'case_info';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('case_year, hits, flag, parent_id', 'numerical', 'integerOnly' => true),
            array('case_type, case_month, lang', 'length', 'max' => 10),
            array('url, criminal_url, civil_url', 'length', 'max' => 255),
            array('case_cat', 'length', 'max' => 15),
            array('created_by, updated_by', 'length', 'max' => 50),
            array('created_dt, updated_dt', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, case_type, url, case_cat, case_month, case_year, hits, lang, created_dt, created_by, updated_dt, updated_by, parent_id, flag, criminal_url, civil_url', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'reladmin' => array(self::BELONGS_TO, 'OstUser', '', 'foreignKey' => array('updated_by' => 'id')), 
            'relmenu' => array(self::BELONGS_TO, 'OstMenuPortal', '', 'foreignKey' => array('menu_id' => 'id')),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'case_type' => 'Type',
            'url' => 'Document',
            'case_cat' => 'Category',
            'case_month' => 'Month',
            'case_year' => 'Year',
            'hits' => 'Hits',
            'lang' => 'Language',
            'created_dt' => 'Created Date',
            'created_by' => 'Created By',
            'updated_dt' => 'Updated Date',
            'updated_by' => 'Updated By',
            'flag' => 'Flag Delete',
            'parent_id' => 'Parent Menu',
            'criminal_url' => 'Url Criminal',
            'civil_url' => 'Url Civil',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('case_type', $this->case_type, true);
        //$criteria->compare('url', $this->url, true);
        $criteria->compare('case_cat', $this->case_cat, true);
        $criteria->compare('case_month', $this->case_month, true);
        $criteria->compare('case_year', $this->case_year);
        $criteria->compare('hits', $this->hits);
        $criteria->compare('lang', $this->lang, true);
        $criteria->compare('created_dt', $this->created_dt, true);
        $criteria->compare('created_by', $this->created_by, true);
        $criteria->compare('updated_dt', $this->updated_dt, true);
        $criteria->compare('updated_by', $this->updated_by, true);
        $criteria->compare('parent_id', $this->parent_id, true);
        $criteria->compare('flag', $this->flag, true);
        $criteria->compare('criminal_url', $this->criminal_url, true);
        $criteria->compare('civil_url', $this->civil_url, true);
        
        $criteria->addCondition("t.lang='en'");
        $criteria->addCondition("t.flag=0");
        $criteria->addCondition('t.case_type = "' . $_GET['case_type'] . '"');
        
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria, 'pagination' => array('pageSize' => 10)
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CaseInfo the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getyearlist() {
        $model = OstRefList::model()->findAllByAttributes(array('cat_id' => 9), array('order' => 'sort ASC'));
        $moduleArray = CHtml::listData($model, 'id', 'label');
        return $moduleArray;
    }
    
    public function getmonthlist(){
        $model = OstRefList::model()->findAllByAttributes(array('cat_id' => 11));
        $moduleArray = CHtml::listData($model, 'id', 'label');
        return $moduleArray;
    }
    
    public function beforeSave() {
        $this->updated_by = Yii::app()->session['user_id'];
        $this->updated_dt = new CDbExpression('NOW()');
        if ($this->isNewRecord) {
            $this->created_by = Yii::app()->session['user_id'];
            $this->created_dt = new CDbExpression('NOW()');
        }
        return parent::beforeSave();
    }
    
    public function displaylang() {

        $output = '<img src="images/lang/en.png">&nbsp;';

        $model = CaseInfo::model()->findAllByAttributes(array('parent_id' => $this->id));

        if (sizeof($model) > 0) {

            foreach ($model as $row) {

                if ($row['url'] == '')
                    $output .= '<img src="images/lang/my.png" style="opacity:0.2;">&nbsp;';
                else
                    $output .= '<img src="images/lang/my.png">&nbsp;';
            }
        }

        echo $output;
    }
    
    public function getDisplayRef($id){
        $model = OstRefList::model()->findByPk($id);
        return $model->label;
    }    
}
