<?php
    detemiro::pages()->add(array(
        'code'     => 'users/settings',
        'rules'    => 'admin,moderate',
        'title'    => 'Личные настройки',
        'function' => function($form = null) {
            if($form) {
                detemiro::theme()->incFile('users/settings.php', array(
                    'form' => $form
                ));
            }
            else {
                detemiro::router()->redirectOnPage('404');
            }
        }
    ));
?>