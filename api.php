<?php
    require_once('det-core/detconnect.php');

    detemiro::main(array(
        'space' => 'api'
    ));

    require_once('det-includes/preload.php');

    detemiro::run();
?>