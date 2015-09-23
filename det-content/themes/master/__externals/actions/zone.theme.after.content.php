<?php
    detemiro::actions()->add(array(
        'function' => function() {
            if(detemiro::router()->page == 'users-profile') {
                $form = new \detemiro\modules\forms\form();

                if($fields = detemiro::fieldsControl()->getItems(array(
                    'limit' => 50,
                    'order' => array(
                        'priority' => 'asc'
                    )
                ))
                ) {
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
                            'name'     => $item['name'],
                            'type'     => $item['type'],
                            'priority' => $item['priority']
                        ));
                    }

                    detemiro::theme()->incFile('__templates/profile-fields.php', array(
                        'form' => $form
                    ));
                }
            }
        }
    ));

    detemiro::actions()->add(array(
        'function' => function() {
            if(detemiro::router()->page == 'users-settings') {
                if($form = detemiro::registry()->get('theme.userfields.users-settings')) {
                    detemiro::theme()->incFile('__templates/settings-userfields.php', array(
                        'form' => $form
                    ));
                }
            }
        }
    ));
?>