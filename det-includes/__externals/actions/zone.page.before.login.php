<?php
    /**
     * Форма аутентификации только для гостей
     */
    detemiro::actions()->add(array(
        'priority' => false,
        'function' => function() {
            if(detemiro::user()->checkGroups('!guests')) {
                detemiro::messages()->push(array(
                    'title'  => 'Возвращение на главную',
                    'text'   => 'Вы уже зашли на сайт.',
                    'save'   => 2,
                    'type'   => 'public',
                    'status' => 'info'
                ));

                detemiro::router()->redirectOnPage('index');
            }
        }
    ));

    /**
     * Построение формы
     */
    detemiro::actions()->add(array(
        'priority' => 0,
        'function' => function() {
            $form = new \detemiro\modules\forms\form(array(
                array(
                    'type'       => 'string',
                    'name'       => 'main-login',
                    'title'      => 'Логин',
                    'desc'       => 'Логин',
                    'hideTitle'  => true,
                    'hideValide' => true,
                    'value'      => '',
                    'priority'   => 10,
                    'require'    => true
                ),
                array(
                    'type'       => 'password',
                    'name'       => 'main-pass',
                    'title'      => 'Пароль',
                    'desc'       => 'Пароль',
                    'hideTitle'  => true,
                    'hideValide' => true,
                    'value'      => '',
                    'priority'   => 20,
                    'require'    => true
                ),
                array(
                    'type'       => 'check',
                    'name'       => 'cookie-session-remember',
                    'title'      => 'Запомнить меня',
                    'hideValide' => true,
                    'priority'   => 100,
                    'require'    => false
                )
            ));

            detemiro::registry()->set('page.login', $form);
        }
    ));

    detemiro::actions()->add(array(
        'priority' => true,
        'function' => function() {
            if($form = detemiro::registry()->get('page.login')) {
                if($_POST && $form->fillIn($_POST)) {
                    if($form->validateAll()) {
                        detemiro::registry()->set('page.login', $form);

                        if($zone = detemiro::actions()->getZone('page.login.handle')) {
                            while($zone && detemiro::user()->check == false) {
                                $action = array_shift($zone);

                                if($action->make($form->data(), $form)) {
                                    break;
                                }
                            }

                            if(detemiro::user()->check) {
                                detemiro::messages()->push(array(
                                    'title'  => 'Добро пожаловать!',
                                    'text'   => 'С возвращением на сайт.',
                                    'save'   => 2,
                                    'type'   => 'public',
                                    'status' => 'success'
                                ));

                                detemiro::router()->redirectOnPage('index');
                            }
                        }
                    }
                    else {
                        detemiro::messages()->push(array(
                            'title'  => 'Ошибка заполнения формы!',
                            'text'   => 'Проверьте правильность заполненных полей.',
                            'type'   => 'public',
                            'status' => 'error'
                        ));
                    }
                }
            }
            else {
                detemiro::router()->redirectOnPage('404');
            }
        }
    ));
?>