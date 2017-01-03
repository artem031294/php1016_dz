<?php
//    echo'<pre>';
//    var_dump($data);
//    var_dump($_SESSION);
//    echo'<pre>'?>
<?php if(is_array($data)) : ?>
<table>
    <tr>
        <td>Аватарка</td>
        <td>Имя</td>
        <td>Возраст</td>
        <td>О себе</td>
    </tr>
    <tr>
        <td><img src="http://localhost/<?php echo $data[0]['photo']?>" alt="" width="100px" height="auto"></td>
        <td><?php echo $data[0]['name']?></td>
        <td><?php echo $data[0]['age']?></td>
        <td><?php echo $data[0]['about']?></td>
    </tr>
</table>
<?php elseif (gettype($data) == 'string') : ?>
<p><?php echo $data; print_r($_SESSION); ?></p>
<?php else : ?>
<p>Неизветсный тип данных вида</p>
<?php endif; ?>
