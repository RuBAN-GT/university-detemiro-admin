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

            detemiro::theme()->incFile('__templates/forms/groups.php', array(
                'all'     => \detemiro::groups()->getItems(),
                'title'   => (($item->title) ? $item->title : 'Группы'),
                'reader'  => (bool) $item->hideTitle,
                'place'   => (($item->desc)  ? $item->desc  : 'Выберете необходимые группы'),
                'value'   => ((is_array($item->value)) ? $item->value : array()),
                'name'    => $item->name,
                'class'   => $class,
                'require' => $item->require,
                'ignore'  => (bool) $item->ignore,
                'item'    => $item
            ));
        }
    ));
?>
