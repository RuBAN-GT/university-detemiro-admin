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

<div class="panel panel-default">
    <div class="panel-heading">Системные сообщения</div>
    <?php
        if($det_messages):

        $class = array(
            1 => 'danger',
            2 => 'warning',
            3 => 'success',
            4 => 'info'
        );
    ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover" width="100%">
                <thead>
                    <th width="200px">Время</th>
                    <th width="200px">Заголовок</th>
                    <th>Сообщение</th>
                </thead>
                <tbody>
                    <?php foreach($det_messages as $item): ?>
                        <tr class="<?=$class[$item->status];?>">
                            <td><?=date('Y-m-d H:i:s', strtotime($item->date));?></td>
                            <td><?=$item->title;?></td>
                            <td><?=$item->text;?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <th>Время</th>
                    <th>Заголовок</th>
                    <th>Сообщение</th>
                </tfoot>
            </table>
        </div>
    <?php else: ?>
        <div class="panel-body">
            Detemiro не содержит системных сообщений на данный момент.
        </div>
    <?php endif; ?>
</div>

<div class="panel panel-primary">
    <div class="panel-heading">Задачи</div>
    <?php if($det_issues): ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover" width="100%">
                <thead>
                    <th width="50px" class="text-center">#</th>
                    <th>Название</th>
                    <th>Краткое описание</th>
                </thead>
                <tbody>
                <?php foreach($det_issues as $item): ?>
                    <tr>
                        <td class="text-center"><?=$item['number']; ?></td>
                        <td><a target="_blank" href="<?=$item['html_url']; ?>"><?=$item['title']; ?></a></td>
                        <td><?=$item['body']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <th class="text-center">#</th>
                    <th>Название</th>
                    <th>Краткое описание</th>
                </tfoot>
            </table>
        </div>
    <?php else: ?>
        <div class="panel-body">
            Разработчики Detemiro не имеют важных задач.
        </div>
    <?php endif; ?>
</div>