<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Авторизация/Регистрация</title>
		<link rel="stylesheet" href="style.css">

	</head>

	<body>
		<header>
		<?php require_once ('template/header.php'); ?>
		<div class="clear"></div>
        <h3 style="display:block; padding-left: 11%;">Система пользователей</h3>
		</header>
        <?php if (!isset($_SESSION['id'])): ?>
		<div class="wrapper">
			<form method="POST" action="engine/registration.php">

				<ul class="form-container">
					<li>
                        <h4>Регистрация</h4>
						<input type="text" name="reg_login" placeholder="Логин"/>
					</li>
					<li>
						<input type="password" name="reg_pwd" placeholder="Пароль"/>
					</li>
					<input type="submit" name="reg_go" value="Регистрация" />
				</ul>
			</form>

			<form method="POST" action="engine/auto.php">

                <ul class="form-container">
					<li>
                        <h4>Авторизация</h4>
						<input type="text" name="auto_login" placeholder="Логин"/>
					</li>
					<li>
						<input type="password" name="auto_pwd" placeholder="Пароль"/>
					</li>
					<input type="submit" name="auto_go" value="Войти" />
				</ul>
			</form>
		</div>
    <?php endif; ?>
	</body>
</html>
