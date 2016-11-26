<?php

$host = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

$head = '
    <ul class="header-menu">
        <li><a href="./index.php">Главная</a></li>';

if (isset($_SESSION['id'])) {
    $head .= '<li><a href="./dashboard.php">Личный Кабинет</a></li>';
}
if ( ( ($host == 'localhost/git/php1016_dz/dz3/dashboard.php') || (($host == 'localhost/git/php1016_dz/dz3/data.php')) )&& (isset($_SESSION['id'])) ) {
    $head .= '<li><a href="./data.php">Изменить данные</a></li>';
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