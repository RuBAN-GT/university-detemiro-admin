<div class="panel panel-default">
    <div class="panel-heading">Группа</div>
    <div class="panel-body">
        <form method="POST" class="form-horizontal">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab-main" data-toggle="tab">Основное</a></li>
                <li><a href="#tab-rules" data-toggle="tab">Права</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab-main">
                    <fieldset>
                        <?php $det_form->printInputList('!rules'); ?>
                    </fieldset>
                </div>
                <div class="tab-pane" id="tab-rules">
                    <fieldset>
                        <?php $det_form->printInput('rules'); ?>
                    </fieldset>
                </div>
            </div>
            <div class="col-lg-10 col-lg-offset-2 btn-group-responsive">
                <button class="btn btn-primary">Сохранить</button>
                <a href="<?=\detemiro\themes\get_link('settings/groups'); ?>" class="btn btn-default">Отмена</a>
                <?php if($det_form->getValue('type') == 'update'): ?>
                    <button data-window="confirm" name="delete" class="btn btn-danger pull-right">Удалить <i class="material-icons">delete</i></button>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>