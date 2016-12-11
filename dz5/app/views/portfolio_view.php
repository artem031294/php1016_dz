<h1>Портфолио</h1>

<div class="row">

    <?php foreach ($data as $row): ?>

        <div class="col-md-4">
            <h2><?=$row['name']?></h2>
            <p><?=$row['year']?></p>
            <p><?=$row['description']?></p>
            <p><a href="<?=$row['site']?>" class="btn btn-default">Посмотреть сайт</a></p>
        </div>

    <?php endforeach; ?>

</div>