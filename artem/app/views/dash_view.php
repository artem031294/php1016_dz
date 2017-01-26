<?php
//    echo'<pre>';
//    var_dump($data);
//    var_dump($_SESSION);
//    echo'<pre>'?>
<?php if(is_array($data)) : ?>
<table class="table table-stripped table-bordered">
    <thead>
        <tr>
            <th>Аватарка</th>
            <th>Имя</th>
            <th>Возраст</th>
            <th>О себе</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><img src="http://localhost/<?php echo str_split($data[0]['photo'],2);?>" alt="" width="100px" height="auto"></td>
            <td><?php echo $data[0]['name']?></td>
            <td><?php echo $data[0]['age']?></td>
            <td><?php echo $data[0]['about']?></td>
        </tr>
    </tbody>
</table>
    <div class="container">
        <form action="changeInfo" method="post">
            <div class="form-group">
                <label for="age">Укажите возраст:</label>
                <input id="age" name="age" type="text" />
                <label for="about">О себе:</label>
                <textarea id="about" name="about" rows="7"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Изменить данные" />
            </div>
        </form>
    </div>
<hr>
<div class="container">
    <div class="h4">Новая аватарка</div>
    <form enctype="multipart/form-data" action="upload" method="post">
        <div class="form-group">
            <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
            <label for="file">Загрузить аватар:</label>
            <input id="file" name="photo" type="file" />
        </div>
        <div class="form-group">
            <input type="submit" value="Загрузить" />
        </div>
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
