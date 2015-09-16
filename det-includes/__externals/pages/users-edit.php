<?php
    detemiro::pages()->add(array(
        'code'     => 'users/edit',
        'rules'    => 'admin,moderate-users',
        'title'    => 'Добавление пользователя',
        'function' => function($form = null) {
            if($form) {
                detemiro::theme()->incFile('users/edit.php', array(
                    'form' => $form
                ));
            }
            else {
                detemiro::router()->redirectOnPage('404');
            }
        }
    ));
?>