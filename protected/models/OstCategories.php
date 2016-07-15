<?php

/**
 * This is the model class for table "ost_categories".
 *
 * The followings are the available columns in table 'ost_categories':
 * @property integer $id
 * @property string $title
 * @property string $type
 * @property integer $parent_cat
 * @property integer $sort
 * @property integer $parent_lang
 * @property string $lang
 * @property string $created_dt
 * @property string $created_by
 * @property string $updated_dt
 * @property string $updated_by
 */
class OstCategories extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ost_categories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
            return array(
                array('title', 'required'),
                array('parent_cat, sort, parent_lang', 'numerical', 'integerOnly'=>true),
                array('title, created_by, updated_by', 'length', 'max'=>255),
                array('type, lang', 'length', 'max'=>10),
                // The following rule is used by search().
                // @todo Please remove those attributes that should not be searched.
                array('id, title, type, parent_cat, sort, parent_lang, lang, created_dt, created_by, updated_dt, updated_by', 'safe', 'on'=>'search'),
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
                    'reladmin' => array(self::BELONGS_TO, 'OstUser', '', 'foreignKey' => array('updated_by' => 'id')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels(){
            return array(
                'id' => 'ID',
                'title' => 'Title',
                'type' => 'Type',
                'parent_cat' => 'Parent',
                'sort' => 'Sort',
                'parent_lang' => 'Parent Lang',
                'lang' => 'Language',
                'created_dt' => 'Created Date',
                'created_by' => 'Created By',
                'updated_dt' => 'Updated Date',
                'updated_by' => 'Updated By',
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

            $criteria=new CDbCriteria;

            $criteria->compare('id',$this->id);
            $criteria->compare('title',$this->title,true);
            $criteria->compare('type',$this->type,true);
            $criteria->compare('parent_cat',$this->parent_cat);
            $criteria->compare('sort',$this->sort);
            $criteria->compare('parent_lang',$this->parent_lang);
            $criteria->compare('lang',$this->lang,true);
            $criteria->compare('created_dt',$this->created_dt,true);
            $criteria->compare('created_by',$this->created_by,true);
            $criteria->compare('updated_dt',$this->updated_dt,true);
            $criteria->compare('updated_by',$this->updated_by,true);
            
            $criteria->addCondition("t.lang = 'en'");
            
            if (!isset($_GET['OstCategories_sort']))
                    $criteria->order = 't.updated_dt DESC';
            
            return new CActiveDataProvider($this, array(
                    'criteria'=>$criteria, 'pagination'=>array('pageSize' => 10)
            ));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OstCategories the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
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
    
    public function gettype() {
        $model = OstRefList::model()->findAll("cat_id='6'");
        return CHtml::listData($model, 'code', 'label');
    }
    
    public function displaylang() {
        $output = '<img src="images/lang/en.png">&nbsp;';
        $model = OstCategories::model()->findAllByAttributes(array('parent_lang' => $this->id));
        if (sizeof($model) > 0) {
            foreach ($model as $row) {
                if ($row['title'] == '')
                    $output .= '<img src="images/lang/my.png" style="opacity:0.2;">&nbsp;';
                else
                    $output .= '<img src="images/lang/my.png">&nbsp;';
            }
        }
        echo $output;
    }
    
    public function getparentlist() {
        $label = array('0' => '-- Please Choose --');
        if (Yii::app()->session['lang'] == 'my'){
            $label = array('0' => '-- Sila Pilih --');
        }
//        if ($parent_cat != '') {
        $model = OstCategories::model()->findAll(array("condition" => "parent_cat=0 AND type='act' ORDER BY sort ASC"));
        if (sizeof($model) > 0) {
            foreach ($model as $row) {
                $output[$row->id] = $row->title;
            }
        }
        
//        }
//        return $output;
        return array('' => $label) + CHtml::listData($model, 'id', function($model){
            return PortalTranslation::TranslateCatTitle($model->id, $model->title);
        });
    }
    
    public function getactlist() {
        $label = array('0' => '-- Please Choose --');
        if (Yii::app()->session['lang'] == 'my'){
            $label = array('0' => '-- Sila Pilih --');
        }
//        if ($parent_cat != '') {
        $model = OstCategories::model()->findAll(array("condition" => "parent_cat=5 AND type='act' ORDER BY sort ASC"));
        if (sizeof($model) > 0) {
            foreach ($model as $row) {
                $output[$row->id] = $row->title;
            }
        }
        
//        }
//        return $output;
        return array('' => $label) + CHtml::listData($model, 'id', function($model){
            return PortalTranslation::TranslateCatTitle($model->id, $model->title);
        });
    }
    
    public function getparent() {
        $output = array('0' => '-- Please Choose --');
//        if ($parent_cat != '') {
            $model = $this->findAll(array("condition" => "parent_cat=0 AND lang='en' ORDER BY sort ASC"));
            if (sizeof($model) > 0) {
                foreach ($model as $row) {
                    $output[$row->id] = $row->title;                    
                    $this->getsub($row->id, $output, 0);
                }
            }
//        }
        return $output;
    }
    public function getsub($parent_cat, &$output, $count) {

        $model = $this->findAll(array("condition" => "parent_cat=$parent_cat AND lang='en' ORDER BY sort ASC"));
        if (sizeof($model) > 0) {
            $count++;
            foreach ($model as $key => $row) {
                $output[$row->id] = $this->getmarker($count) . ' ' . ($key + 1) . '. ' . $row->title;
                $this->getsub($row->id, $output, $count);
            }
        }

        return $output;
    }
    public function getmarker($total) {
        $marker = '';
        for ($x = 0; $x < $total; $x++) {
            $marker.= '__';
        }
        return $marker;
    }
    
    public function getparent2($id) {

        $rows = OstCategories::model()->findByPK($id);

        return $rows['title'];
    }
    
    public function getparentsublist($parent_cat) {
        $output = array('0' => '-- Please Choose --');
        if (Yii::app()->session['lang'] == 'my')
            $output = array('0' => '-- Sila Pilih --');
        if ($parent_cat != '') {
            $model = OstCategories::model()->findAll(array("condition" => "parent_cat='$parent_cat' AND lang='en' ORDER BY id ASC"));
            if (sizeof($model) > 0) {
                foreach ($model as $row) {
                    $output[$row->id] = $row->title;
                    $this->getsub($row->id, $output, 0);
                }
            }
        }
        return $output;
    }
}
