<?php
    detemiro::pages()->add(array(
        'full'     => true,
        'rules'    => 'admin,moderate-core',
        'code'     => 'settings/php-info-clear',
        'function' => function() {
            phpinfo();
        }
    ));
?>