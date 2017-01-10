<?php if(empty($_SESSION)) session_start(); ?>
<!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Главная</title>
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/bootstrap.min.css">

        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"  data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle</span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="/" class="navbar-brand">PHP_LS_1016</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="/">Главная</a></li>
                        <li><a href="/dash/">Личный кабинет</a></li>
                        <li><a href="/dash/allInfo">Информация</a></li>
                        <li><a href="/portfolio/">Портфолио</a></li>
                        <li><a href="/contact/">Контакты</a></li>
                    </ul>
                    <?php if(!empty($_SESSION)) : ?>
                    <ul class="pull-right">
                        <li>
                            <form action="http://<?php echo $_SERVER['HTTP_HOST']?>/login" method="POST">
                                <input type="submit" name="logout" value="Выйти" />
                            </form>
                        </li>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </nav>

        <div class="container" style="margin-top:100px;">
            <?php include 'app/views/'.$content_view; ?>
        </div>

        <div class="container">
            <hr/>
            <footer>
                <p>&copy; 2016 PhP_Lessons</p>
            </footer>
        </div>


        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="/app/js/bootstrap.min.js"></script>
    </body>