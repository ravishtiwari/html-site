<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
define('TEXT_CAPTCHA_API_KEY',$_ENV['TEXT_CAPTCHA_API_KEY']);
require_once("TextCaptcha.php");
$firstName = null;
$middleName = null;
$lastName = null;
$email = null;
$confirmEmail = null;
$course = null;
$ans = null;
$error = array();
if(isset($_POST['submit'])){
    $firstName = strip_tags(htmlspecialchars($_POST['txt_FirstName']));
    $middleName = strip_tags(htmlspecialchars($_POST['txt_MiddleName']));
    $lastName = strip_tags(htmlspecialchars($_POST['txt_Surname']));
    $email = strip_tags(htmlspecialchars($_POST['Email']));
    $confirmEmail = strip_tags(htmlspecialchars($_POST['ConfirmEmail']));
    $course = strip_tags(htmlspecialchars($_POST['sel_Course']));
    $ans = md5(strtolower(
            trim(strip_tags(htmlspecialchars($_POST['txt_Captcha'])))
        ));
    if (!in_array($ans,$_SESSION['captcha'])) {

    }
}

$textCaptcha = new TextCaptcha(TEXT_CAPTCHA_API_KEY);
$captcha = $textCaptcha->getCaptcha();
$_SESSION['captcha'] = $captcha['answer'];

