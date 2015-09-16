<?php
    detemiro::actions()->add(array(
        'function' => function() {
            /**
             * Создание формы
             */
            $form = new detemiro\modules\forms\form(array(
                array(
                    'title'   => 'Код',
                    'name'    => 'code',
                    'type'    => 'code',
                    'require' => true
                ),
                array(
                    'name'  => 'name',
                    'desc'  => 'Краткое название группы',
                    'title' => 'Имя',
                    'type'  => 'string'
                ),
                array(
                    'name'  => 'info',
                    'title' => 'Описание',
                    'type'  => 'textarea'
                ),
                array(
                    'name'  => 'rules',
                    'type'  => 'rules',
                    'value' => array()
                ),
                array(
                    'name'   => 'type',
                    'value'  => 'add',
                    'ignore' => true,
                    'hidden' => true
                )
            ));

            $old = null;

            if($_POST && isset($_POST['rules']) == false) {
                $_POST['rules'] = array();
            }

            if(isset($_GET['current']) && $_GET['current'] && ($old = detemiro::groups()->getItem($_GET['current']))) {
                $form->fillIn($old);

                $form->setValue('type', 'update');

                detemiro::pages()->update('settings/groups/edit', array(
                    'title' => 'Обновление группы'
                ));
                
                /**
                 * Удаление группы
                 */
                if(isset($_GET['delete']) || isset($_POST['delete'])) {
                    if(detemiro::groups()->deleteItem($old['code'])) {
                        detemiro::messages()->push(array(
                            'status' => 'success',
                            'type'   => 'public',
                            'text'   => 'Группа успешно удалена.',
                            'title'  => 'Успех!',
                            'save'   => 2
                        ));

                        detemiro::router()->redirectOnPage('settings-groups');
                    }
                    else {
                        detemiro::messages()->push(array(
                            'status' => 'error',
                            'type'   => 'public',
                            'text'   => 'Не удалось удалить группу.',
                            'title'  => 'Ошибка!'
                        ));
                    }
                }
                /**
                 * Обновление группы
                 */
                elseif($_POST && $form->fillIn($_POST)) {
                    $send = $form->data();

                    if($form->validateAll() && detemiro::groups()->updateItem($old['code'], $send)) {
                        $i = ($send['code'] == $old['code']) ? 1 : 2;

                        detemiro::messages()->push(array(
                            'status' => 'success',
                            'type'   => 'public',
                            'text'   => 'Группа успешно обновлена.',
                            'title'  => 'Успех!',
                            'save'   => $i
                        ));

                        if($i == 2) {
                            detemiro::router()->redirectOnPage('settings-groups-edit', array(
                                'current' => $send['code']
                            ));
                        }
                    }
                    else {
                        detemiro::messages()->push(array(
                            'status' => 'error',
                            'type'   => 'public',
                            'text'   => 'Не удалось обновить группу.',
                            'title'  => 'Ошибка!'
                        ));
                    }
                }
            }
            /**
             * Добавление группы
             */
            elseif($_POST && $form->fillIn($_POST)) {
                $send = $form->data();

                if($form->validateAll() && detemiro::groups()->add($send)) {
                    detemiro::messages()->push(array(
                        'status' => 'success',
                        'type'   => 'public',
                        'text'   => 'Группа успешно добавлена.',
                        'title'  => 'Успех!',
                        'save'   => 2
                    ));

                    detemiro::router()->redirectOnPage('settings-groups-edit', array(
                        'current' => $send['code']
                    ));
                }
                else {
                    detemiro::messages()->push(array(
                        'status' => 'error',
                        'type'   => 'public',
                        'text'   => 'Не удалось добавить группу.',
                        'title'  => 'Ошибка!'
                    ));
                }
            }

            /**
             * Сохранение формы в регистр, для её получение в функции страницы
             */
            detemiro::registry()->set('page.settings-groups-edit', $form);
        }
    ));
?>