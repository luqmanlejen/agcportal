<?php

/**
 * This is the model class for table "ost_publication_status".
 *
 * The followings are the available columns in table 'ost_publication_status':
 * @property integer $id
 * @property integer $publication_id
 * @property string $approval_sts
 * @property string $action_datetime
 * @property integer $user_id
 */
class OstPublicationStatus extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'ost_publication_status';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('publication_id, approval_sts, action_datetime, user_id', 'required'),
            array('publication_id, user_id', 'numerical', 'integerOnly' => true),
            array('approval_sts', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, publication_id, approval_sts, action_datetime, user_id', 'safe', 'on' => 'search'),
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
            'id' => 'ID',
            'publication_id' => 'Publication',
            'approval_sts' => 'Approval Sts',
            'action_datetime' => 'Action Datetime',
            'user_id' => 'User',
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
        $criteria->compare('publication_id', $this->publication_id);
        $criteria->compare('approval_sts', $this->approval_sts, true);
        $criteria->compare('action_datetime', $this->action_datetime, true);
        $criteria->compare('user_id', $this->user_id);

        return new CActiveDataProvider($this, array('criteria' => $criteria,));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return OstPublicationStatus the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function insertlog($publication_id, $approval_sts) {
        $model = new OstPublicationStatus;
        $model->publication_id = $publication_id;
        $model->approval_sts = $approval_sts;
        $model->action_datetime = new CDbExpression('NOW()');
        $model->user_id = Yii::app()->session['user_id'];
        $model->save();
    }

}