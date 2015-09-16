<?php
    detemiro::pages()->add(array(
        'title'    => 'Профиль',
        'code'     => 'users/profile',
        'rules'    => 'admin,moderate',
        'function' => function() {
            detemiro::theme()->incFile('users/profile.php');
        }
    ));
?>