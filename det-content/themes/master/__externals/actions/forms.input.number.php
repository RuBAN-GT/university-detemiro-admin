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

            detemiro::theme()->incFile('__templates/forms/number.php', array(
                'title'   => (($item->title) ? $item->title : ''),
                'reader'  => (bool) $item->hideTitle,
                'place'   => (($item->desc)  ? $item->desc  : ''),
                'value'   => $item->getPrintedValue(),
                'name'    => $item->name,
                'class'   => $class,
                'require' => $item->require,
                'ignore'  => (bool) $item->ignore,
                'max'     => intval($item->max),
                'min'     => intval($item->min),
                'item'    => $item
            ));
        }
    ));
?>