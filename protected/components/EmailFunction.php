<?php

class EmailFunction {

    public static function SendEmail($toaddress, $toname, $subject, $content) {
        
        Yii::import('application.extensions.phpmailer.JPhpMailer');
        $mail = new JPhpMailer;
        $mail->IsSMTP();
        $mail->SMTPAuth = false;
        $mail->SMTPSecure = "";
        
        $mail->Host = "webmail.agc.gov.my";
        $mail->Port = 206;
        $mail->Username = 'safawati@agc.gov.my';
        $mail->Password = '5af@201601';
        
        $mail->SetFrom('safawati@agc.gov.my', 'AGC');
        $mail->Subject = $subject;
        $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
        $mail->MsgHTML($content);
        $mail->AddAddress($toaddress);
        $mail->AddBCC('admin.portal@agc.gov.my');
        $mail->AddCC($toname);
        
        //print_r($mail);
        //exit;
        if ($mail->Send())
            return 'y';
        else
            return 'n';
    }

}