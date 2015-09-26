<?php
    detemiro::pages()->add(array(
        'title'    => 'Модули',
        'rules'    => 'admin,moderate-core',
        'function' => function() {
            $modules = detemiro::modules()->all();
            uasort($modules, function($a, $b) {
                return strcasecmp($a->code, $b->code);
            });

            $res = array(
                'required'  => array(),
                'added'     => array(),
                'activated' => array(),
                'installed' => array(),
                'other'     => array(),
            );

            $reqs = array(array(), array());
            foreach(detemiro::modules()->relations()->dumpMethod('require') as $item) {
                $reqs[0][] = $item->name;
            }
            foreach(detemiro::modules()->relations()->dumpMethod('support') as $item) {
                $reqs[1][] = $item->name;
            }

            foreach($modules as $item) {
                if(in_array($item->code, $reqs[0])) {
                    $res['required'][] = $item;
                }
                if(in_array($item->code, $reqs[1])) {
                    $res['added'][] = $item;
                }

                switch($item->status) {
                    case 2:
                        $res['activated'][] = $item;
                        break;
                    case 1:
                        $res['installed'][] = $item;
                        break;
                    default:
                        $res['other'][] = $item;
                }
            }

            detemiro::theme()->incFile('modules.php', array(
                'modules'  => $modules,
                'statuses' => $res
            ));
        }
    ));
?>