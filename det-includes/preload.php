<?php
    /**
     * Подгрузка статусов модулей
     */
    detemiro::modules()->run('basic');
    detemiro::services()->set('modulesStatuses', new \detemiro\space\optionsStatuses());

    /**
     * Подгрузка конфигурации
     */
    if($config = detemiro::options()->getFamily('config.' . detemiro::space()->code)) {
        foreach($config as $key=>$value) {
            detemiro::config()->set($key, $value);
        }
    }
?>