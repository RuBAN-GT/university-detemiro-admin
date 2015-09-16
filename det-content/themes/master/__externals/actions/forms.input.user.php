<?php
    detemiro::actions()->add(array(
        'function' => function($item) {
            $class = '';
            if($item->hideValide == false) {
                if($item->valide == true) {
                    $class = ' has-success';
                }
                elseif($item->valide === false) {
                    $class = ' has-error';
                }
            }

            detemiro::theme()->incFile('__templates/forms/user.php', array(
                'all'     => detemiro::users()->get(array(
                    'cols' => 'id,login'
                )),
                'title'   => (($item->title) ? $item->title : 'Пользователь'),
                'reader'  => (bool) $item->hideTitle,
                'place'   => (($item->desc)  ? $item->desc  : ''),
                'value'   => $item->value,
                'name'    => $item->name,
                'class'   => $class,
                'require' => $item->require,
                'ignore'  => (bool) $item->ignore,
                'item'    => $item
            ));
        }
    ));
?>
