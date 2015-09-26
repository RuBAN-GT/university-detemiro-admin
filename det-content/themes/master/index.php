<div class="panel panel-default">
    <div class="panel-body">
        <form method="POST">
            <div class="form-group">
                <textarea
                    name="note"
                    class="form-control"
                    placeholder="Введите заметку"
                    rows="4"
                ><?=$det_note;?></textarea>
            </div>
            <div class="btn-group-responsive">
                <button class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
</div>

<?php detemiro::pages()->show('detemiro'); ?>