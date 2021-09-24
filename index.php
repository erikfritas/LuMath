<?php
// projeto iniciado em 19 de setembro

@ini_set('display_errors', 1);
@error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/app/Configs/autoload.php';

use \App\Controller\Pages\Home;

echo Home::getHome();
