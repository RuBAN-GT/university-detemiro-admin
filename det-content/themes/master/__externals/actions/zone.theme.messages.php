<?php
    detemiro::actions()->add(array(
        'function' => function() {
            if($messages = detemiro::messages()->getType('public', array('error', 'warning', 'success', 'info'))) {
                $class = array(
                    1 => 'alert-danger',
                    2 => 'alert-warning',
                    3 => 'alert-success',
                    4 => 'alert-info'
                );

                foreach($messages as $message) {
                    echo '<div class="alert ' . $class[$message->status] .' alert-dismissible" role="alert">';
                    echo '<button type="button" class="close" data-dismiss="alert" aria-label="Закрыть"><span aria-hidden="true">&times;</span></button>';
                    echo "<h4>{$message->title}</h4>";
                    echo "<p>{$message->text}</p>";
                    echo '</div>';
                }
            }
        }
    ));
?>