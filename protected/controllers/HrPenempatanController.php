<?php

class HrPenempatanController extends CmsController {

    public function actionCreate() {
        $model = new HrPenempatan;
        $model2 = new HrStaffPeribadi;
        $model3 = new LkpHrJawatan;
        $model4 = new LkpUnit;
        $model5 = new LkpBahagian;
        $model6 = new LkpGred;


//        $model2 = HrStaffPeribadi::model()->findByAttributes(array('STF_ID' => $model->PEN_STF_ID));
//        $model3 = LkpHrJawatan::model()->findByAttributes(array('JTN_ID' => $model2->STF_JWTN_ID));
//        $model4 = LkpUnit::model()->findByAttributes(array('UNIT_ID' => $model->PEN_UNIT_ID));
//        $model5 = LkpBahagian::model()->findByAttributes(array('BAHAGIAN_ID' => $model->PEN_BHGN_ID));

        if (isset($_POST['HrPenempatan'], $_POST['HrStaffPeribadi'])) {
            $model->attributes = $_POST['HrPenempatan'];
            $model2->attributes = $_POST['HrStaffPeribadi'];

            $model2->STF_NO_TEL_PEJABAT = $_POST['HrStaffPeribadi']['STF_NO_TEL_PEJABAT'];
            if ($model2->save(false)) {


                $model2->STF_NAMA = $_POST['HrStaffPeribadi']['STF_NAMA'];
//                $model2->save(false);
                $model->save(false);
            }
            $this->redirect(array('admin', 'id' => $model->PEN_ID));
        }

        $this->render('create', array(
            'model' => $model, 'model2' => $model2, 'model3' => $model3, 'model4' => $model4, 'model5' => $model5, 'model6' => $model6
        ));
    }

//    public function actionUpdate($id) {
//        $model = $this->loadModel($id);
//        $model2 = HrStaffPeribadi::model()->findByAttributes(array('STF_ID' => $model->PEN_STF_ID));
//        $model3 = LkpHrJawatan::model()->findByAttributes(array('JTN_ID' => $model2->STF_JWTN_ID));
//        $model4 = LkpUnit::model()->findByAttributes(array('UNIT_ID' => $model->PEN_UNIT_ID));
//        $model5 = LkpBahagian::model()->findByAttributes(array('BAHAGIAN_ID' => $model->PEN_BHGN_ID));
//        $model6 = LkpGred::model()->findByAttributes(array('GRED_ID' => $model2->STF_GRED_ID));
//        
//        
//        
//        if (isset($_POST['HrPenempatan'])) {
//            $model->PEN_BHGN_ID = $_POST['LkpBahagian']['BAHAGIAN_ID'];
//            $model->PEN_UNIT_ID = $_POST['LkpUnit']['UNIT_ID'];
//            if ($model->save()){
//                $model2->STF_NAMA = $_POST['HrStaffPeribadi']['STF_NAMA'];
//                $model2->STF_JWTN_ID = $_POST['HrStaffPeribadi']['STF_JWTN_ID'];
//                $model2->STF_NO_TEL_PEJABAT = $_POST['HrStaffPeribadi']['STF_NO_TEL_PEJABAT'];
//                
//                if($model2->save(false))
//                    $this->redirect(array('admin', 'PEN_ID' => $model->PEN_ID));
//            }   
//        }
//        $this->render('update', array(
//            'model' => $model, 'model2' => $model2, 'model3' => $model3, 'model4' => $model4, 'model5' => $model5, 'model6' => $model6
//        ));
//    }

    public function actionUpdate($id, $bhgn, $unit) {
        $model = $this->loadModel($id);
        $model2 = HrStaffPeribadi::model()->findByAttributes(array('STF_ID' => $model->PEN_STF_ID));
        $model3 = LkpHrJawatan::model()->findByAttributes(array('JTN_ID' => $model2->STF_JWTN_ID));
        $model4 = LkpUnit::model()->findByAttributes(array('UNIT_ID' => $model->PEN_UNIT_ID));
        $model5 = LkpBahagian::model()->findByAttributes(array('BAHAGIAN_ID' => $model->PEN_BHGN_ID));
        $model6 = LkpGred::model()->findByAttributes(array('GRED_ID' => $model2->STF_GRED_ID));

        $toaddress = '';
        $toname = '';
        $subject = 'PEMAKLUMAN PENEMPATAN DI DALAM BAHAGIAN';


        if (isset($_POST['HrPenempatan'])) {

            $model->PEN_SORT = $_POST['HrPenempatan']['PEN_SORT'];

            //email
            $counter = 0;
            $count_sender = 0;
            $email_sender = array();
            $emails = OstRefList::model()->findAll(array('condition' => "cat_id=12 AND lang='en'"));
            foreach ($emails as $email) {
                $email_sender[$count_sender] = $email->label;
                $count_sender++;
            }
            //$bahagian = LkpBahagian::model()->findByPk($_POST['LkpBahagian']['BAHAGIAN_ID']);
            //exit;
            //email

            if ($model->PEN_BHGN_ID == $_POST['LkpBahagian']['BAHAGIAN_ID'] && $model->PEN_UNIT_ID == $_POST['LkpUnit']['UNIT_ID']) {
//                $model->PEN_GREDJWT_ID = $_POST['LkpGred']['GRED_ID'];

                $PEN_UNIT_NAME = LkpUnit::model()->findByPk($model->PEN_UNIT_ID);
                $PEN_BHGN_NAME = LkpBahagian::model()->findByPk($model->PEN_BHGN_ID);

                if ($model->save(false)) {

                    $model2->STF_TITLE = $_POST['HrStaffPeribadi']['STF_TITLE'];
                    $model2->STF_JWTN_ID = $_POST['HrStaffPeribadi']['STF_JWTN_ID'];
                    $model2->STF_NO_TEL_PEJABAT = $_POST['HrStaffPeribadi']['STF_NO_TEL_PEJABAT'];
//                  $model2->STF_GRED_ID = $_POST['LkpGred']['GRED_ID'];
                    $model2->save(false);
                    $content = 'Tuan/Puan,<br>
<br> 
PEMAKLUMAN PENEMPATAN DI DALAM BAHAGIAN<br>
<br> 
Dengan hormatnya saya diarah merujuk kepada perkara di atas.<br><br>

2.            Untuk maklumat tuan/puan, mohon kerjasama tuan/puan untuk mengemas kini maklumat CREST/e-mel bagi pegawai di bawah kerana telah ditempatkan ke :<br><br>


<table>
                <tr>
                                <td>Nama Pegawai</td>
                                <td>:</td>
                                <td>' . $_POST["HrStaffPeribadi"]["STF_NAMA"] . '</td>
                </tr>
                <tr>
                                <td>Bahagian</td>
                                <td>:</td>
                                <td>' . $PEN_BHGN_NAME->BAHAGIAN . '</td>                     
                </tr>
                <tr>
                                <td>Unit</td>
                                <td>:</td>
                                <td>' . $PEN_UNIT_NAME->UNIT_MY . '</td>
                </tr>
</table>

<br>
3.            Perhatian dan kerjasama tuan/puan amatlah diharapkan.<br><br>

Sekian, terima kasih. <br><br><br>

ADMIN PORTAL<br><br>

*Disclaimer : Maklumat ini diambil dari Direktori Portal yang dimasukkan oleh pihak yang dilantik di setiap Bahagian*
';

                    while ($counter < $count_sender) {
                        $toaddress = 'safawati@agc.gov.my'; //$email_sender[$counter];
                        $toname = Yii::app()->session["email"];
                        //function untuk hantar email
                        if (($_POST['LkpBahagian']['BAHAGIAN_ID'] != $model5->BAHAGIAN_ID || $_POST['LkpUnit']['UNIT_ID'] != $model4->UNIT_ID) && $model5->BAHAGIAN_ID != 0 && $model4->UNIT_ID != 0) {
                            $sendemail = EmailFunction::SendEmail($toaddress, $toname, $subject, $content);
                        }

                        $counter++;
                    }
                    $this->redirect("index.php?r=hrPenempatan%2Fadmin&HrPenempatan%5BPEN_BHGN_ID%5D=$bhgn&HrPenempatan%5BPEN_UNIT_ID%5D=$unit");
                }
            } else {
                $status = HrPenempatan::model()->updateByPk($model->PEN_ID, array('PEN_STATUS_ID' => 2));

                $model = new HrPenempatan;
                $model3 = new LkpHrJawatan;
                //$model4 = new LkpUnit;
                // $model5 = new LkpBahagian;
                $model6 = new LkpGred;

                $model->PEN_STF_ID = $model2->STF_ID;
                $model->PEN_UNIT_ID = $_POST['LkpUnit']['UNIT_ID'];
                $model->PEN_BHGN_ID = $_POST['LkpBahagian']['BAHAGIAN_ID'];
//                $model->PEN_GREDJWT_ID = $_POST['LkpGred']['GRED_ID'];

                $PEN_UNIT_NAME = LkpUnit::model()->findByPk($model->PEN_UNIT_ID);
                $PEN_BHGN_NAME = LkpBahagian::model()->findByPk($model->PEN_BHGN_ID);

                if ($model->save(false)) {
                    $content = 'Tuan/Puan,<br>
<br> 
PEMAKLUMAN PENEMPATAN DI DALAM BAHAGIAN<br>
<br> 
Dengan hormatnya saya diarah merujuk kepada perkara di atas.<br><br>

2.            Untuk maklumat tuan/puan, mohon kerjasama tuan/puan untuk mengemas kini maklumat CREST/e-mel bagi pegawai di bawah kerana telah ditempatkan ke :<br><br>


<table>
                <tr>
                                <td>Nama Pegawai</td>
                                <td>:</td>
                                <td>' . $_POST["HrStaffPeribadi"]["STF_NAMA"] . '</td>
                </tr>
                <tr>
                                <td>Bahagian</td>
                                <td>:</td>
                                <td>' . $PEN_BHGN_NAME->BAHAGIAN . '</td>                     
                </tr>
                <tr>
                                <td>Unit</td>
                                <td>:</td>
                                <td>' . $PEN_UNIT_NAME->UNIT_MY . '</td>
                </tr>
</table>

<br>
3.            Perhatian dan kerjasama tuan/puan amatlah diharapkan.<br><br>

Sekian, terima kasih. <br><br><br>

ADMIN PORTAL<br><br>

*Disclaimer : Maklumat ini diambil dari Direktori Portal yang dimasukkan oleh pihak yang dilantik di setiap Bahagian*
';
                    while ($counter < $count_sender) {
                        $toaddress = 'safawati@agc.gov.my'; //$email_sender[$counter];
                        $toname = Yii::app()->session["email"];
                        //function untuk hantar email
                        if (($_POST['LkpBahagian']['BAHAGIAN_ID'] != $model5->BAHAGIAN_ID || $_POST['LkpUnit']['UNIT_ID'] != $model4->UNIT_ID) && $_POST['LkpBahagian']['BAHAGIAN_ID'] != 0 && $_POST['LkpUnit']['UNIT_ID'] != 0) {
                            $sendemail = EmailFunction::SendEmail($toaddress, $toname, $subject, $content);
                        }

                        $counter++;
                    }
                }
                $this->redirect("index.php?r=hrPenempatan%2Fadmin&HrPenempatan%5BPEN_BHGN_ID%5D=$bhgn&HrPenempatan%5BPEN_UNIT_ID%5D=$unit");
            }
        }
        $this->render('update', array(
            'model' => $model, 'model2' => $model2, 'model3' => $model3, 'model4' => $model4, 'model5' => $model5, 'model6' => $model6
        ));
    }

    public function actionFlagDelete($id) {
        $model = $this->loadModel($id);
        //$model2 = HrStaffPeribadi::model()->findByAttributes(array('STF_ID' => $model->PEN_STF_ID));

        HrPenempatan::model()->updateByPk($id, array('PEN_STATUS_ID' => 2));
        //save flag delete data
        //$model2->STF_FLAG_JENIS_STAF = 1;
        //$model2->save();

        $this->redirect('index.php?r=fax/admin');
    }

    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('HrPenempatan');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new HrPenempatan('search');
        $model2 = new HrStaffPeribadi('search');
        $model3 = new LkpUnit('search');
        $model4 = new LkpBahagian('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['HrPenempatan']))
            $model->attributes = $_GET['HrPenempatan'];

        $this->render('admin', array(
            'model' => $model, 'model2' => $model2, 'model3' => $model3, 'model4' => $model4
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return HrPenempatan the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = HrPenempatan::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param HrPenempatan $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'hr-penempatan-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionChangeDept() {

        $bahagian = $_POST['LkpBahagian']['BAHAGIAN_ID'];
        echo CHtml::dropdownlist('LkpUnit[UNIT_ID]', '', LkpUnit::model()->getdeptsub($bahagian), array('class' => 'col-sm-12'));
    }
    public function actionChangeDept2() {

        $bahagian = $_POST['HrPenempatan']['PEN_BHGN_ID'];
        echo CHtml::dropdownlist('HrPenempatan[PEN_UNIT_ID]', '', LkpUnit::model()->getdeptsub($bahagian), array('class' => 'col-sm-12'));
    }
    public function actionList() {
        $this->render('list');
    }

    public function actionListName() {
        $this->render('list_name');
    }

    public function actionListNameDetails() {
        //create new data
        $model = new HrPenempatan;
        $model2 = new HrStaffPeribadi;
        $model3 = new LkpHrJawatan;
        $model4 = new LkpUnit;
        $model5 = new LkpBahagian;
        $model6 = new LkpGred;

        $toaddress = '';
        $toname = '';
        $subject = 'PEMAKLUMAN PENEMPATAN DI DALAM BAHAGIAN';

        //get data from url
        $data['STF_ID'] = $_GET['STF_ID'];
        $data['STF_EMAIL'] = $_GET['STF_EMAIL'];
        $data['STF_NAMA'] = $_GET['STF_NAMA'];
        $data['STF_NOKP_BARU'] = $_GET['STF_NOKP_BARU'];
        if (isset($_GET['STF_NO_TEL_PEJABAT']) && $_GET['STF_NO_TEL_PEJABAT'] != '') {
            $data['STF_NO_TEL_PEJABAT'] = $_GET['STF_NO_TEL_PEJABAT'];
        }
        $data['STF_USERNAME'] = $_GET['STF_USERNAME'];



        if (isset($_POST['HrPenempatan']) || isset($_POST['HrStaffPeribadi'])) {
            $bahagian = LkpBahagian::model()->findByPk($_POST['LkpBahagian']['BAHAGIAN_ID']);
            $unit = LkpUnit::model()->findByPk($_POST['LkpUnit']['UNIT_ID']);
            //print_r($unit); exit;
            //email
            $counter = 0;
            $count_sender = 0;
            $email_sender = array();
            $emails = OstRefList::model()->findAll(array('condition' => "cat_id=12 AND lang='en'"));
            foreach ($emails as $email) {
                $email_sender[$count_sender] = $email->label;
                $count_sender++;
            }

            $PEN_UNIT_NAME = LkpUnit::model()->findByPk($_POST['LkpUnit']['UNIT_ID']);
            $PEN_BHGN_NAME = LkpBahagian::model()->findByPk($_POST['LkpBahagian']['BAHAGIAN_ID']);


            $content = 'Tuan/Puan,<br>
<br> 
PEMAKLUMAN PENEMPATAN DI DALAM BAHAGIAN<br>
<br> 
Dengan hormatnya saya diarah merujuk kepada perkara di atas.<br><br>

2.            Untuk maklumat tuan/puan, mohon kerjasama tuan/puan untuk mengemas kini maklumat CREST/e-mel bagi pegawai di bawah kerana telah ditempatkan ke :<br><br>


<table>
                <tr>
                                <td>Nama Pegawai</td>
                                <td>:</td>
                                <td>' . $_GET["STF_NAMA"] . '</td>
                </tr>
                <tr>
                                <td>Bahagian</td>
                                <td>:</td>
                                <td>' . $PEN_BHGN_NAME->BAHAGIAN . '</td>                     
                </tr>
                <tr>
                                <td>Unit</td>
                                <td>:</td>
                                <td>' . $PEN_UNIT_NAME->UNIT_MY . '</td>
                </tr>
</table>

<br>
3.            Untuk makluman tuan/puan, ini adalah data baru di Direktori Portal.<br>
<br>
4.            Perhatian dan kerjasama tuan/puan amatlah diharapkan.<br><br>

Sekian, terima kasih. <br><br><br>

ADMIN PORTAL<br><br>

*Disclaimer : Maklumat ini diambil dari Direktori Portal yang dimasukkan oleh pihak yang dilantik di setiap Bahagian*
';

            while ($counter < $count_sender) {
                $toaddress = 'safawati@agc.gov.my'; //$email_sender[$counter];
                $toname = Yii::app()->session["email"];
                //function untuk hantar email
                if ($model5->BAHAGIAN_ID != 0 && $model4->UNIT_ID != 0) {
                    $sendemail = EmailFunction::SendEmail($toaddress, $toname, $subject, $content);
                }
                $counter++;
            }
            //exit;
            //email

            $model2->STF_ID = $_GET['STF_ID'];
            $model2->STF_EMAIL = $_GET['STF_EMAIL'];
            $model2->STF_NAMA = $_GET['STF_NAMA'];
            $model2->STF_NOKP_BARU = $_GET['STF_NOKP_BARU'];

            if (isset($_GET['STF_NO_TEL_PEJABAT']) && $_GET['STF_NO_TEL_PEJABAT'] != '') {
                $model2->STF_NO_TEL_PEJABAT = $_GET['STF_NO_TEL_PEJABAT'];
            }

            $model2->STF_USERNAME = $_GET['STF_USERNAME'];
            $model2->STF_JWTN_ID = $_POST['HrStaffPeribadi']['STF_JWTN_ID'];
//            $model2->STF_GRED_ID = $_POST['LkpGred']['GRED_ID'];
            $model2->STF_NO_TEL_PEJABAT = $_POST['HrStaffPeribadi']['STF_NO_TEL_PEJABAT'];

            $user_exit = HrPenempatan::model()->findByAttributes(array('PEN_STF_ID' => $_GET['STF_ID'], 'PEN_STATUS_ID' => 1));
            //$status = HrPenempatan::model()->updateByPk($user_exit->PEN_ID, array('PEN_STATUS_ID' => 2));
            
            //sort
            $bhgn = $_POST['LkpBahagian']['BAHAGIAN_ID'];
            $unit = $_POST['LkpUnit']['UNIT_ID'];
            $sorts = HrPenempatan::model()->findAll(array('condition' => "PEN_BHGN_ID=$bhgn AND PEN_UNIT_ID=$unit",'order' => 'PEN_SORT DESC'));
            $sort = '';
            $highest = 0;
            if(sizeof($sorts) > 0){
                foreach($sorts as $s){
                    if($s->PEN_SORT >= $highest){
                        $highest = $s->PEN_SORT;
                        $sort = $highest + 1;
                    }
                }
            }else{
                $sort = 1;
            }
            echo $model->PEN_SORT = $sort;

//            echo $_GET['STF_ID'];
//            echo sizeof($user_exit);
//            exit;

            if (sizeof($user_exit) == 1) {
                //create same user

                $status = HrPenempatan::model()->updateByPk($user_exit->PEN_ID, array('PEN_STATUS_ID' => 2));
                $model->PEN_STF_ID = $_GET['STF_ID'];
                $model->PEN_UNIT_ID = $_POST['LkpUnit']['UNIT_ID'];
                $model->PEN_BHGN_ID = $_POST['LkpBahagian']['BAHAGIAN_ID'];
//                $model->PEN_GREDJWT_ID = $_POST['LkpGred']['GRED_ID'];
                if ($model->save(false)) {
                    $this->redirect('index.php?r=hrPenempatan/admin');
                }
            } else {
                //create new user
                if ($model2->save(false)) {
                    $model->PEN_STF_ID = $_GET['STF_ID'];
                    $model->PEN_UNIT_ID = $_POST['LkpUnit']['UNIT_ID'];
                    $model->PEN_BHGN_ID = $_POST['LkpBahagian']['BAHAGIAN_ID'];
//                    $model->PEN_GREDJWT_ID = $_POST['LkpGred']['GRED_ID'];
                    if ($model->save(false)) {
                        $this->redirect('index.php?r=hrPenempatan/admin');
                    }
                }
            }
        }
        $this->render('list_name_details', array(
            'data' => $data,
            'model' => $model, 'model2' => $model2, 'model3' => $model3, 'model4' => $model4, 'model5' => $model5, 'model6' => $model6
        ));
    }

    public function actionCountUp($id) {
        $model = HrPenempatan::model()->findByPk($id);
        $model2 = HrPenempatan::model()->findBySQL("SELECT * FROM HR_PENEMPATAN WHERE PEN_ID != $model->PEN_ID AND PEN_SORT=($model->PEN_SORT-1)");

        $count = 0;
        while (sizeof($model2) != 1) {
            $count++;
            $model2 = HrPenempatan::model()->findBySQL("SELECT * FROM HR_PENEMPATAN WHERE PEN_ID != $model->PEN_ID AND PEN_SORT=($model->PEN_SORT-$count)");
            echo sizeof($model2);
        }

        if (sizeof($model2) > 0) {
            HrPenempatan::model()->updateByPk($model->PEN_ID, array('PEN_SORT' => ($model2->PEN_SORT)));
            HrPenempatan::model()->updateByPk($model2->PEN_ID, array('PEN_SORT' => ($model->PEN_SORT)));
        } else {
            HrPenempatan::model()->updateByPk($model->PEN_ID, array('PEN_SORT' => ($model->PEN_SORT - 1)));
        }
        $this->redirect('index.php?r=hrPenempatan/admin');
    }
    public function actionCountUp2($id, $bhgn, $unit){
        $model = HrPenempatan::model()->findByPk($id);
        $model2 = HrPenempatan::model()->findBySQL("SELECT * FROM HR_PENEMPATAN WHERE PEN_ID != $model->PEN_ID AND PEN_SORT<$model->PEN_SORT AND PEN_BHGN_ID=$bhgn AND PEN_UNIT_ID=$unit AND PEN_STATUS_ID=1");
        
        $count=1;
        if($model->PEN_SORT >= $model2->PEN_SORT){
            $model2 = HrPenempatan::model()->findBySQL("SELECT * FROM HR_PENEMPATAN WHERE PEN_ID != $model->PEN_ID AND PEN_SORT=($model->PEN_SORT-$count) AND PEN_BHGN_ID=$bhgn AND PEN_UNIT_ID=$unit AND PEN_STATUS_ID=1");
            $count++;
        }
        
        if(sizeof($model2) > 0){
            HrPenempatan::model()->updateByPk($model->PEN_ID, array('PEN_SORT' => ($model2->PEN_SORT)));
            HrPenempatan::model()->updateByPk($model2->PEN_ID, array('PEN_SORT' => ($model->PEN_SORT)));
        } else {
            HrPenempatan::model()->updateByPk($model->PEN_ID, array('PEN_SORT' => ($model->PEN_SORT - 1)));
        }
        $this->redirect("index.php?r=hrPenempatan%2Fadmin&HrPenempatan%5BPEN_BHGN_ID%5D=$bhgn&HrPenempatan%5BPEN_UNIT_ID%5D=$unit");
    }
    
    public function actionCountDown($id) {
        $model = HrPenempatan::model()->findByPk($id);
        $model2 = HrPenempatan::model()->findBySQL("SELECT * FROM HR_PENEMPATAN WHERE PEN_ID != $model->PEN_ID AND PEN_SORT=($model->PEN_SORT+1)");

        $count = 0;
        while (sizeof($model2) != 1) {
            $count++;
            $model2 = HrPenempatan::model()->findBySQL("SELECT * FROM HR_PENEMPATAN WHERE PEN_ID != $model->PEN_ID AND UNIT_SORT=($model->PEN_SORT+$count)");
            echo sizeof($model2);
        }

        if (sizeof($model2) > 0) {
            HrPenempatan::model()->updateByPk($model->PEN_ID, array('PEN_SORT' => ($model2->PEN_SORT)));
            HrPenempatan::model()->updateByPk($model2->PEN_ID, array('PEN_SORT' => ($model->PEN_SORT)));
        } else {
            HrPenempatan::model()->updateByPk($model->PEN_ID, array('PEN_SORT' => ($model->PEN_SORT + 1)));
        }
        $this->redirect('index.php?r=hrPenempatan/admin');
    }
    public function actionCountDown2($id, $bhgn, $unit){
        $model = HrPenempatan::model()->findByPk($id);
        $model2 = HrPenempatan::model()->findBySQL("SELECT * FROM HR_PENEMPATAN WHERE PEN_ID != $model->PEN_ID AND PEN_SORT>$model->PEN_SORT AND PEN_BHGN_ID=$bhgn AND PEN_UNIT_ID=$unit AND PEN_STATUS_ID=1");
        
        $count=1;
        if($model->PEN_SORT <= $model2->PEN_SORT){
            $model2 = HrPenempatan::model()->findBySQL("SELECT * FROM HR_PENEMPATAN WHERE PEN_ID != $model->PEN_ID AND PEN_SORT=($model->PEN_SORT+$count) AND PEN_BHGN_ID=$bhgn AND PEN_UNIT_ID=$unit AND PEN_STATUS_ID=1");
            $count++;
        }

        if(sizeof($model2) > 0){
            HrPenempatan::model()->updateByPk($model->PEN_ID, array('PEN_SORT' => ($model2->PEN_SORT)));
            HrPenempatan::model()->updateByPk($model2->PEN_ID, array('PEN_SORT' => ($model->PEN_SORT)));
        } else {
            HrPenempatan::model()->updateByPk($model->PEN_ID, array('PEN_SORT' => ($model->PEN_SORT + 1)));
        }       
        $this->redirect("index.php?r=hrPenempatan%2Fadmin&HrPenempatan%5BPEN_BHGN_ID%5D=$bhgn&HrPenempatan%5BPEN_UNIT_ID%5D=$unit");
    }

}
