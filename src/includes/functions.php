<?php
/**
 * Created by PhpStorm.
 * User: ravish
 * Date: 12/19/14
 * Time: 12:33 PM
 */

/**
 * @param $userName string
 * @param $password string
 */
function loginUser($username, $password)
{
    try{
        $user = KED\Core\User::getInstance($db, $username, $password);
    } catch(Exception $e) {

    }
}

function logout()
{

}