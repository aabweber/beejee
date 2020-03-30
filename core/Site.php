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
        '/task/list/' => ['object' => 'task', 'action'=>'list', 'dispatcher' => 'cmdListTasks', 'params' => [':p', ':s', ':o'], 'public' => true],
        '/task/get/' => ['object' => 'task', 'action'=>'get', 'dispatcher' => 'cmdGetTask', 'params' => [':tid'], 'public' => true],
        '/user/auth/' => ['object' => 'user', 'action'=>'auth', 'dispatcher' => 'cmdAuthUser', 'params' => [':name', ':password', ':a', ':redirect'], 'public' => true],

        /**
         * PRIVATE ACTIONS
         */
        '/task/done/' => ['object' => 'task', 'action'=>'done', 'dispatcher' => 'cmdDoneTask', 'params' => [':tid', ':s']],
        '/user/logout/' => ['object' => 'user', 'action'=>'logout', 'dispatcher' => 'cmdLogoutUser', 'params' => []],
        '/task/save/' => ['object' => 'task', 'action'=>'save', 'dispatcher' => 'cmdSaveTask', 'params' => [':task']],
    ];

    const ALLOWED_ORDERS    = ['asc', 'desc'];


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
            if(!($user = User::get()) || $user->type!=User::TYPE_ADMIN){
//                print_r($_SERVER);exit;
                header('Location: ' . INFO['BASE_URL'] . 'user/auth/?redirect=' . urlencode($_SERVER['REQUEST_URI']));
                exit;
            }
        }
    }

    function cmdAuthUser($name, $password, $action, $redirect){
        $data = [];
        if($action=='auth'){
            if(!User::login($name, $password)){
                ReturnData::setPrevMessage(RetErr(_l(L::loginIncorrectCreds)));
            }
            if($redirect){
                header('Location: ' . INFO['BASE_URL'] . ltrim($redirect, '/'));
            }else{
                VisitHistory::go(-1);
            }
        }
        return RetOk($data);
    }

    /**
     * Logout user
     */
    function cmdLogoutUser(){
        if($user = User::get()) $user->logout();
        VisitHistory::go(-1);
    }

    function cmdListTasks($page, $sort, $order){
        if($sort=='text') {
            $sort = 'text_start';
        }else{
            $sort = in_array($sort, Task::ALLOWED_SORTS) ? $sort : '';
        }
        if($sort) {
            $sort .= ' '.(in_array($order, self::ALLOWED_ORDERS) ? strtoupper($order) : '');
        }
        $tasksCnt = Task::calcCount([]);
        $data = [
            'pages_cnt' => intval(($tasksCnt+Constant::TASKS_PER_PAGE-1)/Constant::TASKS_PER_PAGE),
            'tasks' => Task::getList([], $sort, Constant::TASKS_PER_PAGE, intval($page)*Constant::TASKS_PER_PAGE),
        ];
        return RetOk($data);
    }

    function cmdGetTask($taskId){
        $taskId = intval($taskId);
        $task = null;
        if($taskId) {
            $task = Task::getById($taskId);
            if (!$task) {
                ReturnData::setPrevMessage(RetErr(_l(L::tasksNoTask, $taskId)));
                VisitHistory::go(-1);
            }
        }
        $data = [
            'task' => $task,
        ];
        return RetOk($data);
    }

    /**
     * Validate received data
     * @param array $taskInfo
     * @param string $field
     * @return bool
     */
    private function validateTaskData($taskInfo, $field){
        return boolval($taskInfo[$field]??null);
    }

    /**
     * Validate received data, redirect back if needed
     * @param array $taskInfo
     */
    private function validateAllTaskData($taskInfo){
        foreach(Task::REQUIRED_FIELDS as $requiredField) {
            if(!$this->validateTaskData($taskInfo, $requiredField)){
                ReturnData::setPrevMessage(RetErr(_l(L::tasksNoData, _l(constant('L::tasks'.ucFirst($requiredField))))));
                VisitHistory::go(-1);
            }
        }
    }

    function cmdSaveTask($taskInfo){
        $taskInfo['text'] = html_entity_decode($taskInfo['text']??'');
        if($taskInfo['id']??false){
            // save task
            $task = Task::getById($taskInfo['id']);
            if(!$task){
                ReturnData::setPrevMessage(RetErr(_l(L::tasksNoTask, $taskInfo['id'])));
                VisitHistory::go(-1);
            }
            $this->validateAllTaskData($taskInfo);
            $task->username = $taskInfo['username'];
            $task->email = $taskInfo['email'];
            $task->text = $taskInfo['text'];
            $task->edited = 1;
            $task->commit();
            ReturnData::setPrevMessage(RetOk(_l(L::tasksSavedOne, $taskInfo['id'])));
            header('Location: '.INFO['BASE_URL'].'task/list');
            exit;
        }else{
            // add new one
            $this->validateAllTaskData($taskInfo);
            $task= Task::create($taskInfo['username'], $taskInfo['email'], $taskInfo['text']);
            ReturnData::setPrevMessage(RetOk(_l(L::tasksAddedOne, $task->id)));
            header('Location: '.INFO['BASE_URL'].'task/list');
            exit;
        }
    }

    function cmdDoneTask($taskId, $done){
        $task = Task::getById($taskId);
        if(!$task){
            ReturnData::setPrevMessage(RetErr(_l(L::tasksNoTask, $taskId)));
            VisitHistory::go(-1);
        }
        $task->done = intval(boolval($done));
        $task->commit();
        header('Location: '.INFO['BASE_URL'].'task/list/?p='.($_REQUEST['p']??'').'&s='.($_REQUEST['s']??'').'&o='.($_REQUEST['o']??''));
        exit;
    }

    function cmdGetMain(){
        header('Location: '.INFO['BASE_URL'].'task/list/');
        exit;
    }


}
