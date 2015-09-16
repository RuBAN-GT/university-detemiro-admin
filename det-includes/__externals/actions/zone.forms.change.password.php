<?php
    detemiro::actions()->add(array(
        'function' => function($value) {
            if(is_string($value)) {
                return $value;
            }
            else {
                return '';
            }
        }
    ));
?>