<?php
    $det_title = ($det_title) ? $det_title : 'Пароль';
    $det_place = ($det_place) ? $det_place : '****';
?>

<div class="form-group<?=$det_class;?><?=($det_ignore) ? ' disabled' : '';?>">
    <?php if($det_title): ?>
        <?php if($det_reader): ?>
            <label for="form-<?=$det_name;?>" class="sr-only control-label"><?=$det_title;?></label>
        <?php else: ?>
            <label for="form-<?=$det_name;?>" class="col-lg-2 control-label"><?=$det_title;?></label>
            <div class="col-lg-10">
        <?php endif; ?>
    <?php endif;?>

        <input
            type="password"
            id="form-<?=$det_name;?>"
            class="form-control"
            name="<?=$det_name;?>"
            placeholder="<?=$det_place;?>"
            value=""
            <?=($det_ignore) ? 'disabled' : '';?>
            <?=($det_require) ? 'required' : '';?>
            />

    <?php if($det_title && $det_reader == false): ?>
        </div>
    <?php endif; ?>
</div>