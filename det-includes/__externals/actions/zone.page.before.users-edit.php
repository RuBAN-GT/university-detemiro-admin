<?php
    detemiro::actions()->add(array(
        'function' => function() {
            $form = new detemiro\modules\forms\form(array(
                array(
                    'name'    => 'login',
                    'title'   => 'Логин',
                    'type'    => 'string',
                    'desc'    => 'Уникальный логин пользователя',
                    'require' => true
                ),
                array(
                    'title'   => 'Пароль',
                    'name'    => 'password',
                    'type'    => 'password',
                    'require' => true,
                ),
                array(
                    'name'  => 'rules',
                    'type'  => 'rules',
                    'value' => array()
                ),
                array(
                    'name'  => 'groups',
                    'type'  => 'groups',
                    'value' => array()
                ),
                array(
                    'name'   => 'type',
                    'value'  => 'add',
                    'ignore' => true,
                    'hidden'  => true
                )
            ));

            $old = null;

            if($_POST) {
                if(isset($_POST['rules']) == false) {
                    $_POST['rules'] = array();
                }
                if(isset($_POST['groups']) == false) {
                    $_POST['groups'] = array();
                }
            }

            if(isset($_GET['current']) && $_GET['current'] && ($old = detemiro::users()->getItem($_GET['current']))) {
                $old['password'] = '';

                $form->update('password', array('require' => false));
                $form->fillIn($old);
                $form->setValue('type', 'update');
                $form->set(array(
                    'name'     => 'id',
                    'type'     => 'number',
                    'title'    => 'ID',
                    'priority' => false,
                    'ignore'   => true,
                    'value'    => $old['id']
                ));

                detemiro::pages()->update('users/edit', array(
                    'title' => 'Обновление пользователя'
                ));

                if(isset($_GET['delete']) || isset($_POST['delete'])) {
                    if($old['id'] == detemiro::user()->id) {
                        detemiro::messages()->push(array(
                            'status' => 'error',
                            'type'   => 'public',
                            'text'   => 'Нельзя удалить самого себя.',
                            'title'  => 'Ошибка!'
                        ));
                    }
                    elseif(detemiro::users()->deleteItem($old['id'])) {
                        detemiro::messages()->push(array(
                            'status' => 'success',
                            'type'   => 'public',
                            'text'   => 'Пользователь успешно удалён.',
                            'title'  => 'Успех!',
                            'save'   => 2
                        ));

                        detemiro::router()->redirectOnPage('users');
                    }
                    else {
                        detemiro::messages()->push(array(
                            'status' => 'error',
                            'type'   => 'public',
                            'text'   => 'Не удалось удалить пользователя.',
                            'title'  => 'Ошибка!'
                        ));
                    }
                }
                elseif($_POST && $form->fillIn($_POST)) {
                    if($form->getValue('password') == '') {
                        $form->update('password', array('ignore' => true));
                    }
                    $send = $form->data();

                    if($form->validateAll() && detemiro::users()->updateItem($old['id'], $send)) {
                        detemiro::messages()->push(array(
                            'status' => 'success',
                            'type'   => 'public',
                            'text'   => 'Пользователь успешно обновлён.',
                            'title'  => 'Успех!'
                        ));
                    }
                    else {
                        detemiro::messages()->push(array(
                            'status' => 'error',
                            'type'   => 'public',
                            'text'   => 'Не удалось обновить пользователя.',
                            'title'  => 'Ошибка!'
                        ));
                    }

                    $form->update('password', array('ignore' => false));
                }
            }
            elseif($_POST && $form->fillIn($_POST)) {
                $send = $form->data();

                if($form->validateAll() && ($send = detemiro::users()->add($send))) {
                    detemiro::messages()->push(array(
                        'status' => 'success',
                        'type'   => 'public',
                        'text'   => 'Пользователь успешно добавлен.',
                        'title'  => 'Успех!',
                        'save'   => 2
                    ));

                    if(is_numeric($send)) {
                        detemiro::router()->redirectOnPage('users-edit', array(
                            'current' => $send
                        ));
                    }
                    else {
                        detemiro::router()->redirectOnPage('users');
                    }
                }
                else {
                    detemiro::messages()->push(array(
                        'status' => 'error',
                        'type'   => 'public',
                        'text'   => 'Не удалось добавить пользователя.',
                        'title'  => 'Ошибка!'
                    ));
                }
            }

            detemiro::registry()->set('page.users-edit', $form);
        }
    ));
?>