<?php
    detemiro::actions()->add(array(
        'code'     => 'page.login.handle.loginAndPass',
        'priority' => 0,
        'function' => function($data) {
            if(isset($data['main-login'], $data['main-pass'])) {
                if(detemiro::user()->signInByLoginAndPass($data['main-login'], $data['main-pass'], true)) {
                    return true;
                }
                else {
                    detemiro::messages()->push(array(
                        'title'  => 'Неудача!',
                        'text'   => 'Вы ввели неверный логин или пароль.',
                        'type'   => 'public',
                        'status' => 'error'
                    ));
                }
            }

            return false;
        }
    ));
?>