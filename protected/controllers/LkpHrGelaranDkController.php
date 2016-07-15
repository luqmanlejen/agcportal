<?php

class LkpHrGelaranDkController extends CmsController {

    public function actionCreate() {
        $model = new LkpHrGelaranDk;

        if (isset($_POST['LkpHrGelaranDk'])) {
            $model->attributes = $_POST['LkpHrGelaranDk'];
            if ($model->save())
                $this->redirect(array('admin'));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }
    
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        if (isset($_POST['LkpHrGelaranDk'])) {
            $model->attributes = $_POST['LkpHrGelaranDk'];
            if ($model->save())
                $this->redirect(array('admin'));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('LkpHrGelaranDk');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new LkpHrGelaranDk('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['LkpHrGelaranDk']))
            $model->attributes = $_GET['LkpHrGelaranDk'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = LkpHrGelaranDk::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'lkp-hr-gelaran-dk-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
