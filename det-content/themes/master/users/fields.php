<?php detemiro::theme()->incFile('header.php'); ?>

<div class="btn-group-responsive">
    <div class="form-group">
        <a href="<?=\detemiro\themes\get_link('users/fields/edit'); ?>" class="btn btn-primary">
            Добавить <i class="material-icons">add_circle_outline</i>
        </a>
    </div>
</div>

<?php if($det_main): ?>
    <div class="panel panel-default">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th width="200px">Код</th>
                        <th width="100px">Порядок</th>
                        <th width="160px">Тип</th>
                        <th>Название</th>
                        <th>Описание</th>
                        <th class="text-center" width="120px">Действие</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($det_main as $field): ?>
                        <tr>
                            <td><?=$field['name']; ?></td>
                            <td><?=$field['priority']; ?></td>
                            <td><?=$field['type']; ?></td>
                            <td><?=$field['title']; ?></td>
                            <td><?=$field['info']; ?></td>
                            <td align="center">
                                <a href="<?=\detemiro\themes\get_link('users/fields/edit', array('current' => $field['name'])); ?>" class="btn btn-warning btn-sm btn-icon" title="Изменить"><i class="material-icons">edit</i></a>
                                <a data-window="confirm" href="<?=\detemiro\themes\get_link('users/fields/edit', array('current' => $field['name'], 'delete' => true)); ?>" class="btn btn-danger btn-sm btn-icon" title="Удалить"><i class="material-icons">delete</i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Код</th>
                        <th>Порядок</th>
                        <th>Тип</th>
                        <th>Название</th>
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
        <p>Это грустно, но это позволяет вам стать первым человеком, который добавил поле пользователя в эту систему!</p>
    </div>
<?php endif; ?>

<?php detemiro::theme()->incFile('footer.php'); ?>