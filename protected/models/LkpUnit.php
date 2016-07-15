<?php

/**
 * This is the model class for table "lkp_unit".
 *
 * The followings are the available columns in table 'lkp_unit':
 * @property integer $UNIT_ID
 * @property string $UNIT
 * @property integer $BAHAGIAN_ID
 * @property integer $UNIT_HIDE
 */
class LkpUnit extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'LKP_UNIT';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('UNIT_ID', 'required'),
			array('UNIT_ID, BAHAGIAN_ID, NEGERI_ID, UNIT_HIDE', 'numerical', 'integerOnly'=>true),
			array('UNIT, UNIT_MY', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('UNIT_ID, UNIT, UNIT_MY, BAHAGIAN_ID, UNIT_SORT, UNIT_FLAG_DELETE, UNIT_CREATED_BY, UNIT_CREATED_DT, UNIT_UPDATED_BY, UNIT_UPDATED_DT, NEGERI_ID, UNIT_HIDE', 'safe', 'on'=>'search'),
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
                    'reladmin' => array(self::BELONGS_TO, 'OstUser', '', 'foreignKey' => array('UNIT_UPDATED_BY' => 'id')),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'UNIT_ID' => 'Unit',
			'UNIT' => 'Unit',
                    'UNIT_MY' => 'Unit',
			'BAHAGIAN_ID' => 'Bahagian',
                        'UNIT_SORT' => 'Sort',
                        'UNIT_FLAG_DELETE' => 'Flag',
                        'UNIT_CREATED_BY' => 'Created By',
                        'UNIT_CREATED_DT' => 'Created Date',
                        'UNIT_UPDATED_BY' => 'Updated By',
                        'UNIT_UPDATED_DT' => 'Updated Date',
                        'NEGERI_ID' => 'State',
                        'UNIT_HIDE' => 'Show',
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
		$criteria->compare('UNIT',$this->UNIT,true);
                $criteria->compare('UNIT_MY',$this->UNIT_MY,true);
                $criteria->compare('UNIT_SORT',$this->UNIT_SORT,true);
                $criteria->compare('UNIT_FLAG_DELETE',$this->UNIT_FLAG_DELETE,true);
                $criteria->compare('UNIT_CREATED_BY',$this->UNIT_CREATED_BY,true);
                $criteria->compare('UNIT_CREATED_DT',$this->UNIT_CREATED_DT,true);
                $criteria->compare('UNIT_UPDATED_BY',$this->UNIT_UPDATED_BY,true);
                $criteria->compare('UNIT_UPDATED_DT',$this->UNIT_UPDATED_DT,true);
                $criteria->compare('NEGERI_ID',$this->NEGERI_ID,true);
                $criteria->compare('UNIT_HIDE',$this->UNIT_HIDE,true);
                
                $criteria->addCondition('t.UNIT_FLAG_DELETE != 1');
                
                if($this->BAHAGIAN_ID != 0 && $this->UNIT_ID != 0){
                    $criteria->compare('BAHAGIAN_ID',$this->BAHAGIAN_ID);
                    $criteria->compare('UNIT_ID',$this->UNIT_ID);
                }else if($this->BAHAGIAN_ID != 0){
                    $criteria->compare('BAHAGIAN_ID',$this->BAHAGIAN_ID);
                }else if($this->UNIT_ID != 0){
                    $criteria->compare('UNIT_ID',$this->UNIT_ID);
                }
                
                if (!isset($_GET['LkpUnit_sort'])){
                    $criteria->order = 't.UNIT_SORT ASC';
                }
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LkpUnit the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function beforeSave() {
        $this->UNIT_UPDATED_BY = Yii::app()->session['user_id'];
        $this->UNIT_UPDATED_DT = new CDbExpression('NOW()');
        if ($this->isNewRecord) {
            $this->UNIT_CREATED_BY = Yii::app()->session['user_id'];
            $this->UNIT_CREATED_DT = new CDbExpression('NOW()');
        }
        return parent::beforeSave();
    }
    
    public function displaylang() {
        $output = '<img src="images/lang/en.png">&nbsp;';
        $model = LkpUnit::model()->findByPk($this->UNIT_ID);
        if (sizeof($model) > 0) {
            
                if ($model['FAX_SEC_UNIT2'] == '')
                    $output .= '<img src="images/lang/my.png" style="opacity:0.2;">&nbsp;';
                else
                    $output .= '<img src="images/lang/my.png">&nbsp;';
        }
        echo $output;
    }
    
    public function displayDivision($id){
        $model = LkpBahagian::model()->findByPk($id);
        echo $model->BAHAGIAN;
    }
        
    public function getunitlist() {
        $models = LkpUnit::model()->findAll();
        return CHtml::listData($models, 'UNIT_ID', 'UNIT');
    }
    
    public function getdeptsubCms($bahagian) {
        $count=0;
        $output = array('0' => '-- Sila Pilih --');
        if ($bahagian != '') {
            $model = LkpUnit::model()->findAll(array("condition" => "BAHAGIAN_ID='$bahagian' ORDER BY UNIT ASC"));
            if (sizeof($model) > 0) {
                $count++;
                foreach ($model as $row) {
                    $output[$row->UNIT_ID] = $row->UNIT_MY;
                }
            }
        }
        return $output;
    }
    public function getdeptsub($bahagian) {
        $count=0;
        $output = array('0' => '-- Choose Section --');
        if (Yii::app()->session['lang'] == 'my')
            $output = array('0' => '-- Pilih Seksyen --');
        if ($bahagian != '') {
            $model = LkpUnit::model()->findAll(array("condition" => "BAHAGIAN_ID='$bahagian' ORDER BY UNIT ASC"));
            if (sizeof($model) > 0) {
                $count++;
                foreach ($model as $row) {
                    $output[$row->UNIT_ID] = $row->UNIT;
                    if (Yii::app()->session['lang'] == 'my'){
                        $output[$row->UNIT_ID] = $row->UNIT_MY;
                    }
//                    $this->getsub($row->UNIT_ID, $output, 0);
                }
            }
        }
        return $output;
    }
    public function getsub($bahagian, &$output, $count) {

        $model = $this->findAll(array("condition" => "BAHAGIAN_ID=$bahagian"));
        if (sizeof($model) > 0) {
            $count++;
            foreach ($model as $key => $row) {
                $output[$row->UNIT_ID] = $this->getmarker($count) . ' ' . ($key + 1) . '. ' . $row->UNIT;
                $this->getsub($row->UNIT_ID, $output, $count);
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
    
    public function getbahagian($id) {
        $model = LkpBahagian::model()->findByPk($id);
        if(sizeof($model) > 0){
            echo $model->BAHAGIAN;
        }else{
            echo "Data not found.";
        }
    }
}
