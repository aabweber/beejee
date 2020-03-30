<?php

namespace core;

use L;
use misc\DB;
use misc\DBFunction;
use misc\Framework;
use misc\Lang;
use misc\Network\CURL;
use misc\ReturnData;
use misc\Utils;
use misc\VisitHistory;

/**
 * Created by PhpStorm.
 * User: aabweber
 * Date: 13/01/2020
 * Time: 15:26
 */
class Site extends Framework
{
    static $URL_RULES = [
        // # ... #si will be added automatically
        // Example:
        // '/' => ['object' => '', 'action' => '', 'dispatcher' => '', 'params' => []],

        /**
         * PUBLIC ACTIONS
         */
        '/' => ['object' => 'static', 'dispatcher' => 'cmdGetMain', 'params' => [], 'public' => true],
        '/task/list/' => ['object' => 'task', 'action'=>'list', 'dispatcher' => 'cmdListTasks', 'params' => [':p', ':o'], 'public' => true],
        '/user/auth/' => ['object' => 'user', 'action'=>'auth', 'dispatcher' => 'cmdAuthUser', 'params' => [':name', ':password', ':a', ':redirect'], 'public' => true],

        /**
         * PRIVATE ACTIONS
         */
    ];

    function __construct(){
        $this->addListener(Framework::EVT_RULE_FOUND, [$this, 'checkActionAccess']);
    }

    function init(){
        $r = parent::init();
        return $r;
    }

    function checkActionAccess($params){
        if(!($params['public']??false)){
            // private
            header('Location: '.INFO['BASE_URL'].'user/auth/?redirect='.urlencode($_SERVER['REFERRER']));
            exit;
        }
    }

    function cmdAuthUser($name, $password, $action, $redirect){
        $data = [];
        if($action=='auth'){
            if(!User::login($name, $password)){
                ReturnData::setPrevMessage(RetOk(_l(L::loginIncorrectCreds)));
            }else{
                header('Location: '.$redirect);
                exit;
            }
        }
        return RetOk($data);
    }

    function cmdListTasks($page, $order){
        $data = [];
        return RetOk($data);
    }

    function cmdGetMain(){
        header('Location: '.INFO['BASE_URL'].'task/list/');
        exit;
    }


}
