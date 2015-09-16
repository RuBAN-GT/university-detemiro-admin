<?php
    detemiro::pages()->set(array(
        'title'    => 'Страница не найдена',
        'function' => function() {
            header("{$_SERVER["SERVER_PROTOCOL"]} 404 Not Found");

            detemiro::theme()->incFile('404.php');
        }
    ));
?>