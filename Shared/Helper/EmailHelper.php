<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class EmailHelper {

    private $mail;

    public function __construct() {
        $this->mail = new PHPMailer;
    }

    public function sendEmail($to, $toName, $subject, $templateFile, $variables) {
        // Set the From, To, Subject, and Body properties of the email message
        $this->mail->setFrom("jeprinting7@gmail.com", "JEprintingSolution");
        $this->mail->addAddress($to, $toName);
        $this->mail->Subject = $subject;
        $this->mail->isHTML(true);

        // Include the HTML template file and assign its contents to the Body property of the email message
        ob_start();
        extract($variables);
        include $templateFile;
        $this->mail->Body = ob_get_clean();

        // Send the email message
        if ($this->mail->send()) {
            return true;
        } else {
            return false;
        }
    }
    
    function LoadEmailTemplate($emailTemplateName, $model = null) {
    $emailTemplatePath = __DIR__ . "/EmailTemplates/" . $emailTemplateName;

    $emailTemplate = file_get_contents($emailTemplatePath);

    if ($model != null) {
        $props = get_object_vars($model);

        foreach ($props as $key => $value) {
            $toReplace = "[($key)]";
            if (isset($value)) {
                $emailTemplate = str_replace($toReplace, $value, $emailTemplate);
            }
        }
    }

    return $emailTemplate;
}
}


