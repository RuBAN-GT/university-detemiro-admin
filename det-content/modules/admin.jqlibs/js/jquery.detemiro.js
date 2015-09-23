(function($) {
    $.detemiro = {
        /**
         * Ссылка на API-обработчик
         *
         * @type {String}
         */
        API: '',
        /**
         * Проверка данных на возможность кодирования в JSON и преобразование их в строку
         *
         * @param  {mixed}       data
         *
         * @return {string|bool}
         */
        checkedToJSON: function(data) {
            try {
                return JSON.stringify(data);
            }
            catch(error) {
                console.error(error);

                return null;
            }
        },
        /**
         * Проверка, является ли аргумент JSON-строкой
         *
         * @param  {mixed} data
         *
         * @return {bool}
         */
        isJSON: function(data) {
            var res = true;

            try {
                var sth = $.parseJSON(data);
            }
            catch(error) {
                res = false;
            }

            return res;
        },
        /**
         * Вызов экшена
         *
         * @param  {string}   name            Код экшена
         * @param  {mixed}    params          Параметры экшена
         * @param  {string}   url             Ссылка на обработчик
         * @param  {resource} callbackBefore  Функция, вызываемая перед запросом к серверу
         * @param  {resource} callbackSuccess Функция, срабатываемая при ответа сервера
         *
         * @return {void}
         */
        makeAction: function(name, params, url, callbackBefore, callbackSuccess, callbackError) {
            if(typeof(url) == 'undefined' || url == '' || url == null) {
                if($.detemiro.API != '') {
                    url = $.detemiro.API;
                }
                else {
                    $.error('Невозможно вызвать обработчик, т.к. неверно указана на него ссылка.');
                }
            }
            if(name == '' || typeof(name) != 'string') {
                $.error('Неверное имя экшена.');
            }

            var data = {
                action: name
            };
            if(typeof(params) == 'object' || typeof(params) == 'array') {
                data.params = $.detemiro.checkedToJSON(params);
            }
            else if(typeof(params) != 'undefined') {
                data.params = params;
            }

            $.ajax({
                type      : 'POST',
                url       : url,
                data      : data,
                beforeSend: function() {
                    if($.isFunction(callbackBefore)) {
                        callbackBefore();
                    }
                },
                error     : function() {
                    if($.isFunction(callbackError)) {
                        callbackError();
                    }
                },
                success   : function(result) {
                    if($.isFunction(callbackSuccess)) {
                        callbackSuccess(result);
                    }
                }
            });
        }
    };
})(jQuery);