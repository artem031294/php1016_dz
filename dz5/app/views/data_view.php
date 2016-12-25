<h1>Личный кабинет</h1>

<?php foreach ($data as $d): ?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <img src="<?=$d['photo']?>" alt="Аватрарка" width="150px" height="auto">
        </div>
        <div class="col-md-8">
            <p>Имя: <?=$d['name']?></p>
            <p>Возраст: <?=$d['age']?></p>
            <p>Инфо: <?=$d['info']?></p>
        </div>
        <>
    </div>
</div>

<?php endforeach; ?>