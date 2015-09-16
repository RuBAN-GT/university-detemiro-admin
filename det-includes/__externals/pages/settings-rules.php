<?php
    detemiro::pages()->add(array(
        'code'     => 'settings/rules',
        'rules'    => 'admin,moderate-core',
        'title'    => 'Права',
        'function' => function () {
            $pagi = detemiro\space\pagination_calc(
                detemiro::rules()->count()
            );

            $rules = detemiro::rules()->getItems(array(
                'limit'  => $pagi['limit'],
                'offset' => $pagi['offset'],
                'order'  => array('code' => 'asc')
            ));

            detemiro::theme()->incFile('settings/rules.php', array(
                'main'    => $rules,
                'total'   => $pagi['total'],
                'current' => $pagi['current']
            ));
        }
    ));
?>