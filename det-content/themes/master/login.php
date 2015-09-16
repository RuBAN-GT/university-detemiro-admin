<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=detemiro::router()->getTitle(); ?></title>

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:500,400italic,700italic,300,700,500italic,300italic,400&subset=latin,cyrillic" />
    <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="<?=detemiro::theme()->getFileLink('css/style.min.css'); ?>" />
    <link rel="stylesheet" href="<?=detemiro::theme()->getFileLink('css/login.min.css'); ?>" />

    <!--[if lt IE 9]>
        <script src="<?=detemiro::theme()->getFileLink('js/html5shiv.min.js'); ?>"></script>
        <script src="<?=detemiro::theme()->getFileLink('js/respond.min.js'); ?>"></script>
    <![endif]-->

    <?php detemiro::actions()->makeZone('theme.header'); ?>
</head>
<body>
    <div id="form-auth" class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Вход в админ-панель</div>
            <div class="panel-body">
                <form method="POST">
                    <?php $det_form->printInputList(); ?>

                    <?php detemiro::actions()->makeZone('theme.form.login'); ?>

                    <button class="btn btn-primary btn-block">
                        Войти <i class="material-icons">lock_open</i>
                    </button>
                </form>
            </div>
        </div>

        <div id="messages"><?php detemiro::actions()->makeZone('theme.messages'); ?></div>
    </div>

    <script src="<?=detemiro::theme()->getFileLink('js/jquery.min.js'); ?>"></script>
    <script src="<?=detemiro::theme()->getFileLink('js/bootstrap.min.js'); ?>"></script>

    <?php detemiro::actions()->makeZone('theme.footer'); ?>
</body>
</html>