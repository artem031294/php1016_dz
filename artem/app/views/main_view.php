<?php if(!isset($_SESSION['login'])) : ?>
<div class="wrapper">
    <form method="POST" action="register">

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

    <form method="POST" action="login">

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
<?php else : ?>
    <p>Привет МИР!</p>
<?php endif;?>
