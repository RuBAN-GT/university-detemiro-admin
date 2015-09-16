<?php
    detemiro::actions()->add(array(
        'function' => function($value) {
            return (is_numeric($value));
        }
    ));
?>