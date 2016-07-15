<?php

class LkpHrJawatanController extends CmsController {

    public function actionCreate() {
        $model = new LkpHrJawatan;

        if (isset($_POST['LkpHrJawatan'])) {
            $model->attributes = $_POST['LkpHrJawatan'];
            if ($model->save())
                $this->redirect(array('admin', 'id' => $model->JTN_ID));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        if (isset($_POST['LkpHrJawatan'])) {
            $model->attributes = $_POST['LkpHrJawatan'];
            if ($model->save())
                $this->redirect(array('admin', 'id' => $model->JTN_ID));
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
        $dataProvider = new CActiveDataProvider('LkpHrJawatan');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new LkpHrJawatan('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['LkpHrJawatan']))
            $model->attributes = $_GET['LkpHrJawatan'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function loadModel($id) {
        $model = LkpHrJawatan::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'lkp-hr-jawatan-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
