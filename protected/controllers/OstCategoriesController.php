<?php

class OstCategoriesController extends CmsController {

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
        $model = new OstCategories;
        $model2 = new OstCategories;

        if (isset($_POST['OstCategories'])) {
            $model->attributes = $_POST['OstCategories'];

            if ($model->save()) {
                $model2->title = $_POST['title_my'];
                $model2->parent_lang = $model->id;
                $model2->lang = 'my';
                $model2->save(false);
                OstAuditTrail::model()->insertlog(198, 'create', $model->id);
                $this->redirect("index.php?r=ostCategories/admin");
            }



            //
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
        $model2 = OstCategories::model()->findByAttributes(array('parent_lang' => $id));

        if (isset($_POST['OstCategories'])) {
            $model->attributes = $_POST['OstCategories'];

            if ($model->save()) {
                $model2->title = $_POST['title_my'];
                $model2->parent_lang = $model->id;
                $model2->lang = 'my';
                $model2->save(false);
            }

            OstAuditTrail::model()->insertlog(198, 'update', $model->id);

            $this->redirect(array('admin', 'id' => $model->id));
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
        OstAuditTrail::model()->insertlog(198, 'delete', $id);
        OstCategories::model()->deleteAllByAttributes(array('parent_lang' => $id));
        $this->loadModel($id)->delete();
        $this->redirect("index.php?r=OstCategories/admin");
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('OstCategories');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new OstCategories('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['OstCategories']))
            $model->attributes = $_GET['OstCategories'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return OstCategories the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = OstCategories::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param OstCategories $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'ost-categories-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function actionChangeParent() {

        $parent_cat = $_POST['OstCategories']['parent_cat'];
        
        echo CHtml::dropdownlist('OstCategories[parent_cat2]', '', OstCategories::model()->getparentsublist($parent_cat), array('class' => 'col-sm-12'));
    }
    
    public function actionChangeParent2() {

        $parent_cat = $_POST['parent_cat'];
        
        echo CHtml::dropdownlist('OstCategories[parent_cat2]', '', OstCategories::model()->getparentsublist($parent_cat), array('class' => 'col-sm-12'));
    }

}
