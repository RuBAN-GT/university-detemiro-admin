<?php
    detemiro::pages()->set(array(
        'title'    => 'Авторизация',
        'full'     => true,
        'function' => function($form = null) {
            if($form && $form->count(false)) {
                detemiro::theme()->incFile('login.php', array(
                    'form' => $form
                ));
            }
            else {
                detemiro::messages()->push(array(
                    'status' => 'error',
                    'type'   => 'system',
                    'title'  => 'Ошибка страницы входа',
                    'text'   => 'Форма авторизации не задана'
                ));

                detemiro::router()->redirectOnPage('404');
            }
        }
    ));
?>