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

            $needed = array_merge(detemiro::space()->rels->data(), detemiro::rels()->data());
            $reqs   = array(array(), array());
            foreach($needed as &$item) {
                if($item['method'] == 'require') {
                    $reqs[0][] = $item['name'];
                }
                elseif($item['method'] == 'support') {
                    $reqs[1][] = $item['name'];
                }
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