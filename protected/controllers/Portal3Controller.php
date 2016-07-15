<?php

class Portal3Controller extends Controller {
    
    public $session;
    
    public function init() {
        OstVisitor::model()->AddVisitor();
        Yii::app()->theme = "portal3";
        parent::init();
    }
    
    public function actionLeft() {
        $this->render('left');
    }
    
    public function actionFull() {
        $this->render('full');
    }

    public function actionList() {
        $model = new OstArticles('search');
        $model->unsetAttributes();
        if (isset($_GET['OstArticles']))
            $model->attributes = $_GET['OstArticles'];
        $this->render('list', array('model' => $model));
    }

    public function actionArticle() {
        $this->render('article');
    }

    public function actionSetlang($lang) {
        Yii::app()->session['lang'] = $lang;
        $this->redirect(Yii::app()->request->urlReferrer);
    }

    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionLom_en($menu_id) {
        $criteria = new CDbCriteria();
        $count = OstLom::model()->count($criteria);
        $pages = new CPagination($count);
        // results per page
        $pages->pageSize = 10;
        $pages->applyLimit($criteria);
        $models = OstLom::model()->findAll($criteria);

        $this->render('lom_en', array('models' => $models, 'pages' => $pages));
    }
    
    public function actionLom_my($menu_id) {
        $criteria = new CDbCriteria();
        $count = OstLom::model()->count($criteria);
        $pages = new CPagination($count);
        // results per page
        $pages->pageSize = 10;
        $pages->applyLimit($criteria);
        $models = OstLom::model()->findAll($criteria);

        $this->render('lom_my', array('models' => $models, 'pages' => $pages));
    }

    public function actionPublication() {
        $this->render('publication');
    }

    public function actionPhotogallery() {
        $this->render('photogallery');
    }

    public function actionPhotogalleryview() {
        $this->render('photogalleryview');
    }
    
    public function actionAudiogallery() {
        $this->render('audiogallery');
    }
    
    public function actionVideogallery() {
        $this->render('videogallery');
    }
    
    public function actionVideogalleryview() {
        $this->render('videogalleryview');
    }
    
    public function actionDirectory() {
        $this->render('directory');
    }
    
    public function actionLom2() {
        $model2 = new OstLomHits;
        
        $id = $_GET['id'];
        $model = OstLom::model()->findByPK($id);
        if (sizeof($model) > 0) {
            $hits = $model->hits + 1;
            OstLom::model()->updateByPk($model->id, array('hits' => $hits));
            $model2->lom_id = $id;
            $model2->save();
        }
        $this->redirect($model->lom_doc);
    }
    
    public function actionChangeDept() {
        
        $bahagian = $_POST['BAHAGIAN_ID'];   
        echo CHtml::dropdownlist('LkpUnit[UNIT_ID]', '', LkpUnit::model()->getdeptsub($bahagian), array('class' => 'col-sm-12'));        
    }
    
    public function actionSearch(){
        $this->render('search');
    }
    
    public function actionPublicationCounter() {
        
        $id = $_GET['id'];
        $model = OstPublication::model()->findByPK($id);
        if (sizeof($model) > 0) {
            $hits = $model->hits + 1;
            OstPublication::model()->updateByPk($model->id, array('hits' => $hits));
        }
        $this->redirect($model->lom_doc);
    }
    
//    public function actionArchives(){
//        $this->render('archives');
//    }
    
    public function actionArchives2($menu_id) {
        print_r($menu_id); exit;
//        $criteria = new CDbCriteria();
//        $count = OstLom::model()->count($criteria);
//        $pages = new CPagination($count);
//        // results per page
//        $pages->pageSize = 10;
//        $pages->applyLimit($criteria);
//        $models = OstMedia::model()->findAll($criteria);
$this->render('archives');
        //$this->render('archives', array('models' => $models, 'pages' => $pages));
    }
    
    public function actionArchives($menu_id){
        $data['menu_id'] = $menu_id;
        $this->render('archives', $data);
    }
}