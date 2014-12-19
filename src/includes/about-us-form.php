<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL & ~E_NOTICE);
require_once("config.php");
$firstName = null;
$middleName = null;
$lastName = null;
$email = null;
$confirmEmail = null;
$course = null;
$areaOfInterest = array();
$ans = null;
$errors = array();

if(isset($_POST['submit'])){
    $firstName = strip_tags(htmlspecialchars($_POST['txt_FirstName']));
    $middleName = strip_tags(htmlspecialchars($_POST['txt_MiddleName']));
    $lastName = strip_tags(htmlspecialchars($_POST['txt_Surname']));
    $email = strip_tags(htmlspecialchars($_POST['Email']));
    $confirmEmail = strip_tags(htmlspecialchars($_POST['ConfirmEmail']));
    $course = strip_tags(htmlspecialchars($_POST['sel_Course']));
    $areaOfInterest = isset($_POST['chk_AreaOfInterest']) ?
                        $_POST['chk_AreaOfInterest'] : array();

    $ans = md5(strtolower(
        trim(strip_tags(htmlspecialchars($_POST['txt_Captcha'])))
    ));

    foreach($_POST as $field=>$value){
        $value = $field !='chk_AreaOfInterest' ? trim($value): $value;
        switch($field){
            case 'txt_FirstName':
            case 'txt_MiddleName':
            case 'txt_Surname':
                if(empty($value)){
                    $errors[$field] = 'Field should not be blank';
                }
            break;
            case 'Email':
            case 'ConfirmEmail':
                if(empty($value) or !filter_var($value,FILTER_VALIDATE_EMAIL) ){
                    $errors[$field] = 'Invalid email id';
                }

                if(strcmp(strtolower($email), strtolower($confirmEmail)) !==0){
                    $errors['ConfirmEmail'] = 'Email address does not match';
                }
            break;
            case 'sel_Course':
                if(empty($value)){
                    $errors[$field] = 'Please select course of interest';
                }
                break;
            case 'txt_Captcha':
                if(empty($value)){
                    $errors[$field] = 'Answer to security question not provided';
                }
                elseif (!in_array($ans,$_SESSION['captcha'])) {
                    $errors[$field] = 'Answer to security question does not match';
                }
                break;
        }
    }
    if(empty($errors)){
        header("Location: thankyou.php");
        exit;
    }
}

$textCaptcha = new \KED\Utils\TextCaptcha(TEXT_CAPTCHA_API_KEY);
$captcha = $textCaptcha->getCaptcha();
$_SESSION['captcha'] = $captcha['answer'];

