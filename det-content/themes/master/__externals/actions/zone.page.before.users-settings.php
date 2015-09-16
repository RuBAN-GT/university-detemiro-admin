<?php
    detemiro::actions()->add(array(
        'function' => function() {
            $form = new \detemiro\modules\forms\form();

            if($fields = detemiro::fieldsControl()->getItems(array(
                'limit'  => 50,
                'order'  => array(
                    'priority' => 'asc'
                )
            ))) {
                foreach($fields as $item) {
                    if($try = detemiro::user()->fields()->get($item['name'])) {
                        $value = $try;
                    }
                    else {
                        $value = $item['value'];
                    }

                    $form->set(array(
                        'title'    => $item['title'],
                        'value'    => $value,
                        'desc'     => $item['info'],
                        'require'  => $item['require'],
                        'name'     => "userfields-{$item['name']}",
                        'type'     => $item['type'],
                        'priority' => $item['priority']
                    ));
                }
            }

            if($_POST && $form->fillIn($_POST)) {
                if($form->validateAll()) {
                    $send = $form->data();

                    foreach($send as $key=>$item) {
                        detemiro::user()->fields()->set(
                            substr($key, 11),
                            $item,
                            false
                        );
                    }

                    detemiro::messages()->push(array(
                        'status' => 'success',
                        'type'   => 'public',
                        'title'  => 'Успех',
                        'text'   => 'Поля профиля успешно обновлены!'
                    ));
                }
                else {
                    detemiro::messages()->push(array(
                        'status' => 'error',
                        'type'   => 'public',
                        'title'  => 'Неудача',
                        'text'   => 'Проверьте правильность полей профиля!'
                    ));
                }
            }

            detemiro::registry()->set('theme.userfields.users-settings', $form);
        }
    ));
?>