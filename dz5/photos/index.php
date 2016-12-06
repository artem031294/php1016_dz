<?php
define("SITE_PATH","git/php1016_dz/dz3/");

function art($b) {return "'" . $b . "'";}

$js_name = SITE_PATH;
$dir_name = "./";
$images = glob($dir_name."*.{jpg,gif,png}",GLOB_BRACE);

$dat = '<ul>';
foreach ($images as $image) {
    $js_name .= 'photos/' . str_ireplace('./','',$image);
    $dat .= '<li><a href="#" onclick="imageChange(' . art($js_name) . ')"><img src="' . $image . '" height="150px" width="150px"></a></li>';
    $js_name = SITE_PATH;
}
$dat .= '</ul>'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Картинки</title>
    <link rel="stylesheet" href="../style.css">

</head>

<body>
    <header>
        <?php require_once ('../template/header.php'); ?>
    </header>
    <div class="clear"></div>
    <div class="panel">
        <form enctype="multipart/form-data" action="../engine/photo-upload.php" method="post">
            <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
            <input type="hidden" name="db_ignore"/>
            Доюавить файл: <input name="photo" type="file" />
            <input type="submit" value="Загрузить" />
        </form>
    </div>
    <div class="clear"></div>
    <div class="wrapper">
        <div class="container">
          <?php echo $dat;?>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script>
        function imageChange($name) {
            if (confirm("Вы уверены что хотите сменить аватарку?")) {
                $.ajax({
                    url: '../engine/photo-upload.php',
                    data: {change_photo: $name},
                    success: function (data) {
                        window.location.replace('/git/php1016_dz/dz3/dashboard.php');
                    }
                }).fail(function() {
                    console.log( "error" );
                });
                return false;
            }
        }
    </script>
</body>
</html>