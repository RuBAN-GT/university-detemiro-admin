<?php
    detemiro::pages()->add(array(
        'title'    => 'Выход',
        'function' => function() {
            if(detemiro::user()->check) {
                if(isset($_GET['full']) && $_GET['full']) {
                    $t = detemiro::user()->signOut();
                }
                else {
                    $t = detemiro::user()->abort();
                }
                if($t) {
                    detemiro::messages()->push(array(
                        'title'  => 'Успех',
                        'text'   => 'Вы успешно вышли, возвращайтесь скорее!',
                        'save'   => 2,
                        'type'   => 'public',
                        'status' => 'success'
                    ));
                }
                else {
                    detemiro::messages()->push(array(
                        'title'  => 'Ошибка',
                        'text'   => 'Не удалось выйти, попробуйте позже',
                        'type'   => 'public',
                        'save'   => 2,
                        'status' => 'warning'
                    ));
                }

                detemiro::router()->redirectOnPage('index');
            }
            else {
                detemiro::router()->redirectOnPage('login');
            }
        }
    ));
?>