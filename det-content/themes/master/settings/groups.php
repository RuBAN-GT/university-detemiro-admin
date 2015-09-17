<div class="btn-group-responsive">
    <div class="form-group">
        <a href="<?=\detemiro\themes\get_link('settings/groups/edit'); ?>" class="btn btn-primary">
            Добавить <i class="material-icons">add_circle_outline</i>
        </a>
    </div>
</div>

<?php if($det_main): ?>
    <div class="panel panel-default">
        <div class="table-responsive"><table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th width="240px">Код</th>
                    <th width="240px">Имя</th>
                    <th>Описание</th>
                    <th class="text-center" width="120px">Действие</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($det_main as $group): ?>
                    <tr>
                        <td><?=$group['code']; ?></td>
                        <td><?=$group['name']; ?></td>
                        <td><?=$group['info']; ?></td>
                        <td align="center">
                            <a href="<?=\detemiro\themes\get_link('settings/groups/edit', array('current' => $group['code'])); ?>" class="btn btn-warning btn-sm btn-icon" title="Изменить"><i class="material-icons">edit</i></a>
                            <a data-window="confirm" href="<?=\detemiro\themes\get_link('settings/groups/edit', array('current' => $group['code'], 'delete' => true)); ?>" class="btn btn-danger btn-sm btn-icon" title="Удалить"><i class="material-icons">delete</i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>Код</th>
                    <th>Имя</th>
                    <th>Описание</th>
                    <th  class="text-center">Действие</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <?php detemiro\themes\pagination($det_total, $det_current); ?>
<?php else: ?>
    <div class="well">
        <p>Нет данных.</p>
        <p>Это грустно, но это позволяет вам стать первым человеком, который добавил группу в эту систему!</p>
    </div>
<?php endif; ?>