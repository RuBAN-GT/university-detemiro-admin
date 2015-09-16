<?php
    detemiro::theme()->incFile('header.php');
?>

<div role="tabpanel">
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#modules-all" role="tab" data-toggle="tab" aria-controls="modules-all">Все модули</a></li>
        <li><a href="#modules-activated" role="tab" data-toggle="tab" aria-controls="modules-activated">Активированные</a></li>
        <li><a href="#modules-required" role="tab" data-toggle="tab" aria-controls="modules-required">Обязательные</a></li>
        <li><a href="#modules-added" role="tab" data-toggle="tab" aria-controls="modules-added">Дополнительные</a></li>
        <li><a href="#modules-installed" role="tab" data-toggle="tab" aria-controls="modules-installed">Установленные</a></li>
        <li><a href="#modules-available" role="tab" data-toggle="tab" aria-controls="modules-available">Доступные</a></li>
    </ul>

    <?php if($det_statuses || $det_modules): ?>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="modules-all">
                <?php if($det_modules): ?>
                    <?php
                        detemiro::theme()->incFile('__templates/modules.php', array(
                            'content' => $det_modules
                        ));
                    ?>
                <?php else: ?>
                    <div class="well">Нет активированных модулей.</div>
                <?php endif; ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="modules-activated">
                <?php if($det_statuses['activated']): ?>
                    <?php
                        detemiro::theme()->incFile('__templates/modules.php', array(
                            'content' => $det_statuses['activated'],
                            'class'   => 'success'
                        ));
                    ?>
                <?php else: ?>
                    <div class="well">Нет активированных модулей.</div>
                <?php endif; ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="modules-required">
                <?php if($det_statuses['required']): ?>
                    <?php
                        detemiro::theme()->incFile('__templates/modules.php', array(
                            'content' => $det_statuses['required'],
                            'class'   => 'warning'
                        ));
                    ?>
                <?php else: ?>
                    <div class="well">Система не требует каких-либо модулей.</div>
                <?php endif; ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="modules-added">
                <?php if($det_statuses['added']): ?>
                    <?php
                        detemiro::theme()->incFile('__templates/modules.php', array(
                            'content' => $det_statuses['added'],
                            'class'   => 'info'
                        ));
                    ?>
                <?php else: ?>
                    <div class="well">Система не добавила каких-либо модулей.</div>
                <?php endif; ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="modules-installed">
                <?php if($det_statuses['installed']): ?>
                    <?php
                        detemiro::theme()->incFile('__templates/modules.php', array(
                            'content' => $det_statuses['installed'],
                            'class'   => 'info'
                        ));
                    ?>
                <?php else: ?>
                    <div class="well">Нет установленных модулей.</div>
                <?php endif; ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="modules-available">
                <?php if($det_statuses['other']): ?>
                    <?php
                        detemiro::theme()->incFile('__templates/modules.php', array(
                            'content' => $det_statuses['other']
                        ));
                    ?>
                <?php else: ?>
                    <div class="well">Нет дополнительных модулей.</div>
                <?php endif; ?>
            </div>
        </div>
    <?php else: ?>
        <div class="well">Нет модулей в системе!</div>
    <?php endif; ?>
</div>

<?php
    detemiro::theme()->incFile('footer.php');
?>