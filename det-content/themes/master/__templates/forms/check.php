<div class="form-group<?=$det_class;?><?=($det_ignore) ? ' disabled' : '';?>">
    <div class="checkbox">
        <label>
            <input
                type="checkbox"
                id="form-<?=$det_name;?>"
                name="<?=$det_name;?>"
                <?=($det_ignore) ? 'disabled' : '';?>
                <?=($det_require) ? 'required' : '';?>
                value="1"
            > <?=$det_title;?>
            <?=($det_place) ? "($det_place)" : ''; ?>
        </label>
    </div>
</div>