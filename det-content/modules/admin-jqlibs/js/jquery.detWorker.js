(function($) {
    /**
     * detWorker
     * 
     * Плагин объекта для работы с экшенами Detemiro
     * 
     * **Опции**
     *
     * Параметр     | Тип      | Описание
     * ------------ | -------- | ---------
     * action       | string   | код экшена в detemiro
     * code         | string   | код текущего обработчика
     * preAction    | resource | функция (callback), срабатываемая перед вызовом экшена
     * postAction   | resource | функция (callback), срабатываемая после вызова экшена
     * customAPI    | string   | ссылка на API-обработчик, к которому будет посылаться AJAX-запрос
     */
    jQuery.fn.detWorker = function(options) {
        options = $.extend({
            action    : '',
            code      : '',
            preAction : null,
            postAction: null,
            customAPI : ''
        }, options);

        var doit = function() {
            /**
             * Объект, передаваемый остальным обработчикам
             */
            var data = {
                options: options,
                params : null,
                result : null,
                object : this
            };

            /**
             * Вызор предобработчиков:
             * * Общие событие detWorker.preAction
             * * Специальное событие detWorker.preAction.{код обработчика}
             * * Функция, указанная в опциях preAction
             */
            $(this).trigger('detWoker.preAction', data);
            if(options.code) {
                $(this).trigger('detWoker.preAction.' + options.code, data);
            }
            if($.isFunction(options.preAction)) {
                options.preAction(data);
            }

            /**
             * AJAX-вызов экшена
             */
            $.detemiro.makeAction(options.action, data.params, options.customAPI, function() {
                $(data.object).trigger('detWorker.actionBeforeSend');
                if(options.code) {
                    $(data.object).trigger('detWorker.actionBeforeSend.' + options.code, data);
                }
            }, function(result) {
                /**
                 * Конвертация результата из JSON, если он таковой
                 */
                if(result && $.detemiro.isJSON(result)) {
                    result = $.parseJSON(result);
                }

                /**
                 * Создание поле result для data
                 */
                data.result = result;

                /**
                 * Вызор постобработчиков:
                 * * Общие событие detWorker.postAction
                 * * Специальное событие detWorker.postAction.{код обработчика}
                 * * Функция, указанная в опциях postAction
                 */
                $(this).trigger('detWoker.postAction', data);
                if(options.code) {
                    $(this).trigger('detWoker.postAction.' + options.code, data);
                }
                if($.isFunction(options.postAction)) {
                    options.postAction(data);
                }
            });
        };

        return this.each(doit); 
    };
})(jQuery);