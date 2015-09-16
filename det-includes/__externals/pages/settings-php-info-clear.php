<?php
    detemiro::pages()->add(array(
        'rules'    => 'admin,moderate-core',
        'code'     => 'settings/php-info-clear',
        'function' => function() {
            phpinfo();
        }
    ));
?>