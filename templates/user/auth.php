<?php
use core\Site;
use misc\ReturnData;

/**@var Site $this */

showPrevMessage($this);
echo '<h1>'._l(L::loginAuthTitle).'</h1>';
if ($this->getResult()->getStatus()==ReturnData::RD_ERR) {
    echo '<div class="alert alert-danger" role="alert">' . $this->getResult()->getInfo()['message'] . '</div>';
}

echo '
    <div class="row">
        <form action="/user/auth/" method="post">
            <input type="hidden" name="a" value="auth"/>
            <input type="hidden" name="redirect" value="'.$_SERVER['REFERRER'].'"/>
            <table>
            <tr><td class="b">'._l(L::mainUsername).'</td><td><input type="text" name="name" placeholder="login"/></td></tr>
            <tr><td class="b">'._l(L::mainPassword).'</td><td><input type="password" name="password" placeholder="******"/></td></tr>
            <tr><td colspan="2" class="c"><input type="submit" class="btn btn-primary" value="'._l(L::mainLogin).'"/></td></tr>
            </table>
        </form>
    </div>
';
?>