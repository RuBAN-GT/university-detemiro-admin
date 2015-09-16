<?php
    detemiro::pages()->add(array(
        'code'     => 'settings/rules/edit',
        'rules'    => 'admin,moderate-core',
        'title'    => 'Добавление права',
        'function' => function($form = null) {
            if($form) {
                detemiro::theme()->incFile('settings/rules-edit.php', array(
                    'form' => $form
                ));
            }
            else {
                detemiro::router()->redirectOnPage('404');
            }
        }
    ));
?>