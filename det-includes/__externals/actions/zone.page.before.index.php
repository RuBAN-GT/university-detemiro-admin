<?php
    detemiro::actions()->add(array(
        'function' => function() {
            if(isset($_POST['note']) && is_string($_POST['note'])) {
                if(detemiro::user() && detemiro::user()->check) {
                    if(detemiro::user()->props()->set('notes', 'index', $_POST['note'])) {
                        detemiro::messages()->push(array(
                            'title'  => 'Успех!',
                            'text'   => 'Заметка успешно обновлена.',
                            'type'   => 'public',
                            'status' => 'success'
                        ));

                        return true;
                    }
                    else {
                        detemiro::messages()->push(array(
                            'title'  => 'Неудача!',
                            'text'   => 'Не получилось обновить заметку, попробуйте повторить действие позже.',
                            'type'   => 'public',
                            'status' => 'error'
                        ));
                    }
                }

                return false;
            }
        }
    ));
?>