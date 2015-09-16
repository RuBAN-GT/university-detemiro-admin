<?php detemiro::theme()->incFile('header.php'); ?>

<div class="panel panel-default">
    <div class="panel-heading">Консоль</div>
    <div class="panel-body">
        <form method="POST">
            <div class="row">
                <div class="col-sm-6<?=($det_form->check('command') === false) ? ' has-error':'';?>">
                    <div class="form-group">
                        <label>Команда</label>
                        <textarea
                            name="command"
                            class="form-control"
                            rows="10"
                            autofocus
                            placeholder="введите команду"
                            required
                        ><?php $det_form->printValue('command'); ?></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Результат</label>
                        <textarea class="form-control" rows="10" readonly><?php
                            if($det_form->getValue('result') !== false) $det_form->printValue('result');
                        ?></textarea>
                    </div>
                </div>
            </div>
            <p class="help-block">
                <i class="material-icons">info</i> Теги &lt;? ?&gt; вводить не нужно.
            </p>
            <p class="help-block">
                <i class="material-icons">info</i> Критические ошибки не обрабатываются.
            </p>
            <br />
            <div class="btn-group-responsive">
                <button class="btn btn-primary btn-block btn-lg"><span class="md md-flash-on"></span> Выполнить</button>
            </div>
        </form>
    </div>
</div>

<?php detemiro::theme()->incFile('footer.php'); ?>