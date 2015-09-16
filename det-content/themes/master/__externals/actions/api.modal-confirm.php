<?php
    detemiro::actions()->add(array(
        'function' => function($title = '', $text = '') {
            $title = ($title) ? $title : 'Подтверждение действия';
            $text  = ($text)  ? $text  : 'Вы действительно хотите совершить данное действие?';

            detemiro::theme()->incFile('__templates/modal-confirm.php', array(
                'title' => $title,
                'text'  => $text
            ));
        }
    ));
?>