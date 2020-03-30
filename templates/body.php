<?php
/**
 * Created by PhpStorm.
 * User: aabweber
 * Date: 16/01/2020
 * Time: 17:42
 */
use core\Site;
/**@var Site $this */

$bodyClass = $this->getObject()=='static' ? $this->getObject().'-'.$this->getParams()['page'] : $this->getObject().'-'.$this->getAction();
echo '
<div class="tr">
    <div class="td" style="height: 100%;">
        <div class="container body '.$bodyClass.'" style="height: 100%;">
';
echo $body;
echo '
        </div>
    </div>
</div>
';

