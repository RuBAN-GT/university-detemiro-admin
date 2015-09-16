<?php
    detemiro::actions()->add(array(
        'function' => function($value) {
            return ($value === null || $value === '' || detemiro\validate_code($value));
        }
    ));
?>