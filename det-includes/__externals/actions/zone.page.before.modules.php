<?php
    detemiro::actions()->add(array(
        'function' => function() {
            if(isset($_GET['operation'], $_GET['code']) && is_string($_GET['operation']) && is_string($_GET['code'])) {
                switch($_GET['operation']) {
                    case 'install':
                        if(detemiro::modules()->install($_GET['code'])) {
                            detemiro::messages()->push(array(
                                'title'  => 'Успех!',
                                'text'   => 'Модуль успешно установлен.',
                                'status' => 'success',
                                'type'   => 'public',
                                'save'   => 2
                            ));

                            detemiro::router()->redirectOnPage('modules');
                        }
                        break;
                    case 'deactivate':
                        if(detemiro::modules()->deactivate($_GET['code'])) {
                            detemiro::messages()->push(array(
                                'title'  => 'Успех!',
                                'text'   => 'Модуль успешно деактивирован.',
                                'status' => 'success',
                                'type'   => 'public',
                                'save'   => 2
                            ));

                            detemiro::router()->redirectOnPage('modules');
                        }
                        break;
                    case 'activate':
                        if(detemiro::modules()->activate($_GET['code'])) {
                            detemiro::messages()->push(array(
                                'title'  => 'Успех!',
                                'text'   => 'Модуль успешно активирован.',
                                'status' => 'success',
                                'type'   => 'public',
                                'save'   => 2
                            ));

                            detemiro::router()->redirectOnPage('modules');
                        }
                        break;
                    case 'uninstall': 
                        if(detemiro::modules()->uninstall($_GET['code'])) {
                            detemiro::messages()->push(array(
                                'title'  => 'Успех!',
                                'text'   => 'Модуль успешно удалён.',
                                'status' => 'success',
                                'type'   => 'public',
                                'save'   => 2
                            ));

                            detemiro::router()->redirectOnPage('modules');
                        }
                        break;
                }
            }
        }
    ));
?>