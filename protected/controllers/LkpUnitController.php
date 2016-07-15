<?php

class LkpUnitController extends CmsController {

    public function actionCreate() {
        $model = new LkpUnit;
        
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['LkpUnit'])) {
            $model->attributes = $_POST['LkpUnit'];
            $sort = LkpUnit::model()->findAll();
            $h = 0;
            foreach($sort as $s){
                if($s->UNIT_SORT > $h){
                    $h = $s->UNIT_SORT;
                }
            }
            $model->UNIT_SORT = ($h+1);
            if ($model->save()){
                $this->redirect(array('admin', 'id' => $model->UNIT_ID));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['LkpUnit'])) {
            $model->attributes = $_POST['LkpUnit'];
            if ($model->save())
                $this->redirect(array('admin', 'id' => $model->UNIT_ID));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }
    
    public function actionFlagDelete($id) {
        $model = $this->loadModel($id);
        
        //save flag delete data
        $model->FAX_FLAG_DELETE = 1;
        $model->save();
        
        $this->redirect('index.php?r=fax/admin');
    }
    
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('LkpUnit');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new LkpUnit('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['LkpUnit']))
            $model->attributes = $_GET['LkpUnit'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = LkpUnit::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'lkp-unit-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function actionChangeDept() {
        $bahagian = $_POST['LkpUnit']['BAHAGIAN_ID'];
        echo $bahagian;
        echo CHtml::dropdownlist('Fax[UNIT_ID]', '', LkpUnit::model()->getdeptsub($bahagian), array('class' => 'col-sm-12'));
    }
    
    public function actionCountUp($id){
        $model = LkpUnit::model()->findByPk($id);
        $model2 = LkpUnit::model()->findBySQL("SELECT * FROM LKP_UNIT WHERE UNIT_ID != $model->UNIT_ID AND UNIT_SORT IS NOT NULL AND UNIT_SORT=($model->UNIT_SORT-1)");
        
        $count = 0;
        
        while (sizeof($model2) != 1){
            $count++;
            $model2 = LkpUnit::model()->findBySQL("SELECT * FROM LKP_UNIT WHERE UNIT_ID != $model->UNIT_ID AND UNIT_SORT=($model->UNIT_SORT-$count)");
            echo sizeof($model2);
        }
        
//        exit;
        if(sizeof($model2) > 0){
            LkpUnit::model()->updateByPk($model->UNIT_ID, array('UNIT_SORT' => ($model2->UNIT_SORT)));
            LkpUnit::model()->updateByPk($model2->UNIT_ID, array('UNIT_SORT' => ($model->UNIT_SORT)));
        } else {
            LkpUnit::model()->updateByPk($model->UNIT_ID, array('UNIT_SORT' => ($model->UNIT_SORT - 1)));
        }
        $this->redirect('index.php?r=lkpUnit/admin');
    }
   
    
    public function actionCountDown($id){
        $model = LkpUnit::model()->findByPk($id);
        $model2 = LkpUnit::model()->findBySQL("SELECT * FROM LKP_UNIT WHERE UNIT_ID != $model->UNIT_ID AND UNIT_SORT=($model->UNIT_SORT+1)");
        
        $count = 0;
        while (sizeof($model2) != 1){
            $count++;
            $model2 = LkpUnit::model()->findBySQL("SELECT * FROM LKP_UNIT WHERE UNIT_ID != $model->UNIT_ID AND UNIT_SORT=($model->UNIT_SORT+$count)");
//            echo sizeof($model2);
        }

        if(sizeof($model2) > 0){
            LkpUnit::model()->updateByPk($model->UNIT_ID, array('UNIT_SORT' => ($model2->UNIT_SORT)));
            LkpUnit::model()->updateByPk($model2->UNIT_ID, array('UNIT_SORT' => ($model->UNIT_SORT)));
        } else {
            LkpUnit::model()->updateByPk($model->UNIT_ID, array('UNIT_SORT' => ($model->UNIT_SORT + 1)));
        }
        $this->redirect('index.php?r=lkpUnit/admin');
    }

}
