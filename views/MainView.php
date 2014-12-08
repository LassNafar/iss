<h1>Добро пожаловать<?php if($priv = $this->user->getParam("name")){ echo ", ".$priv;}?>!</h1>
<a href="<?=self::createUrl("/happy");?>">Праздник</a>
<div>
<?php if(array_key_exists("status", $_SESSION)){?>
    <form method="POST" action="" style="width: 100px; height: 35px; background-color: grey;">
        <input hidden="hidden" type="text" name="exit" value="exit">
        <input type="submit" value="Выйти">
    </form>
<?php }else{?>
    <form method="POST" action="" style="width: 300px; height: 115px; background-color: grey;">
        <p>Вход</p>
        <input type="text" name="login">
        <input type="text" name="pass">
        <input type="submit" value="Войти">
    </form>
<?php }?>
</div>
<p>
<a href="/">ОЛОЛОША TEAM</a> - команда первоклассных специалистов в области разработки веб-сайтов с многолетним опытом коллекционирования мексиканских масок, бронзовых и каменных статуй из Индии и Цейлона, барельефов и изваяний, созданных мастерами Экваториальной Африки пять-шесть веков назад...
</p>
