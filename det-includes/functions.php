<?php
    namespace detemiro\space;

    /**
     * Подсчёт параметров пейджинации
     *
     * @param int $count
     * @param int $limit
     *
     * @return array
     */
    function pagination_calc($count, $limit = 10, $current = null) {
        $total = ceil($count / $limit);

        if($current == null) {
            $current = (isset($_GET['current'])) ? $_GET['current'] : 1;
        }
        if(is_numeric($current) == false || $current <= 0 || $current > $total) {
            $current = 1;
        }

        return array(
            'limit'   => $limit,
            'total'   => $total,
            'current' => $current,
            'offset'  => ($current - 1) * $limit
        );
    }
?>