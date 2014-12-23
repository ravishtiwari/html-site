<?php
/**
 * author: ravish
 * Date: 12/19/14
 * Time: 12:33 PM
 */

/**
 * @param $username
 * @param $password
 */
function loginUser($username, $password)
{
    global $db;
    $returnVal = false;
    try{
        $user = KED\Core\User::getInstance($db, $username, $password);
        if($user instanceof \KED\Core\User && $user->id != null){
            addToSession(array(
                'id' => $user->id, 'loginTime' => date('Y/m/d h:m:s', time())
                )
            );
            $returnVal = true;
        }
    } catch(Exception $e) {
        throw $e;
    }
    return $returnVal;
}

function logout()
{
    unset($_SESSION);
    session_destroy();
}

function addToSession(array $values)
{
    if(!empty($values)){
        foreach($values as $key=>$val){
            $_SESSION[$key] = $val;
        }
    }
}

function loggedInUser()
{
    if(array_key_exists('id', $_SESSION)) {
        return true;
    }
    return false;
}