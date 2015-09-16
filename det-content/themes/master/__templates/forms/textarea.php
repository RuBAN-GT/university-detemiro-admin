<div class="form-group<?=$det_class;?><?=($det_ignore) ? ' disabled' : '';?>">
    <?php if($det_title): ?>
        <?php if($det_reader): ?>
            <label for="form-<?=$det_name;?>" class="sr-only control-label"><?=$det_title;?></label>
        <?php else: ?>
            <label for="form-<?=$det_name;?>" class="col-lg-2 control-label"><?=$det_title;?></label>
            <div class="col-lg-10">
        <?php endif; ?>
    <?php endif;?>

        <textarea
            id="form-<?=$det_name;?>"
            class="form-control"
            name="<?=$det_name;?>"
            rows="4"
            placeholder="<?=$det_place;?>"
            <?=($det_require) ? 'required' : '';?>
            <?=($det_length) ? 'maxlength="' . $det_length . '"' : '';?>
            <?=($det_ignore) ? 'disabled' : '';?>
        ><?=$det_value;?></textarea>

    <?php if($det_title && $det_reader == false): ?>
        </div>
    <?php endif; ?>
</div>