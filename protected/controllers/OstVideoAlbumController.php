<?php

class OstVideoAlbumController extends CmsController {

    public function actionCreate() {
        $model = new OstVideoAlbum;
        $model2 = new OstVideoAlbum;

        if (isset($_POST['OstVideoAlbum'])) {
            $model->attributes = $_POST['OstVideoAlbum'];

            if (isset($_POST['date']) && $_POST['date'] != '') {
                $date_explode = explode(' - ', $_POST['date']);
                $display_doc_dt = explode('-', $date_explode[0]);
                $model->event_dt = $display_doc_dt[0] . '-' . $display_doc_dt[1] . '-' . $display_doc_dt[2] . ' 00:00:00';
            }

            if ($model->save()) {
                $model2->title = $_POST['title_my'];
                $model2->descr = $_POST['descr_my'];
                $model2->parent_id = $model->id;
                $model2->lang = 'my';
                $model2->save(false);

                OstAuditTrail::model()->insertlog(17, 'create', $model->id);
                $this->redirect("index.php?r=ostVideoAlbum/admin");
            }
        }

        $this->render('create', array(
            'model' => $model, 'model2' => $model2
        ));
    }

    public function actionUpdate($id) {

        $model = $this->loadModel($id);
        $model2 = OstVideoAlbum::model()->findByAttributes(array('parent_id' => $model->id));
        $model5 = OstVideoList::model()->findAllByAttributes(array('album_id' => $id), array('order' => 'sort ASC'));

        if (isset($_POST['OstVideoAlbum'])) {

            if (isset($_POST['videolist']) && sizeof($_POST['videolist']) > 0) {
                foreach ($_POST['videolist'] as $x) {
                    $model3 = new OstVideoList;
                    $model3->album_id = $id;
                    $model3->sort = $_POST['videolist_sort_' . $x];
                    $model3->url = $_POST['videolist_imgurl_' . $x];
                    $model3->save(false);
                }
            }

            if (isset($_POST['videolist_old'])) {
                if (sizeof($_POST['videolist_old']) > 0) {
                    foreach ($_POST['videolist_old'] as $y) {
                        $old_id = $y;
                        $old_sort = $_POST['videolist_old_sort_' . $y];
                        OstVideoList::model()->updateByPk($old_id, array('sort' => $old_sort));
                    }
                }
            }

            $model->attributes = $_POST['OstVideoAlbum'];

            if (isset($_POST['date']) && $_POST['date'] != '') {
                $date_explode = explode(' - ', $_POST['date']);
                $display_doc_dt = explode('-', $date_explode[0]);
                $model->event_dt = $display_doc_dt[0] . '-' . $display_doc_dt[1] . '-' . $display_doc_dt[2] . ' 00:00:00';
            }

            if ($model->save()) {
                $model2->title = $_POST['title_my'];
                $model2->descr = $_POST['descr_my'];
                $model2->parent_id = $model->id;
                $model2->lang = 'my';
                $model2->save(false);

                //$this->redirect('index.php?r=OstVideoAlbum/update&id=' . $model->id);
                OstAuditTrail::model()->insertlog(17, 'update', $model->id);
                $this->redirect('index.php?r=OstVideoAlbum/admin');
            }
        }
        $this->render('update', array('model' => $model, 'model2' => $model2, 'model5' => $model5));
    }

    public function actionDelete($id) {
        $model = $this->loadModel($id);
        $this->loadModel($id)->delete();
        OstVideoAlbum::model()->deleteAllByAttributes(array('parent_id' => $id));
        OstAuditTrail::model()->insertlog(17, 'delete', $model->id);
        $this->redirect("index.php?r=ostVideoAlbum/admin");
    }

    public function actionDeleteVideo($id) {
        $model = OstVideoList::model()->findByPk($id);
        $model2 = OstVideoAlbum::model()->findByAttributes(array('id' => $model->id));
        $model->delete();
        $this->redirect('index.php?r=ostVideoAlbum/update&id=' . $model->album_id);
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('OstVideoAlbum');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new OstVideoAlbum('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['OstVideoAlbum']))
            $model->attributes = $_GET['OstVideoAlbum'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return OstVideoAlbum the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = OstVideoAlbum::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param OstVideoAlbum $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'ost-video-album-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}