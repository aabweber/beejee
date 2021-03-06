<?php
/**
 * Created by PhpStorm.
 * User: aabweber
 * Date: 16/01/2020
 * Time: 17:25
 */

use core\Site;
use core\User;

/**@var Site $this */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
    <meta property='og:title' content='<?php echo $this->getTitle();?>' />
    <meta property='og:description' content='<?php echo $this->getDescription();?>' />
    <meta property='og:image' content='/img/logo.png' />
    <meta property='og:type' content='website' />
    <meta property='og:url' content='https://<?php echo INFO['DOMAIN'];?>' />
    <meta property='og:site_name' content='<?php echo INFO['PROJECT_NAME'];?>' />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="<?php echo $this->getDescription();?>" />
    <meta name="keywords" content="<?php echo $this->getKeywords();?>" />
    <title><?php echo $this->getTitle();?></title>
    <link rel="icon" href="/img/logo.png" />
    <link rel="SHORTCUT ICON" href="/img/logo.png" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ee689be553.js" crossorigin="anonymous"></script>

<!--    <script src="/js/class.min.js"></script>-->

    <link rel="stylesheet" href="/css/main.css" />
    <script src="/js/main.js"></script>

    <link rel="stylesheet" href="/css/service.css<?php echo __DEBUG__?'?r='.rand(0, 10000):'';?>" />
    <script src="/js/service.js"></script>

</head>

<body class="table">
    <div class="tr">
        <div class="td">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarToggler">
                        <a class="navbar-brand" href="/">BeeJee</a>
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        </ul>
                        <?php
                        if($user = User::get()){
                            echo $user->name.' - '.$user->type.' (<a href="/user/logout/">'._l(L::mainLogout).'</a>)';
                        }else{
                            echo '
                                <form class="form-inline my-2 my-lg-0" action="/user/auth/" method="post">
                                    <input type="hidden" name="a" value="auth"/>
                                    <input class="form-control mr-sm-2" type="text" name="name" placeholder="'._l(L::mainUsername).'"/>
                                    <input class="form-control mr-sm-2" type="password" name="password" placeholder="******"/>
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >'._l(L::mainLogin).'</button>
                                </form>
                            ';
                        }
                        ?>
                    </div>
                </nav>
            </div>
        </div>
    </div>