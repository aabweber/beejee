<?php
/**
 * Created by PhpStorm.
 * User: aabweber
 * Date: 13/01/2020
 * Time: 13:59
 */
use core\Site;
use misc\DB;
use misc\Lang;
use misc\Template;
include __DIR__.'/config.inc.php';

Template::setDirectory(BASE_DIR.'/templates');
DB::get()->connect(MAIN_HOST, MAIN_PORT, MAIN_USER, MAIN_PASS, MAIN_DB);
new Lang();

$site = Site::get();
if(!$site->init() || !$site->run()) $site->process404();
$site->render();
