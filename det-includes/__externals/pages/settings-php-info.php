<?php
    detemiro::pages()->add(array(
        'title'    => 'Информация о PHP',
        'rules'    => 'admin,moderate-core',
        'code'     => 'settings/php-info',
        'function' => function() {
            detemiro::theme()->incFile('settings/phpinfo.php');
        }
    ));
?>