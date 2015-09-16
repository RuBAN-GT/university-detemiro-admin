<?php
    detemiro::actions()->add(array(
        'function' => function($value) {
            return detemiro::users()->checkPassword(
                detemiro::user()->id,
                $value
            );
        }
    ));
?>