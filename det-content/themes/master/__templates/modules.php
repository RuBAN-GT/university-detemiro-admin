<?php
    if(isset($det_class) == false) {
        $det_class = '';
    }
    else {
        $det_class = ' class="' . $det_class . '"';
    }
?>

<div class="panel panel-default">
    <div class="table-responsive">
        <table class="table table-striped table-hover" width="100%">
            <thead><tr>
                <th width="15%">Код</th>
                <th width="13%">Автор</th>
                <th width="70px">Версия</th>
                <th>Описание</th>
                <th class="text-center" width="120px">Управление</th>
            </tr></thead>
            <tbody>
            <?php
                foreach($det_content as $key=>$item):
            ?>
            <tr<?=$det_class; ?>>
                <td><?=$item->code; ?></td>
                <td><?=$item->author; ?></td>
                <td><?=$item->version; ?></td>
                <td><?=$item->info; ?></td>
                <td class="text-center">
                    <?php if($item->status < 2): ?>
                        <a href="<?=\detemiro\themes\get_link('modules', array('code' => $item->code, 'operation' => 'activate')); ?>" class="btn btn-success btn-icon btn-sm" title="Активировать"><i class="material-icons">add_circle_outline</i></a>
                    <?php endif; ?>
                    <?php if($item->status == 2): ?>
                        <a href="<?=\detemiro\themes\get_link('modules', array('code' => $item->code, 'operation' => 'deactivate')); ?>" class="btn btn-warning btn-icon btn-sm" title="Деактивировать"><i class="material-icons">power_settings_new</i></a>
                    <?php endif; ?>
                    <?php if($item->status >= 1): ?>
                        <a href="<?=\detemiro\themes\get_link('modules', array('code' => $item->code, 'operation' => 'uninstall')); ?>" class="btn btn-danger btn-icon btn-sm" title="Удалить"><i class="material-icons">delete</i></a>
                    <?php else: ?>
                        <a href="<?=\detemiro\themes\get_link('modules', array('code' => $item->code, 'operation' => 'install')); ?>" class="btn btn-info btn-icon btn-sm" title="Установить"><i class="material-icons">library_add</i></a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php
                endforeach;
            ?>
            </tbody>
            <tfoot><tr>
                <th>Код</th>
                <th>Автор</th>
                <th>Версия</th>
                <th>Описание</th>
                <th>Управление</th>
            </tr></tfoot>
        </table>
    </div>
</div>