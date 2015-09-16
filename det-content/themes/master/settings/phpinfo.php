<?php detemiro::theme()->incFile('header.php'); ?>

<div class="form-group">
    <a href="<?=\detemiro\themes\get_link('settings/php-info-clear'); ?>" class="btn btn-info" target="_blank">
        Перейти к полному просмотру <i class="material-icons">search</i>
    </a>
</div>

<iframe
    src="<?=\detemiro\themes\get_link('settings/php-info-clear'); ?>"
    width="100%"
    height="500px"
    ></iframe>

<?php detemiro::theme()->incFile('footer.php'); ?>