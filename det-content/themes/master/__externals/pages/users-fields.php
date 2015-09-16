<?php
    detemiro::pages()->add(array(
        'code'     => 'users/fields',
        'rules'    => 'admin,moderate-core',
        'title'    => 'Пользовательские поля',
        'function' => function() {
            $pagi = detemiro\space\pagination_calc(
                detemiro::fieldsControl()->count()
            );

            $fields = detemiro::fieldsControl()->getItems(array(
                'limit'  => $pagi['limit'],
                'offset' => $pagi['offset'],
                'order'  => array(
                    'priority' => 'asc',
                    'title'    => 'asc',
                    'name'     => 'asc'
                )
            ));

            detemiro::theme()->incFile('users/fields.php', array(
                'main'    => $fields,
                'total'   => $pagi['total'],
                'current' => $pagi['current']
            ));
        }
    ));
?>