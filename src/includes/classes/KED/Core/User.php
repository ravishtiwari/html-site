<?php
/**
 * Created by PhpStorm.
 * User: ravish
 * Date: 12/19/14
 * Time: 2:21 PM
 */

namespace KED\Core;
use KED\Core\DB\Database as DB;
use KED\Exception;

class User
{
    /**
     * @var int
     */
    private $_id;

    /**
     * @var string
     */
    private $_username;

    /**
     * @var string
     */
    private $_password;

    public function __construct()
    {
        $this->_username = '';
        $this->_password = '';
        $this->_id = 0;
    }

    public function __get($param)
    {
        if(in_array($param, array('id','username'))){
            $param .='_';
            return $this->$param;
        }else{
            throw new \InvalidArgumentException("Property : $param does not exists in ".__CLASS__);
        }
    }

    /**
     * @param \PDO $db
     * @param $username
     * @param $password
     * @return User
     * @throws \KED\Exception\UserNotFoundException
     * @throws \Exception
     * @throws \KED\Exception
     * @TODO: I don't like it when my code is littered with raw DB code in every class,
     * so, fix it, may be write a simple database abstraction class, a very simple one
     */
    public static function getInstance(\PDO $db, $username, $password)
    {
        try{
            $table = self::table();
            $sql = "select id from $table where username=:username and password=:password ";
            $statement = $db->prepare($sql);
            $statement->bindValues(':username',$username, \PDO::PARAM_STR);
            $statement->bindValues(':password ', md5($password), \PDO::PARAM_STR);
            $statement->execute();
            if($statement->rowCount() == 0){
                throw new Exception\UserNotFoundException("Invalid user name or password");
            }
            $data = $statement->fetch(\PDO::FETCH_ASSOC);
            $user = new self;
            $user->_username = $username;
            $password->_password = md5($password);
            $user->_id = $data['id'];
            $statement = null;
            $data = null;
            return $user;
        }catch(Exception $e){
            throw $e;
        }
    }

    private static function table()
    {
        return strtolower(__CLASS__).'s';
    }
}