<?php

class PortalController extends Controller {

    public function init() {
        OstVisitor::model()->AddVisitor();
        Yii::app()->theme = "portal";
        parent::init();
    }

    public function actionIndex($menu_id = '') {
        
        $model1 = OstPublication::model()->findAll();
        foreach($model1 as $mod){
            if(date('Y-09-04') == date('Y-m-d')){
                if($mod->status == 'psh')
                    $mod->status = 'arc';
                
                if(empty($mod->doc_url)){
                    $mod->doc_url = '(NULL)';
                }
                $mod->save();
            }
        }
        $model2 = OstMedia::model()->findAll();
        foreach($model2 as $mod2){
            if(date('Y-09-04') == date('Y-m-d')){
                if($mod2->status == 'psh')
                    $mod2->status = 'arc';
                
                if(empty($mod2->title)){
                    $mod2->title = '(NULL)';
                }
                $mod2->save();
            }
        }
        $model3 = OstPhotoAlbum::model()->findAll();
        foreach($model3 as $mod3){
            if(date('Y-09-04') == date('Y-m-d')){
                if(empty($mod3->title)){
                    $mod3->title = '(NULL)';
                }
                if(empty($mod3->descr)){
                    $mod3->descr = '(NULL)';
                }
                if($mod3->status == 'psh'){
                    $mod3->status = 'arc';
                }
                $mod3->save();
            }
        }
        $this->render('index');
    }

}