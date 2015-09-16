<?php
    detemiro::actions()->add(array(
        'function' => function($value) {
            if(is_bool($value)) {
                return $value;
            }
            elseif($value == '1') {
                return true;
            }
            elseif($value == '0') {
                return false;
            }
            else {
                return (bool) $value;
            }
        }
    ));
?>