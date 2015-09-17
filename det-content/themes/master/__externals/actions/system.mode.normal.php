<?php
    detemiro::actions()->set(array(
        'function' => function() {
            $tmp = null;
            if(
                (
                    $tmp = detemiro::pages()->get(detemiro::router()->page)
                )
                &&
                $tmp->function &&
                $tmp->isAllow()
            )
            {
                $page = $tmp;
            }
            elseif(($tmp = detemiro::pages()->get('404')) && $tmp->function) {
                $page = $tmp;
            }
            else {
                $page = null;
            }

            if($page) {
                if($page->full == false) {
                    detemiro::theme()->incFile('header.php');
                }

                $page->show();


                if($page->full == false) {
                    detemiro::theme()->incFile('footer.php');
                }
            }
            else {
                echo 'Страница не определена.';
            }
        }
    ));
?>