<?php


namespace core;


use misc\DB;
use misc\DBFunction;
use misc\DBObject;
use misc\Singleton;

class User extends DBObject{
    use Singleton;
    static $TABLE = 'users';

    const TYPE_ADMIN = 'ADMIN';
    const TYPE_USER = 'USER';

    /**
     * Init instance of User
     * @return bool
     */
    function initInstance(){
        if(!isset($_SESSION['user_id'])){
            return false;
        }
        $row = DB::get()->select(self::$TABLE, ['id' => $_SESSION['user_id']], DB::SELECT_ROW);
        if(!$row){
            return false;
        }
        $this->adata = $row;
        return true;
    }

    /**
     * Unset unneeded variables before serialization
     * @return array|mixed
     */
    public function jsonSerialize(){
        $data = $this->adata;
        unset($data['password']);
        return $data;
    }

    /**
     * @param string $name
     * @param string $password
     * @return null|User
     */
    static function login($name, $password){
        $row = DB::get()->select(self::$TABLE, ['name' => $name, 'password' => DBFunction::password($password)], DB::SELECT_ROW);
        if(!$row) return null;
        $user = self::generate($row);
        $_SESSION['user_id'] = $user->id;
        return $user;
    }

    /**
     * Just logout
     */
    function logout(){
        unset($_SESSION['user_id']);
    }

}