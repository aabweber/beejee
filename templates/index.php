<?php
/**
 * Created by PhpStorm.
 * User: aabweber
 * Date: 16/01/2020
 * Time: 17:25
 */
use misc\DB;
use misc\ReturnData;
use misc\Template;
use core\Site;
/**@var Site $this */
include __DIR__.'/functions.php';
ob_start();
if($this->is404()) {
    include '404.php';
}elseif( $this->getObject() == 'static' && $fname = Template::getFilename('static/'.$this->getParams()['page']) ){
    include $fname;
}elseif($this->getReturnFormat()==ReturnData::RETURN_FORMAT_JSON){
    header('Content-Type: application/json');
    echo json_encode(['status' => $this->getResult()->getStatus(), 'data' => $this->getResult()->getInfo()]);
    exit;
}elseif( $fname = Template::getFilename($this->getObject().'/'.$this->getAction()) ){
    include $fname;
}else{
    include '404.php';
}
$body = ob_get_clean();

include 'header.php';
include 'body.php';
include 'footer.php';