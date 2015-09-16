<?php
    namespace detemiro\themes;

    /**
     * Проверка сайдбара
     */
    function check_sidebar() {
        $prop = \detemiro::user()->props()->get('theme', 'sidebar');

        if($prop === 0 || $prop === '0') {
            $sidebar = ' class="sidebar-toggled-full"';
        }
        else {
            $sidebar = '';
        }

        echo $sidebar;
    }

    /**
     * Вывод фонового изображения
     */
    function profile_bg() {
        echo '<img src="' . \detemiro::theme()->getFileLink('images/bg.jpg') . '" alt="Фоновое изображение" />';
    }

    /**
     * Отображение аватара
     */
    function avatar() {
        $src = \detemiro::theme()->getFileLink('images/avatar.png');

        if(\detemiro::user()->fields()) {
            if($try = \detemiro::user()->fields()->mail) {
                $try = md5($try);
                $src = addslashes($src);

                $src = "//www.gravatar.com/avatar/$try?s=55&d=$src";
            }
        }

        echo '<img src="' . $src . '" alt="Аватар">';
    }

    /**
     * Получение имени пользователя
     *
     * @return string
     */
    function get_name() {
        $name = \detemiro::user()->login;

        if(\detemiro::user()->fields()) {
            if($try = \detemiro::user()->fields()->name) {
                $name = $try;
            }
        }

        return $name;
    }

    /**
     * Крошки
     */
    function breads() {
        $current = $first = \detemiro::router()->page;

        if($current !== 'index') {
            $breads = array();

            while($tmp = \detemiro::pages()->get($current)) {
                $breads[] = $tmp;

                if($tmp->parent) {
                    $current = $tmp->parent;
                }
                else {
                    break;
                }
            }

            if($breads) {
                $breads[] = \detemiro::pages()->get('index');
                $breads   = array_reverse($breads);

                echo '<div class="breadcrumbs"><ol>';

                foreach($breads as $tmp) {
                    $title = ($tmp->title) ? $tmp->title : 'Страница';

                    if($first == $tmp->key) {
                        echo "<li>$title</li>";
                    }
                    else {
                        echo '<li><a href="' .
                            get_link($tmp->key) .
                            '">' . $title . '</a></li>';
                    }
                }

                echo '</ol></div>';
            }
        }
    }

    /**
     * Генерация пейджинации
     *
     * @param int  $total   Общее число страниц
     * @param null $current Выбранная страница
     */
    function pagination($total, $current = null) {
        if($total) {
            if($total <= 1) {
                return;
            }

            if($current > $total || $current < 0) {
                $current = $total;
            }
            elseif($current == null) {
                $current = 1;
            }

            echo '<ul class="pagination">';

            //Кнопка назад
            if($current !== null) {
                if($current == 1) {
                    $tmp = 1;

                    echo '<li class="disabled">';
                }
                else {
                    $tmp = $current - 1;

                    echo '<li>';
                }

                echo '<a href="' . get_link(null, array('current' => $tmp)) . '">' .
                     '<i class="material-icons">keyboard_arrow_left</i>' .
                     '</a></li>';
            }

            //Ссылки
            $min  = $current - 3;
            $max  = $current + 3;
            $last = null;
            for($page = 1; $page <= $total; $page++) {
                if(($page > $min && $page < $max) || $page < 2 || $page > ($total - 1)) {
                    if($last && $last + 1 != $page) {
                        echo '<li><span>...</span></li>';
                    }

                    if($page == $current) {
                        echo '<li class="active">';
                    }
                    else {
                        echo '<li>';
                    }

                    echo '<a href="' . get_link(null, array('current' => $page)) . '">' . $page . '</a></li>';

                    $last = $page;
                }
            }

            //Кнопка далее
            if($current !== null) {
                if($current == $total) {
                    $tmp = $total;

                    echo '<li class="disabled">';
                }
                else {
                    $tmp = $current + 1;

                    echo '<li>';
                }

                echo '<a href="' . get_link(null, array('current' => $tmp)) . '">' .
                     '<i class="material-icons">keyboard_arrow_right</i>' .
                     '</a></li>';
            }
        }
    }

    /**
     * Вывод общей навигации
     *
     * @param int $max Глубина навигации
     */
    function navigation($max = 3) {
        if($list = \detemiro::navigation()->getSortedAllowList()) {
            echo navigation_inner($list, null, $max);
        }
    }
    function navigation_has_current($part) {
        if($part->value && $part->page && \detemiro::router()->page == $part->value) {
            return 1;
        }
        elseif($part->childs) {
            foreach($part->childs as $sub) {
                if(navigation_has_current($sub) != 0) {
                    return 2;
                }
            }
        }

        return 0;
    }
    function navigation_inner($family, $parent = null, $max = 3) {
        $out = '';

        if($max > 0) {
            $out .= '<ul>';

            foreach($family as $item) {
                if($item->parent == $parent) {
                    $a = navigation_has_current($item);

                    if($item->childs && $max > 1) {
                        $childs = navigation_inner($item->childs, $item->code, $max - 1);
                    }
                    else {
                        $childs = '';
                    }

                    if($a == 1) {
                        $class = 'current';

                        if($childs && $max > 1) {
                            $class .= ' active';
                        }
                    }
                    elseif($a == 2) {
                        $class = 'active';
                    }
                    else {
                        $class = '';
                    }

                    if($childs && $max > 1) {
                        $class .= ' with-sub';
                    }

                    if($class) {
                        $out .= '<li class="' . $class . '">';
                    }
                    else {
                        $out .= '<li>';
                    }


                    $out .= '<a href="' . $item->getLink() . '">';

                    if($parent == null && $item->icon && is_string($item->icon)) {
                        $out .= '<i class="material-icons">' . $item->icon . '</i>';
                    }

                    $out .= $item->title . '</a>';

                    $out .= $childs;

                    $out .= '</li>';
                }
            }

            $out .= '</ul>';
        }

        return $out;
    }

    /**
     * Получение ссылки
     *
     * @param            $key
     * @param array|null $get
     *
     * @return string
     */
    function get_link($key, array $get = array()) {
        return \detemiro::router()->getLink($key, null, null, $get);
    }
?>