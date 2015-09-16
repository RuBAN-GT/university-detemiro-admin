<div class="panel panel-default">
    <div class="panel-heading">Поля профиля</div>
    <div class="table-responsive"><table class="table table-striped table-hover">
        <?php foreach($det_form->all() as $item): ?>
            <tr>
                <td width="200px"><?=($item->title) ? $item->title : $item->name;?></td>
                <td><?php $item->printValue();?></td>
            </tr>
        <?php endforeach; ?>
    </table></div>
</div>