<?php
    detemiro::actions()->add(array(
        'function' => function($page) {
            if($page->key == detemiro::router()->page && $page->full == false) {
                detemiro::theme()->incFile('header.php');
            }
        }
    ));
?>