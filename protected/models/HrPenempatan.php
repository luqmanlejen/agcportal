<?php

/**
 * This is the model class for table "hr_penempatan".
 *
 * The followings are the available columns in table 'hr_penempatan':
 * @property integer $PEN_ID
 * @property integer $PEN_GREDJWT_ID
 * @property integer $PEN_AGENSI_ID
 * @property integer $PEN_STATUS_KADER
 * @property integer $PEN_STATUS_ID
 * @property integer $PEN_BHGN_ID
 * @property integer $PEN_UNIT_ID
 * @property integer $PEN_NEGERI_ID
 * @property integer $PEN_STF_ID
 * @property integer $PEN_DAERAH_ID
 * @property integer $PEN_SORT
 */
class HrPenempatan extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'HR_PENEMPATAN';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
//            array('PEN_ID', 'required'),
            array('PEN_ID, PEN_GREDJWT_ID, PEN_AGENSI_ID, PEN_STATUS_KADER, PEN_STATUS_ID, PEN_BHGN_ID, PEN_UNIT_ID, PEN_NEGERI_ID, PEN_STF_ID, PEN_DAERAH_ID, PEN_SORT', 'numerical', 'integerOnly' => true),
            array('created_by, updated_by', 'length', 'max' => 50),
            array('created_dt, updated_dt', 'safe'),
// The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('PEN_ID, peribadi_rel.STF_NAMA, unit_rel.UNIT, PEN_GREDJWT_ID, PEN_AGENSI_ID, PEN_STATUS_KADER, PEN_STATUS_ID, PEN_BHGN_ID, PEN_UNIT_ID, PEN_NEGERI_ID, PEN_STF_ID, PEN_DAERAH_ID, PEN_SORT, created_by, updated_by, created_dt, updated_dt', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'peribadi_rel' => array(self::BELONGS_TO, 'HrStaffPeribadi', array('PEN_STF_ID' => 'STF_ID')),
            'bahagian_rel' => array(self::BELONGS_TO, 'LkpBahagian', array('PEN_BHGN_ID' => 'BAHAGIAN_ID')),
            'unit_rel' => array(self::BELONGS_TO, 'LkpUnit', array('PEN_UNIT_ID' => 'UNIT_ID')),
            'jawatan_rel' => array(self::BELONGS_TO, 'LkpHrJawatan', array('STF_JWTN_ID' => 'JTN_ID'), 'through' => 'peribadi_rel'),
            'gred_rel' => array(self::BELONGS_TO, 'LkpGred', array('STF_GRED_ID' => 'GRED_ID'), 'through' => 'peribadi_rel'),
        );

        //return array('reladmin' => array(self::BELONGS_TO, 'OstUser', '', 'foreignKey' => array('updated_by' => 'id')), 
        ///    'relmenu' => array(self::BELONGS_TO, 'OstMenuPortal', '', 'foreignKey' => array('menu_id' => 'id')));
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'PEN_ID' => 'Pen',
            'PEN_GREDJWT_ID' => 'Pen Gredjwt',
            'PEN_AGENSI_ID' => 'Pen Agensi',
            'PEN_STATUS_KADER' => 'Pen Status Kader',
            'PEN_STATUS_ID' => 'Pen Status',
            'PEN_BHGN_ID' => 'Division',
            'PEN_UNIT_ID' => 'Unit',
            'PEN_NEGERI_ID' => 'Pen Negeri',
            'PEN_STF_ID' => 'Staff No.',
            'PEN_DAERAH_ID' => 'Pen Daerah',
            'PEN_SORT' => 'Sort',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_dt' => 'Created Date',
            'updated_dt' => 'Updated Date',
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
        $criteria = new CDbCriteria;

//        $criteria->compare('PEN_ID', $this->PEN_ID);
//        $criteria->compare('PEN_GREDJWT_ID', $this->PEN_GREDJWT_ID);
//        $criteria->compare('PEN_AGENSI_ID', $this->PEN_AGENSI_ID);
//        $criteria->compare('PEN_STATUS_KADER', $this->PEN_STATUS_KADER);
//        $criteria->compare('PEN_STATUS_ID', $this->PEN_STATUS_ID);
//        if(!isset($_GET['HR_PENEMPATAN_PEN_BHGN_ID'])){
//        if(!isset($_GET['HR_PENEMPATAN_PEN_BHGN_ID'])){
        //$criteria->compare('PEN_BHGN_ID', $this->PEN_BHGN_ID);
//        }
        
        if ($this->PEN_BHGN_ID != 0) {
            $criteria->compare('PEN_BHGN_ID', $this->PEN_BHGN_ID);
        }


        if ($this->PEN_UNIT_ID != 0) {
            $criteria->addCondition("t.PEN_UNIT_ID=$this->PEN_UNIT_ID");
        }

        if ((!isset($_GET['HrPenempatan_PEN_BHGN_ID']) && $this->PEN_BHGN_ID != 0) || $this->PEN_STF_ID != '')  {   
            $criteria->addCondition("t.PEN_STATUS_ID=1");

            $id = Yii::app()->session['user_id'];
            $user_id = OstUser::model()->findByPk($id);
            $criteria->compare('PEN_ID', $this->PEN_ID);
            
            $criteria->with = array('peribadi_rel');
            $criteria->compare('peribadi_rel.STF_NAMA', $this->PEN_STF_ID, true);
            
            if (!isset($_GET['HrPenempatan_sort']))
            $criteria->order = 'PEN_SORT ASC';
        }

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return HrPenempatan the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getdeptlist() {
        $label = array('0' => '-- Please Choose --');
        if (Yii::app()->session['lang'] == 'my')
            $label = array('0' => '-- Sila Pilih --');
//        if ($parent_cat != '') {
        $model = HrPenempatan::model()->findAll(array("condition" => "PEN_STATUS_ID=1 AND PEN_STATUS_KADER=2 ORDER BY PEN_STF_ID ASC"));
        if (sizeof($model) > 0) {
            foreach ($model as $row) {
                $output[$row->PEN_ID] = $row->PEN_BHGN_ID;
            }
        }
//        }
//        return $output;
        return array('' => $label) + CHtml::listData($model, 'id', function($model) {
                    return PortalTranslation::TranslateCatTitle($model->PEN_ID, $model->PEN_BHGN_ID);
                });
    }

    public function getlevel() {
        $model = LkpStfLevel::model()->findAll(array('order' => 'LEVEL_SORT'));
        return CHtml::listData($model, 'STF_LEVEL', 'LEVEL_DESC');
    }

    public function getBahagian($id) {
        $output = '';
        $bhgn = LkpBahagian::model()->findByPk($id);
        if (sizeof($bhgn) > 0) {
            $output = $bhgn->BAHAGIAN;
        }
        if ($id == 0) {
            $output = "don't defined";
        }
        return $output;
    }

    public function getUnit($id) {
        $output = '';
        $bhgn = LkpUnit::model()->findByPk($id);
        if (sizeof($bhgn) > 0) {
            $output = $bhgn->UNIT;
        }
        if ($id == 0) {
            $output = "don't defined";
        }
        return $output;
    }

    public function getName($id) {
        $model = $this->model()->findByPk($id);
        $staf = HrStaffPeribadi::model()->findByAttributes(array('STF_ID' => $model->PEN_STF_ID));
        $title = '';
        if (!empty($staf->STF_TITLE)) {
            $t = LkpHrGelaranDk::model()->findByPk($staf->STF_TITLE);
            $title = $t->GDK_GELARAN;
        }
        echo $title . " " . $staf->STF_NAMA;
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

    public function getNama($num) {
        $model = OstUser::model()->findByPk($num);
        if (sizeof($model) > 0)
            echo $model->name;
    }

}
