<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title><?=$data["data"];?></title>
</head>
<body style="width:1000px; background-color:yellow; text-align: center; margin: 0 auto;">
    <?php include 'views/'.$content_view; ?>
    <?php if (array_key_exists("vid",$data)&&$data["vid"]==1):?>
        <div style="background-color: grey; position: absolute; bottom: 0px; left: 0px; width: 100%; height: 50px; text-align: center; font-size: 15px; padding-bottom: 10px;">
        Controller : <?=$data["controller"];?><br>
        Action: <?=$data["action"];?>
        </div>
    <?php endif;?>
</body>
</html>
