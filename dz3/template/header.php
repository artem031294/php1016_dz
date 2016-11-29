<?php
if (!defined('SITE_PATH')) {
    define("SITE_PATH", "git/php1016_dz/dz3/");
}
$constant='constant';
$host = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

$head = '
    <ul class="header-menu">
        <li><a href="/';
        $head .= $constant('SITE_PATH');
        $head .= 'index.php">Главная</a></li>';

if (isset($_SESSION['id'])) {
    $head .= '<li><a href="/';
    $head .= $constant('SITE_PATH');
    $head .= 'dashboard.php">Личный Кабинет</a></li>';
}
if ( ( ($host == 'localhost/git/php1016_dz/dz3/dashboard.php') || (($host == 'localhost/git/php1016_dz/dz3/data.php')) )&& (isset($_SESSION['id'])) ) {
    $head .= '<li><a href="/';
    $head .= $constant('SITE_PATH');
    $head .= 'data.php">Изменить данные</a></li>';
    $head .= '<li><a href="/';
    $head .= $constant('SITE_PATH');
    $head .= 'photos/index.php">Все картинки</a></li>';
}

$head .= '</ul>';
if (isset($_SESSION['id'])) {
    $head .= '<ul class="right-menu">
            <li>
                <form method="post" action="engine/auto.php">
                    <input type="hidden" name="logout">
                    <div>
                        <button type="submit">Выйти</button>
                    </div>
                </form>
            </li>
        </ul>';
}

echo $head;