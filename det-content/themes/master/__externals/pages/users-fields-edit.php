<?php
    detemiro::pages()->add(array(
        'code'     => 'users/fields/edit',
        'rules'    => 'admin,moderate-core',
        'title'    => 'Добавить поле',
        'function' => function($form = null) {
            if($form) {
                detemiro::theme()->incFile('users/fields-edit.php', array(
                    'form' => $form
                ));
            }
            else {
                detemiro::router()->redirectOnPage('404');
            }
        }
    ));
?>