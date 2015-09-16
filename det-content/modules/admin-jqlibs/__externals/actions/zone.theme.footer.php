<?php
    detemiro::actions()->add(array(
        'code'     => 'jqlibs.detemiro',
        'priority' => -15,
        'function' => function() {
            $src = detemiro::router()->getModuleLink('js/jquery.detemiro.js', __FILE__);

            echo "<script src=\"{$src}\"></script>\n";
        }
    ));

    detemiro::actions()->add(array(
        'code'     => 'jqlibs.api-link',
        'priority' => -10,
        'function' => function() {
            $file = ltrim(detemiro::options()->getValue(array('jqlibs', 'handler')), '/.');
            if($file == null) {
                $file = 'api.php';
            }

            if(file_exists(detemiro::space()->path . "/$file")) {
                echo '<script>$.detemiro.API = "' . detemiro::router()->url . '/' . $file . '";</script>' . PHP_EOL;
            }
            else {
                detemiro::messages()->push(array(
                    'status' => 'error',
                    'type'   => 'jqlibs',
                    'title'  => 'Ошибка обработчика!',
                    'text'   => 'Для модуля ' . detemiro::modules()->getByPath(__FILE__)->code . ', не выбран обработчик (следует указать в опциях [\'jqlibs\', \'handler\']).'
                ));
            }
        }
    ));

    detemiro::actions()->add(array(
        'code'     => 'jqlibs.detworker',
        'priority' => -5,
        'function' => function() {
            $src = detemiro::router()->getModuleLink('js/jquery.detWorker.js', __FILE__);

            echo "<script src=\"{$src}\"></script>\n";
        }
    ));
?>