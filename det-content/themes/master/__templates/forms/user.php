<div class="form-group<?=$det_class;?><?=($det_ignore) ? ' disabled' : '';?>">
    <?php if($det_title): ?>
        <?php if($det_reader): ?>
            <label for="form-<?=$det_name;?>" class="sr-only control-label"><?=$det_title;?></label>
        <?php else: ?>
            <label for="form-<?=$det_name;?>" class="col-lg-2 control-label"><?=$det_title;?></label>
            <div class="col-lg-10">
        <?php endif; ?>
    <?php endif;?>

        <select
            class="form-control"
            id="form-<?=$det_name;?>"
            name="<?=$det_name;?>"
            <?=($det_require) ? 'required' : '';?>
            <?=($det_ignore) ? 'disabled' : '';?>
        >
        <?php foreach($det_all as $user):?>
            <option value="<?=$user['id'];?>"<?=($user['id'] == $det_value) ? ' selected' : ''?>><?=$user['login'];?></option>
        <?php endforeach; ?>
        </select>

    <?php if($det_title && $det_reader == false): ?>
        </div>
    <?php endif; ?>
</div>