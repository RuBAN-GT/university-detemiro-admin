$(function() {
    /**
     * Сайдбар
     */
    $('#top-header .top-header-title .sidebar-menu span').click(function(e) {
        e.preventDefault();
        e.stopPropagation();

        if($(window).width() > 1080) {
            var send = 0;
            if($('body').hasClass('sidebar-toggled-full')) {
                send = 1;
            }

            $('body').toggleClass('sidebar-toggled-full');
            $.detemiro.makeAction('save-sidebar', send);
        }
        else {
            $('body').toggleClass('sidebar-toggled-mini');
        }
    });
    $(document).on('click', function(e) {
        if(
            $(window).width() <= 1080 &&
            $('body').is('.sidebar-toggled-mini') &&
            $(e.target).closest('#sidebar').length == 0
        )
        {
            $('body').toggleClass('sidebar-toggled-mini');
        }
    });
    $('#sidebar nav li.with-sub > a').click(function(e) {
        e.preventDefault();

        $(this).parent('li').toggleClass('active');
    });

    /**
     * Создание события по выборе файла
     */
    $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');

        input.trigger('file-select', [numFiles, label]);
    });

    /**
     * Фейковое нажатие на кнопку загрузки файла
     */
    $('.btn-file :file').parents('.input-group-file').find(':text').click(function() {
        $(this).parents('.input-group-file').find('.btn-file :file').click();
    });

    /**
     * Вставка данных файла в форму
     */
    $('.btn-file :file').on('file-select', function(event, numFiles, label) {
        var input = $(this).parents('.input-group-file').find(':text'),
            log = numFiles > 1 ? 'выбрано несколько файлов: ' + numFiles : label;

        if(input.length) {
            input.val(log);
        }
    });
});
