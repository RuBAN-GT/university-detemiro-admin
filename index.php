<?php
    require_once('/home/detuser/detemiro.org/core/detconnect.php');

    detemiro::main(array(
        'space' => 'admin'
    ));

    require_once('det-includes/preload.php');

    detemiro::run();
?>