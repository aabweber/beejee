<?php
/**
 * Created by PhpStorm.
 * User: aabweber
 * Date: 20/01/2019
 * Time: 16:44
 */

define('BASE_DIR', __DIR__);

$INFO = [
    'DEFAULT_TITLE'         => 'Test',
    'DEFAULT_KEYWORDS'      => 'Test',
    'DEFAULT_DESCRIPTION'   => 'Test',
    'PROJECT_NAME'          => 'Test',
    'BASE_URL'              => 'http://beejee.aabweber.com/',
];

include BASE_DIR.'/misc/inc.php';
include BASE_DIR.'/internal_config.inc.php';

define('INFO', $INFO);

define('__DEBUG__', true);
