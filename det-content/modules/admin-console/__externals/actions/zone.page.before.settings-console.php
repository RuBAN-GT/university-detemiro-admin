<?php
    detemiro::actions()->add(array(
        'function' => function() {
            $form = new detemiro\modules\forms\form(array(
                array(
                    'name'    => 'command',
                    'type'    => 'string',
                    'require' => true,
                    'value'   => ''
                ),
                array(
                    'name'  => 'result',
                    'value' => false
                )
            ));

            if($form->fillIn($_POST)) {
                if($form->getValue('command') && $form->validate('command') !== false) {
                    ob_start();

                    $time_start = microtime(true);

                    eval($form->getValue('command'));

                    $time_end = microtime(true);

                    $time = number_format($time_end - $time_start, 10);

                    $form->setValue('result', ob_get_clean());

                    detemiro::messages()->push(array(
                        'title'  => 'Выполнено!',
                        'text'   => "Данная операция заняла приблизительно $time мс.",
                        'type'   => 'public',
                        'status' => 'success'
                    ));
                }
                else {
                    detemiro::messages()->push(array(
                        'title'  => 'Ошибка!',
                        'text'   => 'Проверьте правильность формата команды.',
                        'type'   => 'public',
                        'status' => 'error'
                    ));
                }
            }

            detemiro::registry()->set('page.settings-console', $form);
        }
    ));
?>