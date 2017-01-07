<?php if(isset($data)) :
    if(is_array($data)) : ?>
        <div class="container">
            <h4>Файлы пользователя <b><?php echo $data['user'] ?></b></h4>
            <table class="table table-stripped table-bordered">
                <thead>
                    <tr>
                        <th>Файл</th>
                        <th>Путь</th>
                        <th>Владелец</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($data['file'] as $file) : ?>
                <tr>
                    <td><img src="http://localhost/<?php $file['path'] = substr($file['path'] , 1); echo $data['route'] . $file['path'];?>" alt="файл"></td>
                    <td><?php echo $file['path'];?></td>
                    <td><?php echo $file['owner'];?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="container">
            <h4>Cписок всех пользователей</b></h4>
            <table class="table table-stripped table-bordered">
                <thead>
                <tr>
                    <th>Имя</th>
                    <th>Возраст</th>
                    <th>Статус</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data['users'] as $user) : if(intval($user['age']) >= 18) $stat="Совершеннолетний"; else $stat = 'Несвосершеннолетний'; ?>
                    <tr>
                        <td><?php echo $user['login'];?></td>
                        <td><?php echo $user['age']?></td>
                        <td><?php echo $stat;?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

<?php endif;?>
    <?php else : ?>
    <p>Информация не доступна.</p>
<?php endif;?>
