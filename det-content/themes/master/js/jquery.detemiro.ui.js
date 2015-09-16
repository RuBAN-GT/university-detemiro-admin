(function($) {
    $.detemiro = $.extend({ui: {
        /**
         * Добавление сообщения
         *
         * @param  {string} title
         * @param  {string} text
         * @param  {string} status Статус сообщения (success, error, warning, info)
         * @param  {mixed}  block  Блок с сообщениями
         * @param  {number} hide   Время жизни сообщения
         *
         * @return {bool}
         */
        pushMessage: function(title, text, status, block, hide) {
            block = block || '#messages';
            hide  = (typeof(hide) != 'undefined') ? hide : 5000;

            var last = $(block).find('.generated-message:last-of-type').data('generate-number');

            if(typeof(last) == 'undefined') {
                last = 0;
            }
            else {
                last++;
            }

            var res  = '<div style="display: none;" data-generate-number="' + last + '" class="generated-message alert alert-' + status + ' alert-dismissible" role="alert">';
            res += '<button type="button" class="close" data-dismiss="alert" aria-label="Закрыть"><span aria-hidden="true"><i class="md md-close"></i></span></button>';
            res += '<h4>' + title + '</h4>';
            res += '<p>'  + text  + '</p>';
            res += '</div>';

            $(block).append(res);

            $(block).find('[data-generate-number="' + last + '"]').fadeIn(500);

            if(hide) setTimeout(function() {
                $(block).find('[data-generate-number="' + last + '"]').fadeOut(500, function() {
                    $(this).remove();
                });
            }, hide);
        },
        startAnimation: function(time, callbackStart, callbackFinal) {
            $('body').data('theme-loading', true).append('<span style="display: none;" id="theme-loader"></span>');
            $('#theme-loader').fadeIn(500);

            $('body').trigger('detemiro.ui.startAnimation');
            if($.isFunction(callbackStart)) {
                callbackStart();
            };

            if(typeof(time) == 'number') {
                setTimeout($.detemiro.ui.stopAnimation(callbackFinal), time);
            }
        },
        stopAnimation: function(callback) {
            $('body').data('theme-loading', false);

            $('body').find('#theme-loader').fadeOut(500, function() {
                $(this).remove();

                $('body').trigger('detemiro.ui.stopAnimation');
                if($.isFunction(callback)) {
                    callback();
                };
            });
        }
    }}, $.detemiro);

    /**
     * Модальное окно подтверждения
     */
    $('[data-window="confirm"]').click(function(e) {
        e.preventDefault();

        var object = this;

        if($(this).data('modalID')) {
            var modalID = $(this).data('modalID');
        }
        else {
            var modalID = '#modal-confirm';
        }

        if($(modalID).length) {
            $(modalID).modal();
        }
        else {
            var title = $(this).data('modal-title') || '';
            var text  = $(this).data('modal-text')  || '';

            $.detemiro.makeAction('modal-confirm', {
                'title' : title,
                'text'  : text
            }, null, null, function(data) {
                if(data) {
                    $('body').append(data);
                    $(modalID).modal();
                }
            });
        }

        $('body').on('click', '#modal-confirm-ok', function() {
            $(modalID).modal('hide');

            $(modalID).on('hidden.bs.modal', function() {
                if(typeof(object.href) != 'undefined') {
                    window.location = object.href;
                }
                else if($(object).is('button')) {
                    var item = $('<input type="hidden" />');
                    item.attr('name', $(object).attr('name'));
                    item.val($(object).val());

                    $(object).after(item);

                    $(object).parents('form').submit();
                }

                return false;
            })
        });
    });
})(jQuery);