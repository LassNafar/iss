<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title><?=$data["data"];?></title>
</head>
<body style="width:1000px; background-color:yellow; text-align: center; margin: 0 auto;">
    <?php 
    if (is_array($content_view)) {
        foreach ($content_view as $val) {
            include 'views/'.$val;
        }
    }
    else {
        include 'views/'.$content_view;
    }
    ?>
    <?php if (array_key_exists("vid",$data)&&$data["vid"]==="1"):?>
        <div style="background-color: grey; position: absolute; bottom: 0px; left: 0px; width: 100%; height: 50px; text-align: center; font-size: 15px; padding-bottom: 10px;">
        Запросу <?=$data["url"];?> соответствует Controller: <?=$data["controller"];?> и Action: <?=$data["action"];?>
        </div>
    <?php endif;?>
</body>
</html>
