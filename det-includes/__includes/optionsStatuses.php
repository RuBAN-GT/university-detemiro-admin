<?php
    namespace detemiro\space;

    class optionsStatuses implements \detemiro\modules\iStatuses {
        /**
         * Статусы модулей
         *
         * @var array $content
         */
        protected $content = array();

        public function __construct() {
            if($list = \detemiro::options()->get(array(
                'cols'  => 'code,value',
                'limit' => 100,
                'cond'  => array(
                    'param' => 'family',
                    'value' => 'modulesStatuses.' . \detemiro::space()->code
                )
            )))
            {
                foreach($list as $item) {
                    $content[$item['code']] = $item['value'];
                }
            }
        }

        public function get($code) {
            if(is_string($code) && isset($this->content[$code])) {
                return $this->content[$code];
            }
            else {
                $value = \detemiro::options()->getValue(array('modulesStatuses.' . \detemiro::space()->code, $code));

                if($value !== null) {
                    $this->content[$code] = $value;
                }

                return $value;
            }
        }

        public function set($code, $status) {
            $status = (int) $status;

            if(\detemiro::options()->set(array('modulesStatuses.' . \detemiro::space()->code, $code), $status)) {
                $this->content[$code] = $status;

                return true;
            }
            else {
                return false;
            }
        }

        public function remove($code) {
            if(is_string($code) && isset($this->content[$code])) {
                unset($this->content[$code]);

                \detemiro::options()->deleteItem(array('modulesStatuses.' . \detemiro::space()->code, $code));

                return true;
            }
            else {
                return false;
            }
        }
    }
?>