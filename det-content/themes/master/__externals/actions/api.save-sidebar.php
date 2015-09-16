<?php
    /**
     * AJAX-обработчик для смены "открытости" боковой панели
     * @var bool
     */
    detemiro::actions()->add(array(
        'function' => function($state = false) {
            if(detemiro::user()->check) {
                if($state == true) {
                    $state = 1;
                }
                else {
                    $state = 0;
                }

                if(detemiro::user()->props()->set('theme', 'sidebar', $state)) {
                    echo 1;

                    return true;
                }
            }

            echo 0;

            return false;
        }
    ));
?>