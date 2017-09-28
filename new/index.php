<?php
/**
 * Created by PhpStorm.
 * User: Tech
 * Date: 26.09.2017
 * Time: 10:55
 */
require 'init.php';

$users = User::all();
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"></link>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Info</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $u) :?>
    <tr>
        <td><?=$u->id;?></td>
        <td><?=$u->name;?></td>
        <td>
            <a href="show.php?id=<?=$u->id;?>" target="_blank">Просмотр</a>
            <a href="delete.php?id=<?=$u->id;?>" target="_blank">Удаление</a>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>