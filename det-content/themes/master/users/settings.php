<div class="panel panel-default">
    <div class="panel-heading">Личные данные</div>
    <div class="panel-body">
        <form method="POST" class="form-horizontal">
            <fieldset>
                <legend>Профиль</legend>
                <?php $det_form->printInput('login'); ?>
            </fieldset>
            <fieldset>
                <legend>Смена пароля</legend>
                <?php $det_form->printInputList('actual,password'); ?>
            </fieldset>

            <?php detemiro::actions()->makeZone('theme.form.users-settings'); ?>

            <div class="col-lg-10 col-lg-offset-2 btn-group-responsive">
                <button class="btn btn-primary">Обновить</button>
            </div>
        </form>
    </div>
</div>