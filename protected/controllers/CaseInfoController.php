<?php

class CaseInfoController extends CmsController {

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new CaseInfo;
        $model2 = new CaseInfo;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['CaseInfo'])) {
            $model->attributes = $_POST['CaseInfo'];
            //$model->url = $_POST['CaseInfo']['doc_url'];
            $model->case_type = $_GET['case_type'];
            if($_GET['case_type'] != 'trial'){
                if ($model->save(false)) {
                    $model2->url = $_POST['url_my'];
                    $model2->lang = 'my';
                    $model2->parent_id = $model->id;
                    $model2->save(false);
                }
            } else {
                if ($model->save(false)) {
                    $model2->criminal_url = $_POST['criminal_url_my'];
                    $model2->civil_url = $_POST['civil_url_my'];
                    $model2->lang = 'my';
                    $model2->parent_id = $model->id;
                    $model2->save(false);
                }
            }
            $this->redirect('index.php?r=caseInfo/admin&case_type='.$_GET['case_type']);
        }

        $this->render('create', array(
            'model' => $model, 'model2' => $model2,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $model2 = CaseInfo::model()->findByAttributes(array('parent_id' => $id));

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['CaseInfo'])) {
            $model->attributes = $_POST['CaseInfo'];
            if($_GET['case_type'] != 'trial'){
                if ($model->save(false)) {
                    $model2->url = $_POST['url_my'];                    
                    $model2->save(false);
                }
            } else {
                if ($model->save(false)) {
                    $model2->criminal_url = $_POST['criminal_url_my'];
                    $model2->civil_url = $_POST['civil_url_my'];
                    $model2->save(false);
                }
            }
            $this->redirect('index.php?r=caseInfo/admin&case_type='.$_GET['case_type']);
        }

        $this->render('update', array(
            'model' => $model, 'model2' => $model2,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = $this->loadModel($id);
        $model2 = CaseInfo::model()->findByAttributes(array('parent_id' => $id));

        $model->flag = 1;
           
        if ($model->save(false)) {
            $model2->flag = 1;
            if($model2->save(false)){
                $this->redirect('index.php?r=caseInfo/admin&case_type='.$_GET['case_type']);
            }
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('CaseInfo');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new CaseInfo('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['CaseInfo']))
            $model->attributes = $_GET['CaseInfo'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return CaseInfo the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = CaseInfo::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CaseInfo $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'case-info-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
