<?php
    detemiro::actions()->add(array(
        'function' => function() {
            $form = new detemiro\modules\forms\form(array(
                array(
                    'name'    => 'title',
                    'type'    => 'string',
                    'title'   => 'Название поля',
                    'require' => false
                ),
                array(
                    'name'    => 'name',
                    'type'    => 'code',
                    'title'   => 'Код элемента',
                    'require' => true
                ),
                array(
                    'name'    => 'type',
                    'title'   => 'Тип',
                    'type'    => 'code',
                    'require' => true
                ),
                array(
                    'name'    => 'value',
                    'title'   => 'Значение по-умолчанию',
                    'type'    => 'string',
                ),
                array(
                    'name'    => 'require',
                    'title'   => 'Обязательное',
                    'type'    => 'bool',
                    'value'   => false
                ),
                array(
                    'name'    => 'priority',
                    'title'   => 'Порядок',
                    'desc'    => 'Введите число',
                    'type'    => 'number',
                    'value'   => 0
                ),
                array(
                    'name'    => 'info',
                    'title'   => 'Описание поля',
                    'type'    => 'textarea'
                ),
                array(
                    'name'    => 'status',
                    'ignore'  => true,
                    'value'   => 'add'
                )
            ));

            $old = null;

            if(isset($_GET['current']) && $_GET['current'] && ($old = detemiro::fieldsControl()->getItem($_GET['current']))) {
                $form->fillIn($old);

                $form->setValue('status', 'update');

                detemiro::pages()->update('users/fields/edit', array(
                    'title' => 'Обновление поля'
                ));

                if(isset($_GET['delete']) || isset($_POST['delete'])) {
                    if(detemiro::fieldsControl()->deleteItem($old['name'])) {
                        detemiro::messages()->push(array(
                            'status' => 'success',
                            'type'   => 'public',
                            'text'   => 'Поле успешно удалено.',
                            'title'  => 'Успех!',
                            'save'   => 2
                        ));

                        detemiro::router()->redirectOnPage('users/fields');
                    }
                    else {
                        detemiro::messages()->push(array(
                            'status' => 'error',
                            'type'   => 'public',
                            'text'   => 'Не удалось удалить поле.',
                            'title'  => 'Ошибка!'
                        ));
                    }
                }
                elseif($_POST && $form->fillIn($_POST)) {
                    $send = $form->data();

                    if($form->validateAll() && detemiro::fieldsControl()->updateItem($old['name'], $send)) {
                        $i = ($send['name'] == $old['name']) ? 1 : 2;

                        detemiro::messages()->push(array(
                            'status' => 'success',
                            'type'   => 'public',
                            'text'   => 'Поле успешно обновлено.',
                            'title'  => 'Успех!',
                            'save'   => $i
                        ));

                        if($i == 2) {
                            detemiro::router()->redirectOnPage('users/fields/edit', array(
                                'current' => $send['name']
                            ));
                        }
                    }
                    else {
                        detemiro::messages()->push(array(
                            'status' => 'error',
                            'type'   => 'public',
                            'text'   => 'Не удалось обновить поле.',
                            'title'  => 'Ошибка!'
                        ));
                    }
                }
            }
            elseif($_POST && $form->fillIn($_POST)) {
                $send = $form->data();

                if($form->validateAll() && detemiro::fieldsControl()->add($send)) {
                    detemiro::messages()->push(array(
                        'status' => 'success',
                        'type'   => 'public',
                        'text'   => 'Поле успешно добавлено.',
                        'title'  => 'Успех!',
                        'save'   => 2
                    ));

                    detemiro::router()->redirectOnPage('users/fields/edit', array(
                        'current' => $send['name']
                    ));
                }
                else {
                    detemiro::messages()->push(array(
                        'status' => 'error',
                        'type'   => 'public',
                        'text'   => 'Не удалось добавить поле.',
                        'title'  => 'Ошибка!'
                    ));
                }
            }

            detemiro::registry()->set('page.users-fields-edit', $form);
        }
    ));
?>