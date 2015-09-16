<div class="form-group<?=$det_class;?><?=($det_ignore) ? ' disabled' : '';?>">
    <?php if($det_title): ?>
        <?php if($det_reader): ?>
            <label for="form-<?=$det_name;?>" class="sr-only control-label"><?=$det_title;?></label>
        <?php else: ?>
            <label for="form-<?=$det_name;?>" class="col-lg-2 control-label"><?=$det_title;?></label>
            <div class="col-lg-10">
        <?php endif; ?>
    <?php endif;?>

        <div class="radio">
            <label class="radio-inline">
                <input
                    type="radio"
                    id="form-<?=$det_name;?>"
                    name="<?=$det_name;?>"
                    placeholder="<?=$det_place;?>"
                    value="1"
                    <?=($det_ignore) ? 'disabled' : '';?>
                    <?=($det_require) ? 'required' : '';?>
                    <?=($det_value == true) ? 'checked' : '';?>
                    />
                Да
            </label>
            <label class="radio-inline">
                <input
                    type="radio"
                    id="form-<?=$det_name;?>"
                    name="<?=$det_name;?>"
                    placeholder="<?=$det_place;?>"
                    value="0"
                    <?=($det_value == false) ? 'checked' : '';?>
                    />
                Нет
            </label>
        </div>
        
    <?php if($det_title && $det_reader == false): ?>
        </div>
    <?php endif; ?>
</div>