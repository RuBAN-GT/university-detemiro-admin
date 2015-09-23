<?php
    detemiro::pages()->add(array(
        'title'    => 'PHP-Консоль',
        'rules'    => 'admin,moderate-core',
        'code'     => 'settings/console',
        'function' => function($form = null) {
            detemiro::theme()->incModuleFile('__templates/settings-console.php', __FILE__, array(
                'form' => $form
            ));
        }
    ));
?>