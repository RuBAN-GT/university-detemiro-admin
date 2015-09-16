<?php
    detemiro::actions()->add(array(
        'function' => function() {
            detemiro::navigation()->push(array(
                'page'     => true,
                'value'    => 'settings/console',
                'parent'   => 'settings',
                'priority' => 80
            ));
        }
    ));
?>