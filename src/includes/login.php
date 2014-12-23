<?php
$username = null;
$password = null;
$errors = array();

if(isset($_POST['submit'])){
    foreach($_POST as $field=>$value){
        $value = trim($value);
        $value = strip_tags(htmlspecialchars($value));;
        switch($field){
            case 'txt_UserName':
                $username = $value;
                if(empty($value)){
                    $errors[$field] = 'Username should not be blank';
                }
            break;
            case 'Password':
                $password = $value;
                if(empty($value)){
                    $errors[$field] = 'Password should not be blank';
                }
            break;
        }
    }

    if(empty($errors)){
        $loginOK = false;
        try{
            $loginOK = loginUser($username, $password);
        } catch(\KED\Exception\UserNotFoundException $unfe){
            echo $unfe->getMessage(),"<br />";
            $errors['txt_UserName'] = 'Username or password does not match';
            $errors['Password'] = $errors['txt_UserName'];
        } catch(\Exception $e){
            echo $e->getMessage(),"<br />";
            $errors['txt_UserName'] = 'Username or password does not match or Error in login';
            $errors['Password'] = $errors['txt_UserName'];
        }

        if($loginOK){
            header("Location: thankyou.php?login");
            exit;
        }
    }
}