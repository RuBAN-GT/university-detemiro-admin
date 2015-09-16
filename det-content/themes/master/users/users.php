<?php
    detemiro::theme()->incFile('header.php');
?>

<div class="btn-group-responsive">
    <div class="form-group">
        <a href="<?=\detemiro\themes\get_link('users/edit'); ?>" class="btn btn-primary">
            Добавить <i class="material-icons">add_circle_outline</i>
        </a>
    </div>
</div>

<?php if($det_main): ?>
    <div class="panel pane-default">
        <div class="table-responsive"><table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th width="50px" class="text-center">#</th>
                    <th width="200px">Логин</th>
                    <th>Регистрация</th>
                    <th>Последний вход</th>
                    <th class="text-center" width="120px">Действие</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($det_main as $user): ?>
                    <tr>
                        <td class="text-center"><?=$user['id']; ?></td>
                        <td><?=$user['login']; ?></td>
                        <td><?=$user['registration']; ?></td>
                        <td><?=$user['last_login']; ?></td>
                        <td align="center">
                            <a href="<?=\detemiro\themes\get_link('users-edit', array('current' => $user['id'])); ?>" class="btn btn-warning btn-sm btn-icon" title="Изменить"><i class="material-icons">edit</i></a>
                            <a data-window="confirm" href="<?=\detemiro\themes\get_link('users-edit', array('current' => $user['id'], 'delete' => true)); ?>" class="btn btn-danger btn-sm btn-icon" title="Удалить"><i class="material-icons">delete</i></a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
                <tfoot>
                <tr>
                    <th class="text-center">#</th>
                    <th>Логин</th>
                    <th>Регистрация</th>
                    <th>Последний вход</th>
                    <th class="text-center">Действие</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <?php detemiro\themes\pagination($det_total, $det_current); ?>
<?php else: ?>
    <div class="well">
        <p>Нет данных.</p>
        <p>Это грустно, но это позволяет вам стать первым человеком, который добавил пользователя в эту систему!</p>
    </div>
<?php endif; ?>

<?php
    detemiro::theme()->incFile('footer.php');
?>