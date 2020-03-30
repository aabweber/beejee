<?php

use misc\Framework;
use misc\ReturnData;

function showPrevMessage(Framework $site){
    $prevMessage = $site->getResult()->getPrevMessage();
    if($prevMessage) {
        $message = $prevMessage->getInfo()['message']??null;
        if($message){
            echo '<div class="alert alert-'.($prevMessage->getStatus()==ReturnData::RD_OK?'success':'danger').'" role="alert">' . $message . '</div>';
        }
    }
}