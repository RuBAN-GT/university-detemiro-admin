<div class="panel panel-default">
    <div class="panel-heading">Право</div>
    <div class="panel-body">
        <form method="POST" class="form-horizontal">
            <fieldset>
                <?php $det_form->printInputList(); ?>
            </fieldset>
            <div class="col-lg-10 col-lg-offset-2 btn-group-responsive">
                <button class="btn btn-primary">Сохранить</button>
                <a href="<?=\detemiro\themes\get_link('settings/rules'); ?>" class="btn btn-default">Отмена</a>
                <?php if($det_form->getValue('type') == 'update'): ?>
                    <button data-window="confirm" name="delete" class="btn btn-danger pull-right">Удалить <i class="material-icons">delete</i></button>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>