<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use League\OAuth2\Client\Provider\Google as GoogleProvider;

$projectFolder = realpath(__DIR__ . '/..');

require $projectFolder . '\vendor\autoload.php';


class EmailHelper {

    private $mail;

    public function __construct() {
        $this->mail = new PHPMailer;
    }

    public function sendEmailOAuth($to, $subject, $templateFile) {
        if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email address: $to");
        }
        if (empty($subject)) {
            throw new Exception("Subject is required");
        }
        
        // Load Gmail credentials from a configuration file
        $this->mail->SMTPAuth = true;  
        $this->mail->FromName = "JE Printing Solution";
        $this->mail->Password = "ckeaitqpfzywzsih";
        $this->mail->AddAddress($to);
        $this->mail->Subject = $subject;

        $this->mail->isSMTP();
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Port = 587;
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->Username = "jeprinting7@gmail.com";

        $this->mail->isHTML(true);

        // Assign email template to the Body property of the email message
        $this->mail->Body = $templateFile;

        try {
            
            $emailSended = $this->mail->send();
            
            echo "<script>";
            echo "alert(\" ". print_r($emailSended) ." \");";
            echo "</script>";
            
            return $emailSended;
        } catch (Exception $e) {
            
            echo error_log($e->getMessage());
            
            echo "<script>";
            echo "alert(\" ". $e->getMessage() ." \");";
            echo "</script>";
            
            return false;
        }
    }

    
    
    public function LoadEmailTemplate($emailTemplateName, $model = null) {
        
        $emailTemplatePath = realpath(__DIR__ . '/..') . "/EmailTemplates/" . $emailTemplateName;

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


