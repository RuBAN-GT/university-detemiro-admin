<?php
    detemiro::pages()->add(array(
        'code'     => 'settings/groups/edit',
        'rules'    => 'admin,moderate-groups',
        'title'    => 'Добавление группы',
        'function' => function($form = null) {
            if($form) {
                detemiro::theme()->incFile('settings/groups-edit.php', array(
                    'form' => $form
                ));
            }
            else {
                detemiro::router()->redirectOnPage('404');
            }
        }
    ));
?>