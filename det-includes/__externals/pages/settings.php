<?php
    detemiro::pages()->add(array(
        'code'     => 'settings',
        'rules'    => 'admin,moderate-core',
        'title'    => 'Настроки',
        'function' => function () {
            detemiro::router()->redirectOnPage('index');
        }
    ));
?>