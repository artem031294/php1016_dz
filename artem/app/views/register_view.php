<p>
    Здравствуйте, <b><?php echo ucfirst($data['login']);?></b>.
    Вы успешно зарегистрированы в системе. Сейчас Вы будете перенаправлены.
</p>

<?php header('refresh=1.5;url=/dash/');