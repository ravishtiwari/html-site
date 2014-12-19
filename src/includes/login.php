<?php
$username = null;
$errors = array();

if(isset($_POST['submit'])){
    foreach($_POST as $field=>$value){
        $value = trim($value);
        switch($field){
            case 'txt_UserName':
                $username = strip_tags(htmlspecialchars($username));
                if(empty($value)){
                    $errors[$field] = 'Username should not be blank';
                }
            break;
            case 'Password':
                if(empty($value)){
                    $errors[$field] = 'Password should not be blank';
                }
            break;
        }
    }

    if(empty($errors)){
        header("Location: thankyou.php");
        exit;
    }
}