<?php
    detemiro::actions()->add(array(
        'function' => function() {
            $form = new detemiro\modules\forms\form(array(
                array(
                    'name'    => 'code',
                    'type'    => 'code',
                    'require' => true
                ),
                array(
                    'name'  => 'info',
                    'title' => 'Описание',
                    'type'  => 'textarea'
                ),
                array(
                    'name'   => 'type',
                    'value'  => 'add',
                    'ignore' => true,
                    'hidden' => true
                )
            ));

            $old = null;

            if(isset($_GET['current']) && $_GET['current'] && ($old = detemiro::rules()->getItem($_GET['current']))) {
                $form->fillIn($old);

                $form->setValue('type', 'update');

                detemiro::pages()->update('settings/rules/edit', array(
                    'title' => 'Обновление права'
                ));

                if(isset($_GET['delete']) || isset($_POST['delete'])) {
                    if(detemiro::rules()->deleteItem($old['code'])) {
                        detemiro::messages()->push(array(
                            'status' => 'success',
                            'type'   => 'public',
                            'text'   => 'Право успешно удалено.',
                            'title'  => 'Успех!',
                            'save'   => 2
                        ));

                        detemiro::router()->redirectOnPage('settings/rules');
                    }
                    else {
                        detemiro::messages()->push(array(
                            'status' => 'error',
                            'type'   => 'public',
                            'text'   => 'Не удалось удалить право.',
                            'title'  => 'Ошибка!'
                        ));
                    }
                }
                elseif($_POST && $form->fillIn($_POST)) {
                    $send = $form->data();

                    if($form->validateAll() && detemiro::rules()->updateItem($old['code'], $send)) {
                        $i = ($send['code'] == $old['code']) ? 1 : 2;

                        detemiro::messages()->push(array(
                            'status' => 'success',
                            'type'   => 'public',
                            'text'   => 'Право успешно обновлено.',
                            'title'  => 'Успех!',
                            'save'   => $i
                        ));

                        if($i == 2) {
                            detemiro::router()->redirectOnPage('settings/rules/edit', array(
                                'current' => $send['code']
                            ));
                        }
                    }
                    else {
                        detemiro::messages()->push(array(
                            'status' => 'error',
                            'type'   => 'public',
                            'text'   => 'Не удалось обновить право.',
                            'title'  => 'Ошибка!'
                        ));
                    }
                }
            }
            elseif($_POST && $form->fillIn($_POST)) {
                $send = $form->data();

                if($form->validateAll() && detemiro::rules()->add($send)) {
                    detemiro::messages()->push(array(
                        'status' => 'success',
                        'type'   => 'public',
                        'text'   => 'Право успешно добавлено.',
                        'title'  => 'Успех!',
                        'save'   => 2
                    ));

                    detemiro::router()->redirectOnPage('settings/rules/edit', array(
                        'current' => $send['code']
                    ));
                }
                else {
                    detemiro::messages()->push(array(
                        'status' => 'error',
                        'type'   => 'public',
                        'text'   => 'Не удалось добавить право.',
                        'title'  => 'Ошибка!'
                    ));
                }
            }

            detemiro::registry()->set('page.settings-rules-edit', $form);
        }
    ));
?>