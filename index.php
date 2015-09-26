<?php
    error_reporting(E_ALL);
    ini_set('display_errors','On');

    require_once('/home/detuser/detemiro.org/core/detconnect.php');

    detemiro::main(array(
        'space' => 'admin'
    ));

    detemiro::modules()->run('basic');
    detemiro::services()->set('modulesStatuses', new \detemiro\space\optionsStatuses());

    detemiro::run();
?>