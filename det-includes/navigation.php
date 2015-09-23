<?php
    /**
     * Установка общей навигации
     */

    \detemiro::services()->set('navigation', new \detemiro\modules\basicNavigation\nav());

    \detemiro::navigation()->push(array(
        'code'     => 'index',
        'value'    => 'index',
        'title'    => 'Панель управления',
        'icon'     => 'dashboard',
        'priority' => 0
    ));

    \detemiro::navigation()->push(array(
        'value'    => 'users',
        'code'     => 'users',
        'title'    => 'Пользователи',
        'icon'     => 'people',
        'priority' => 10
    ));
    \detemiro::navigation()->push(array(
        'value'    => 'users',
        'code'     => 'users-list',
        'title'    => 'Список пользователей',
        'parent'   => 'users',
        'priority' => 10
    ));
    \detemiro::navigation()->push(array(
        'value'    => 'users/edit',
        'code'     => 'users-edit',
        'title'    => 'Добавить пользователя',
        'parent'   => 'users',
        'priority' => 30
    ));

    \detemiro::navigation()->push(array(
        'code'     => 'modules',
        'value'    => 'modules',
        'title'    => 'Модули',
        'icon'     => 'extension',
        'priority' => 40
    ));

    \detemiro::navigation()->push(array(
        'page'     => false,
        'value'    => '#',
        'code'     => 'settings',
        'title'    => 'Настройки',
        'icon'     => 'settings',
        'rules'    => (($page = detemiro::pages()->get('settings/rules')) ? $page->rules : 'admin,moderate-core'),
        'priority' => 50
    ));
    \detemiro::navigation()->push(array(
        'value'    => 'settings/rules',
        'code'     => 'settings-rules',
        'parent'   => 'settings',
        'title'    => true,
        'priority' => 10
    ));
    \detemiro::navigation()->push(array(
        'value'    => 'settings/groups',
        'code'     => 'settings-groups',
        'parent'   => 'settings',
        'title'    => true,
        'priority' => 20
    ));
    \detemiro::navigation()->push(array(
        'value'    => 'settings/php-info',
        'code'     => 'settings-pnp-info',
        'parent'   => 'settings',
        'title'    => true,
        'priority' => 100
    ));
?>