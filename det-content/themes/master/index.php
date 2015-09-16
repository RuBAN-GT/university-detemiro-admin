<?php
    detemiro::theme()->incFile('header.php');
?>

<div class="panel panel-default">
    <div class="panel-body">
        <form method="POST">
            <div class="form-group">
                <textarea
                    name="note"
                    class="form-control"
                    placeholder="Введите заметку"
                    rows="4"
                ><?=$det_note;?></textarea>
            </div>
            <div class="btn-group-responsive">
                <button class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
</div>
<?php if(detemiro::user()->checkRules('admin,moderate-core')): ?>
<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Общие характеристики</div>
            <div class="table-responsive">
                <table class="table table-striped table-hover" width="100%">
                    <tr>
                        <td width="220px">Имя движка</td>
                        <td><?=detemiro::name();?></td>
                    </tr>
                    <tr>
                        <td>Версия движка</td>
                        <td><?=detemiro::version();?></td>
                    </tr>
                    <tr>
                        <td>Название версии</td>
                        <td><?=detemiro::nick();?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-info">
            <div class="panel-heading">Полезные ссылки</div>
            <ul class="list-group">
                <a href="https://github.com/RuBAN-GT/detemiro" target="_blank" class="list-group-item">
                    <i class="material-icons">developer_board</i> Репозиторий
                </a>
                <a href="https://docs.detemiro.org/api/" target="_blank" class="list-group-item">
                    <i class="material-icons">help</i> API
                </a>
            </ul>
        </div>
    </div>
</div>
<?php endif; ?>

<?php
    detemiro::theme()->incFile('footer.php');
?>