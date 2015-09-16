<?php
    detemiro::pages()->set(array(
        'title'    => 'Панель управления',
        'rules'    => 'admin,moderate',
        'function' => function() {
            $note = detemiro::user()->props()->get('notes', 'index');

            detemiro::theme()->incFile('index.php', array(
                'note' => $note
            ));
        }
    ));
?>