<?php
    detemiro::actions()->add(array(
        'code'     => 'redirectOnLogin',
        'space'    => 'admin',
        'priority' => true,
        'function' => function() {
            if(detemiro::router()->page != 'login' && detemiro::router()->original != '404') {
                if(detemiro::user()->check) {
                    if($page = detemiro::pages()->get(detemiro::router()->page)) {
                        if($page->isAllow() == false) {
                            detemiro::user()->signOut();

                            detemiro::messages()->push(array(
                                'type'   => 'public',
                                'status' => 'info',
                                'title'  => 'Выход',
                                'text'   => 'Произошёл выход из учётной записи, т.к. у вас недостаточно прав для доступа к админ-панели.',
                                'save'   => 2
                            ));
                        }
                    }
                }

                if(detemiro::user()->checkGroups('guests')) {
                    detemiro::router()->redirectOnPage('login');
                }
            }
        }
    ));
?>