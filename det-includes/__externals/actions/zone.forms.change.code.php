<?php
    detemiro::actions()->add(array(
        'function' => function($value) {
            if(is_string($value)) {
                return detemiro\canone_code($value);
            }
            else {
                return '';
            }
        }
    ));
?>