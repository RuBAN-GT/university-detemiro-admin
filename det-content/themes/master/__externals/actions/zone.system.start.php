<?php
    detemiro::actions()->add(array(
        'function' => function () {
            if(detemiro::modules()->isRunned('usersfields')) {
                detemiro::navigation()->push(array(
                    'page'     => true,
                    'title'    => 'Поля профиля',
                    'value'    => 'users/fields',
                    'parent'   => 'users',
                    'priority' => 100
                ));
            }
        }
    ));
?>