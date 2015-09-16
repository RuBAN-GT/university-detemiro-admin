<?php detemiro::actions()->makeZone('theme.after.content'); ?>

</div>
</main>

<script src="<?=detemiro::theme()->getFileLink('js/jquery.min.js'); ?>"></script>
<script src="<?=detemiro::theme()->getFileLink('js/bootstrap.min.js'); ?>"></script>
<script src="<?=detemiro::theme()->getFileLink('js/flexie.min.js'); ?>"></script>

<?php detemiro::actions()->makeZone('theme.footer'); ?>

<script src="<?=detemiro::theme()->getFileLink('js/jquery.detemiro.ui.js'); ?>"></script>
<script src="<?=detemiro::theme()->getFileLink('js/dashboard.js'); ?>"></script>

</body>
</html>