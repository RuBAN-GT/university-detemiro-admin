<?php
    detemiro::actions()->add(array(
        'priority' => -5,
        'function' => function() {
            $form = new detemiro\modules\forms\form(array(
                array(
                    'name'    => 'login',
                    'value'   => detemiro::user()->login,
                    'title'   => 'Логин',
                    'type'    => 'string',
                    'require' => true
                ),
                array(
                    'name'    => 'actual',
                    'value'   => '',
                    'title'   => 'Старый пароль',
                    'type'    => 'password'
                ),
                array(
                    'name'    => 'password',
                    'value'   => '',
                    'title'   => 'Новый пароль',
                    'type'    => 'password'
                )
            ));

            if($_POST && $form->fillIn($_POST)) {
                if($form->validate('login') !== false) {
                    if($form->getValue('login') != detemiro::user()->login) {
                        if(detemiro::user()->updateItem('login', $form->getValue('login'))) {
                            detemiro::messages()->push(array(
                                'type'   => 'public',
                                'status' => 'success',
                                'title'  => 'Логин обновлён',
                                'text'   => 'Ваш логин успешно обновлён!'
                            ));
                        }
                        else {
                            $form->setValide('login', false);

                            detemiro::messages()->push(array(
                                'type'   => 'public',
                                'status' => 'error',
                                'title'  => 'Неверный логин',
                                'text'   => 'Новый логин не корректен, попробуйте другой.'
                            ));
                        }
                    }
                    else {
                        detemiro::messages()->push(array(
                            'type'   => 'public',
                            'status' => 'info',
                            'title'  => 'Логин не изменился',
                            'text'   => 'Логин вашего аккаунта не был изменён.'
                        ));
                    }
                }
                else {
                    detemiro::messages()->push(array(
                        'type'   => 'public',
                        'status' => 'error',
                        'title'  => 'Неверный логин',
                        'text'   => 'Проверьте правильность заполненного логина.'
                    ));
                }

                if($form->getValue('actual')) {
                    if($form->validate('actual')) {
                        if($form->getValue('password') && $form->validate('password') !== false) {
                            if(detemiro::user()->updateItem('password', $form->getValue('password'))) {
                                detemiro::messages()->push(array(
                                    'type'   => 'public',
                                    'status' => 'success',
                                    'title'  => 'Пароль обновлён',
                                    'text'   => 'Ваш пароль успешно обновлён!'
                                ));
                            }
                            else {
                                $form->setValide('password', false);

                                detemiro::messages()->push(array(
                                    'type'   => 'public',
                                    'status' => 'error',
                                    'title'  => 'Неверный пароль',
                                    'text'   => 'Новый пароль не корректен, попробуйте другой.'
                                ));
                            }
                        }
                        else {
                            $form->setValide('password', false);

                            detemiro::messages()->push(array(
                                'type'   => 'public',
                                'status' => 'error',
                                'title'  => 'Неверный пароль',
                                'text'   => 'Новый пароль должен быть непустой строкой.'
                            ));
                        }
                    }
                    else {
                        detemiro::messages()->push(array(
                            'type'   => 'public',
                            'status' => 'error',
                            'title'  => 'Неверный пароль',
                            'text'   => 'Проверьте правильность вашего старого пароля.'
                        ));
                    }
                }
            }

            detemiro::registry()->set('page.users-settings', $form);
        }
    ));
?>