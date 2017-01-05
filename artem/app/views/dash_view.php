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
<hr>
<div class="container">
    <h4>Новая аватарка:</h4>
    <form enctype="multipart/form-data" action="upload" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
        Загрузить аватар: <input name="photo" type="file" />
        <input type="submit" value="Загрузить" />
    </form>
    <!--
    <form action="exist" method="get">
        <div class="form-group">
            <input type="submit" value="Выбрать" name="ref"/>
        </div>
    </form>
    -->
</div>
<?php elseif (gettype($data) == 'string') : ?>
<p><?php echo $data; ?></p>
<?php else : ?>
<p>Неизветсный тип данных вида</p>
<?php endif; ?>
