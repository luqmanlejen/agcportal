<?php

class OstPublicationController extends CmsController {

    public function actionCreate($doc_type) {
        $model = new OstPublication;
        $model2 = new OstPublication;

        if (isset($_POST['OstPublication'])) {
            $model->attributes = $_POST['OstPublication'];

            $model->doc_type = $doc_type;
            
            /* Display Date Range */
            if ($model->publish_startdt != '' && $model->publish_enddt != '') {
                $daterange_explode = explode(' - ', $_POST['daterange']);
                //$display_startdt_exp = explode('-', $daterange_explode[0]);
                //$display_enddt = explode('-', $daterange_explode[1]);
                $model->publish_startdt = $daterange_explode[0] . ' 00:00:00';
                $model->publish_enddt = $daterange_explode[1] . ' 00:00:00';
            }

            if (isset($_POST['date']) && $_POST['date'] != '') {
                $date_explode = explode(' - ', $_POST['date']);
                $display_doc_dt = explode('-', $date_explode[0]);
                $model->doc_dt = $display_doc_dt[0] . '-' . $display_doc_dt[1] . '-' . $display_doc_dt[2] . ' 00:00:00';
            }
            
//            if ($model->chckmenuapprovalsts($doc_type) == 'n')
//                $model->approval_sts = 'publish';
//            if ($model->chckmenuapprovalsts($doc_type) == 'y')
//                $model->approval_sts = 'draft';
                
                $model->display_type = $_POST['OstPublication']['display_type'];
 
            if ($model->save()) {
                $model2->title = $_POST['title_my'];
                $model2->parent_id = $model->id;
                $model2->lang = 'my';
                $model2->doc_url = $_POST['doc_url_bm'];
                $model2->display_type = '';
                $model2->save(false);

                if ($doc_type == '') {
                    OstAuditTrail::model()->insertlog(20, 'create', $model->id);
                    $this->redirect("index.php?r=ostPublication/admin");
                } else {
                    if ($doc_type == 'speeches')
                        OstAuditTrail::model()->insertlog(22, 'create', $model->id);
                    if ($doc_type == 'annual')
                        OstAuditTrail::model()->insertlog(23, 'create', $model->id);
                    if ($doc_type == 'activities')
                        OstAuditTrail::model()->insertlog(24, 'create', $model->id);
                    if ($doc_type == 'press')
                        OstAuditTrail::model()->insertlog(25, 'create', $model->id);

                    $this->redirect("index.php?r=ostPublication/admin&doc_type=" . $doc_type);
                }
            }
        }

        $this->render('create', array('model' => $model,
            'model2' => $model2,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id, $doc_type) {
        $model = $this->loadModel($id);
        $model2 = OstPublication::model()->findByAttributes(array('parent_id' => $id));


        if (isset($_POST['OstPublication'])) {
            $model->attributes = $_POST['OstPublication'];

            $model->doc_type = $_GET['doc_type'];

            /* Display Date Range */
//                if (!$model->isNewRecord) {
            $daterange_explode = explode(' - ', $_POST['daterange']);
            $display_startdt_exp = explode(' ', $daterange_explode[0]);
            $display_startdt_exp = explode(' ', $daterange_explode[1]);
            //$display_enddt = explode('/', $daterange_explode[1]);
            $model->publish_startdt = $daterange_explode[0]; // . '-' . $display_startdt_exp[1] . '-' . $display_startdt_exp2[2] . ' 00:00:00';
            $model->publish_enddt = $daterange_explode[1]; // . '-' . $display_enddt[1] . '-' . $display_enddt[2] . ' 00:00:00';

            $date_explode = explode(' - ', $_POST['date']);
            $display_doc_dt = explode('-', $date_explode[0]);
            $model->doc_dt = $display_doc_dt[0] . '-' . $display_doc_dt[1] . '-' . $display_doc_dt[2]; // . ' 00:00:00';
//                } else {
//                    $model->publish_startdt = $model->publish_startdt;
//                    $model->publish_enddt = $model->publish_enddt;
//                    $model->doc_dt = $model->doc_dt;
//                }
            
            $model->display_type = $_POST['OstPublication']['display_type'];
            
            if ($model->save()) {
                $model2->title = $_POST['title_my'];
                $model2->parent_id = $model->id;
                $model2->lang = 'my';
                $model2->doc_url = $_POST['doc_url_bm'];
                $model2->save(false);

                if ($model->doc_type === '') {
                    OstAuditTrail::model()->insertlog(20, 'update', $model->id);
                    $this->redirect("index.php?r=ostPublication/admin");
                } else {
                    if ($model->doc_type === 'speeches')
                        OstAuditTrail::model()->insertlog(22, 'update', $model->id);
                    if ($model->doc_type === 'annual')
                        OstAuditTrail::model()->insertlog(23, 'update', $model->id);
                    if ($model->doc_type === 'activities')
                        OstAuditTrail::model()->insertlog(24, 'update', $model->id);
                    if ($model->doc_type === 'press')
                        OstAuditTrail::model()->insertlog(25, 'update', $model->id);

                    $this->redirect("index.php?r=ostPublication/admin&doc_type=" . $model->doc_type);
                }
            }
        }

        $this->render('update', array('model' => $model,
            'model2' => $model2,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = $this->loadModel($id);
        $model->doc_type = $_GET['doc_type'];
        if ($model->doc_type === '') {
            OstAuditTrail::model()->insertlog(20, 'delete', $model->id);
            $this->redirect("index.php?r=ostPublication/admin");
        } else {
            if ($model->doc_type === 'speeches')
                OstAuditTrail::model()->insertlog(22, 'delete', $model->id);
            if ($model->doc_type === 'annual')
                OstAuditTrail::model()->insertlog(23, 'delete', $model->id);
            if ($model->doc_type === 'activities')
                OstAuditTrail::model()->insertlog(24, 'delete', $model->id);
            if ($model->doc_type === 'press')
                OstAuditTrail::model()->insertlog(25, 'delete', $model->id);
//                    
            $this->loadModel($id)->delete();
            OstPublication::model()->deleteAllByAttributes(array('parent_id' => $id));

            $this->redirect("index.php?r=ostPublication/admin&doc_type=" . $model->doc_type);
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('OstPublication');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin() {
        $model = new OstPublication('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['OstPublication']))
            $model->attributes = $_GET['OstPublication'];

        $this->render('admin', array('model' => $model,));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return OstPublication the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = OstPublication::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param OstPublication $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'ost-publication-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function actionArchive($id, $doc_type = '') {

        OstPublication::model()->updateByPk($id, array('status' => 'arc'));
        $model2 = OstPublication::model()->findByAttributes(array('parent_id' => $id));
        OstPublication::model()->updateByPk($model2->id, array('status' => 'arc'));
        //OstPublicationStatus::model()->insertlog($id, 'archive');

        if ($doc_type == '')
            $this->redirect("index.php?r=ostPublication/admin");
        else
            $this->redirect("index.php?r=ostPublication/admin&doc_type=" . $doc_type);
    }

    public function actionUnarchive($id, $doc_type = '') {

        OstPublication::model()->updateByPk($id, array('status' => 'psh'));
        $model2 = OstPublication::model()->findByAttributes(array('parent_id' => $id));
        OstPublication::model()->updateByPk($model2->id, array('status' => 'psh'));
        //OstArticlesStatus::model()->insertlog($id, 'publish');

        if ($doc_type == '')
            $this->redirect("index.php?r=ostPublication/admin");
        else
            $this->redirect("index.php?r=ostPublication/admin&doc_type=" . $doc_type);
    }
    
    public function chckmenuapprovalsts($menu_id) {

        $model = OstMenuPortal::model()->findByPk($menu_id);

        if (sizeof($model) > 0) {

            if ($model->required_approval == 1)
                return 'y';
            else
                return 'n';
        }
    }
}
