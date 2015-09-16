<?php
    detemiro::pages()->add(array(
        'code'     => 'settings/groups',
        'rules'    => 'admin,moderate-groups',
        'title'    => 'Группы',
        'function' => function() {
            $pagi = detemiro\space\pagination_calc(
                detemiro::groups()->count()
            );

            $data = detemiro::groups()->getItems(array(
                'limit'  => $pagi['limit'],
                'offset' => $pagi['offset'],
                'order'  => array('name' => 'asc', 'code' => 'asc')
            ));

            detemiro::theme()->incFile('settings/groups.php', array(
                'main'    => $data,
                'total'   => $pagi['total'],
                'current' => $pagi['current']
            ));
        }
    ));
?>