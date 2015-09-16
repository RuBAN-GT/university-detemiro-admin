<?php
    namespace detemiro;

    /**
     * Генерация JSON-строки для AJAX-ответа
     * 
     * @param  array|object $data
     * @return string|false
     */
    function ajaxAnswer($data) {
        $data = array_replace(array(
            'status'   => 'info',
            'value'    => null,
            'info'     => '',
            'redirect' => null
        ), $data);

        if($data = \detemiro\json_val_encode($data)) {
            return $data;
        }
        else {
            return false;
        }
    }
?>