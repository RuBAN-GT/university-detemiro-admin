<div class="modal fade" id="modal-confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><?=$det_title; ?></h4>
        </div>
        <div class="modal-body">
            <?=$det_text; ?>
        </div>
        <div class="modal-footer">
            <button id="modal-confirm-cansel" type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
            <button id="modal-confirm-ok" type="button" class="btn btn-primary">Хорошо</button>
        </div>
        </div>
    </div>
</div>