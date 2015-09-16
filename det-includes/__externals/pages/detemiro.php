<?php
    detemiro::pages()->add(array(
        'rules'    => 'admin,moderate-core',
        'title'    => 'О Detemiro',
        'function' => function () {
            $res = null;

            if(detemiro::cache()) {
                $res = detemiro::cache()->get('detemiro.issues');

                $c = true;
            }
            else {
                $c = false;
            }

            if($res == null) {
                $res = detemiro\modules\router\router::sendRequest(
                    'https://api.github.com/repos/RuBAN-GT/detemiro/issues?labels=enhancement',
                    null,
                    'GET'
                );

                if($res) {
                    $res = \detemiro\json_decode_struct($res);
                }
                else {
                    $res = array();
                }

                if($c) {
                    detemiro::cache()->set('detemiro.issues', $res, 86400);
                }
            }

            detemiro::theme()->incFile('detemiro/about.php', array(
                'issues' => $res
            ));
        }
    ));
?>