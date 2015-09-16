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

    <link rel="shortcut icon" href="<?=detemiro::theme()->getFileLink('favicon.ico'); ?>" />

    <!--[if lt IE 9]>
        <script src="<?=detemiro::theme()->getFileLink('js/html5shiv.min.js'); ?>"></script>
        <script src="<?=detemiro::theme()->getFileLink('js/respond.min.js'); ?>"></script>
    <![endif]-->

    <?php detemiro::actions()->makeZone('theme.header'); ?>
</head>
<body<?php \detemiro\themes\check_sidebar(); ?>>
<div id="sidebar">
    <header class="sidebar-header">
        <div class="sidebar-header-bg">
            <?php \detemiro\themes\profile_bg(); ?>
        </div>
        <div class="sidebar-header-content">
            <div class="avatar">
                <?php \detemiro\themes\avatar(); ?>
            </div>
            <div class="current-user">
                <div class="current-user-name"><?=\detemiro\themes\get_name(); ?></div>
                <div class="current-user-menu dropdown">
                    <span class="dropdown-toggle" id="sidebar-profile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="caret"></i>
                    </span>
                    <ul class="dropdown-menu" aria-labelledby="sidebar-profile">
                        <li><a href="<?=\detemiro\themes\get_link('users/profile');?>">
                            <i class="material-icons">person</i> Профиль</a>
                        </li>
                        <li><a href="<?=\detemiro\themes\get_link('users/settings');?>">
                            <i class="material-icons">settings_applications</i> Настройки</a>
                        </li>
                        <li><a href="<?=\detemiro\themes\get_link('logout');?>">
                                <i class="material-icons">power_settings_new</i> Выход</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <nav>
        <?php detemiro\themes\navigation(2); ?>
    </nav>
</div>
<header id="top-header">
    <div class="top-header-title">
        <div class="sidebar-menu">
            <span><i class="material-icons">menu</i></span>
        </div>
        <h2><?=detemiro::router()->getPageTitle(); ?></h2>
    </div>
    <?php if(detemiro::user()->checkRules('admin,moderate-core')): ?>
    <div class="top-header-more">
        <div class="dropdown">
            <span class="dropdown-toggle" id="top-more" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">more_vert</i>
            </span>
            <ul class="dropdown-menu" aria-labelledby="top-more">
                <li><a href="https://github.com/RuBAN-GT/detemiro/wiki" target="_blank">
                    <i class="material-icons">live_help</i> Помощь</a>
                </li>
                <li><a href="<?=\detemiro\themes\get_link('detemiro');?>">
                    <i class="material-icons">developer_board</i> О Detemiro</a>
                </li>
            </ul>
        </div>
    </div>
    <?php endif; ?>
</header>
<main id="container">
    <?php detemiro\themes\breads(); ?>

    <div class="content">
        <div id="messages"><?php detemiro::actions()->makeZone('theme.messages'); ?></div>

        <?php detemiro::actions()->makeZone('theme.before.content'); ?>