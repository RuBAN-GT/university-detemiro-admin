<?php if($det_all): ?>
    <div class="table-responsive<?=($det_ignore) ? ' disabled' : '';?>"><table class="table table-striped table-hover table-bordered">
        <thead>
            <tr<?=($det_class) ? ' class="' . $det_class . '"' : '';?>>
                <th width="30px" class="text-center">#</th>
                <th width="230px">Группа</th>
                <th>Описание</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($det_all as $item): ?>
            <tr>
                <td class="text-center">
                    <input
                        name="<?=$det_name;?>[]"
                        type="checkbox"
                        value="<?=$item['code'];?>"
                        <?=($det_ignore) ? 'disabled' : '';?>
                        <?=(in_array($item['code'], $det_value) ? ' checked' : '');?>
                    >
                </td>
                <td><?=($item['name']) ? $item['name'] : $item['code'];?></td>
                <td><?=$item['info'];?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table></div>
<?php else: ?>
    <div class="well">Система не имеет групп.</div>
<?php endif; ?>