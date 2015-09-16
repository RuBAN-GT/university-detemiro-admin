<?php
    detemiro::actions()->add(array(
        'pages'    => 'users-profile',
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
                        'name'     => $item['name'],
                        'type'     => $item['type'],
                        'priority' => $item['priority']
                    ));
                }

                detemiro::theme()->incFile('users/profile-fields.php', array(
                    'form' => $form
                ));
            }
        }
    ));

    detemiro::actions()->add(array(
        'pages'    => 'users-settings',
        'function' => function() {
            if($form = detemiro::registry()->get('theme.userfields.users-settings')) {
                detemiro::theme()->incFile('users/settings-userfields.php', array(
                    'form' => $form
                ));
            }
        }
    ));
?>