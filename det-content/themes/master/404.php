<?php
    $url = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : detemiro::router()->getLink('index');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>404. Страница не найдена</title>

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:500,400italic,700italic,300,700,500italic,300italic,400&subset=latin,cyrillic" />
    <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="<?=detemiro::theme()->getFileLink('css/style.min.css'); ?>" />

    <!--[if lt IE 9]>
    <script src="<?=detemiro::theme()->getFileLink('js/html5shiv.min.js'); ?>"></script>
    <script src="<?=detemiro::theme()->getFileLink('js/respond.min.js'); ?>"></script>
    <![endif]-->

    <?php detemiro::actions()->makeZone('theme.header'); ?>
</head>
<body>
    <div style="max-width: 800px; margin: 0 auto; padding: 20px; text-align: center;">
        <h4>Указанная страница не найдена или не задана ;(</h4>
        <p>Но не печальтесь, посмотрите на Бобросова.</p>
        <p><a href="<?=$url;?>" class="btn btn-default" data-title="tooltip" title="Назад">
            <i class="material-icons">keyboard_return</i> Вернуться
        </a></p>
        <p><img class="img-rounded" alt="Bobrosov" src="<?=detemiro::theme()->getFileLink('images/404.jpg');?>" /></p>
    </div>

    <script src="<?=detemiro::theme()->getFileLink('js/jquery.min.js'); ?>"></script>
    <script src="<?=detemiro::theme()->getFileLink('js/bootstrap.min.js'); ?>"></script>

</body>
</html>