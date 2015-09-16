<?php
    detemiro::actions()->add(array(
        'function' => function($value) {
            return (filter_var($value, FILTER_VALIDATE_EMAIL));
        }
    ));
?>