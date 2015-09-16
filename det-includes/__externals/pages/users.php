<?php
    detemiro::pages()->add(array(
        'code'     => 'users',
        'rules'    => 'admin,moderate-users',
        'title'    => 'Список пользователей',
        'function' => function () {
            $pagi = detemiro\space\pagination_calc(
                detemiro::users()->count()
            );

            $data = detemiro::users()->getItems(array(
                'limit'  => $pagi['limit'],
                'offset' => $pagi['offset'],
                'order'  => array(
                    'login' => 'asc',
                    'id'    => 'asc'
                )
            ));

            detemiro::theme()->incFile('users/users.php', array(
                'main'    => $data,
                'total'   => $pagi['total'],
                'current' => $pagi['current']
            ));
        }
    ));
?>