<?php


namespace core;


use misc\DB;
use misc\DBObject;

class Task extends DBObject {
    static $TABLE = 'tasks';
    const ALLOWED_SORTS     = ['username', 'email', 'text'];
    const REQUIRED_FIELDS   = ['username', 'email', 'text'];

    function __set($var, $val){
        if($var=='text') {
            $this->text_start = mb_substr($val, 0, 100);
        }
        parent::__set($var, $val);
    }

    /**
     * Create Task object
     * @param string $username
     * @param string $email
     * @param string $text
     * @return Task|null
     */
    public static function create($username, $email, $text){
        $data = [
            'username'      => $username,
            'email'         => $email,
            'text'          => $text,
            'text_start'    => mb_substr($text, 0, 100),
        ];
        $task = self::generate($data);
        if(!$task->commit()) return null;
        return $task;
    }

}