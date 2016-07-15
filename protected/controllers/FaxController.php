<?php

class FaxController extends CmsController {

    public function actionCreate() {
        $model = new Fax;
        
        if (isset($_POST['Fax'])) {
            $model->attributes = $_POST['Fax'];
            
            //sort
            $sorts = Fax::model()->findAll(array('order' => 'FAX_SORT DESC'));
            $sort = '';
            $highest = 0;
            if(sizeof($sorts) > 0){
                foreach($sorts as $s){
                    if($s->FAX_SORT >= $highest){
                        $highest = $s->FAX_SORT;
                        $sort = $highest + 1;
                    }
                }
            }else{
                $sort = 1;
            }
            $model->FAX_SORT = $sort;
            
            if ($model->save()){
                $this->redirect('index.php?r=fax/admin');
            }
        }

        $this->render('create', array('model' => $model,));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        if (isset($_POST['Fax'])) {
            $model->attributes = $_POST['Fax'];
            if ($model->save(false))
                $this->redirect('index.php?r=fax/admin');
        }

        $this->render('update', array('model' => $model,));
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
        $dataProvider = new CActiveDataProvider('Fax');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new Fax('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Fax']))
            $model->attributes = $_GET['Fax'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = Fax::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'fax-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function actionChangeDept() {
        $bahagian = $_POST['Fax']['FAX_DIVISION'];
        echo $bahagian;
        echo CHtml::dropdownlist('Fax[FAX_SEC_UNIT]', '', LkpUnit::model()->getdeptsub($bahagian), array('class' => 'col-sm-12'));
    }
    
    public function actionCountUp($id){
        $model = Fax::model()->findByPk($id);
        $model2 = Fax::model()->findBySQL("SELECT * FROM HR_FAX WHERE FAX_ID != $model->FAX_ID AND FAX_SORT=($model->FAX_SORT-1)");
        
        $count = 0;
        while (sizeof($model2) != 1){
            $count++;
            $model2 = Fax::model()->findBySQL("SELECT * FROM HR_FAX WHERE FAX_ID != $model->FAX_ID AND FAX_SORT=($model->FAX_SORT-$count)");
            echo sizeof($model2);
        }

        if(sizeof($model2) > 0){
            Fax::model()->updateByPk($model->FAX_ID, array('FAX_SORT' => ($model2->FAX_SORT)));
            Fax::model()->updateByPk($model2->FAX_ID, array('FAX_SORT' => ($model->FAX_SORT)));
        } else {
            Fax::model()->updateByPk($model->FAX_ID, array('FAX_SORT' => ($model->FAX_SORT - 1)));
        }
        $this->redirect('index.php?r=fax/admin');
    }
   
    
    public function actionCountDown($id){
        $model = Fax::model()->findByPk($id);
        $model2 = Fax::model()->findBySQL("SELECT * FROM HR_FAX WHERE FAX_ID != $model->FAX_ID AND FAX_SORT=($model->FAX_SORT+1)");
        
        $count = 0;
        while (sizeof($model2) != 1){
            $count++;
            $model2 = Fax::model()->findBySQL("SELECT * FROM HR_FAX WHERE FAX_ID != $model->FAX_ID AND FAX_SORT=($model->FAX_SORT+$count)");
            echo sizeof($model2);
        }
        
        if(sizeof($model2) > 0){
            Fax::model()->updateByPk($model->FAX_ID, array('FAX_SORT' => ($model2->FAX_SORT)));
            Fax::model()->updateByPk($model2->FAX_ID, array('FAX_SORT' => ($model->FAX_SORT)));
        } else {        
            Fax::model()->updateByPk($model->FAX_ID, array('FAX_SORT' => ($model->FAX_SORT + 1)));
        }
        
        $this->redirect('index.php?r=fax/admin');
    }
}
