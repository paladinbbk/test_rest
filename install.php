<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/json; charset=utf-8" />
        <title>Product Json</title>
    </head>
<body>
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

mkdir("/twig_cache", 0777);
    
$username = $_POST['username'];  
$pass = $_POST['pass'];  
$host = $_POST['host'];  
$db = $_POST['db'];  

$data = "<?php
// DIR
define('DIR_VENDOR', 'vendor/');
define('DIR_VIEW', 'application/Views/');
define('DIR_MODEL', 'application/Model/');
define('DIR_CONTROLLER', 'application/Controller/');

// DB
define('DB_DRIVER', 'mysql');
define('DB_HOSTNAME', '$host');
define('DB_USERNAME', '$username');
define('DB_PASSWORD', '$pass');
define('DB_DATABASE', '$db');";

$fp = fopen('application/Config.php', 'w');
fwrite($fp, $data);
fclose($fp);

$dsn1 = "mysql:host=$host";

try {
    $dbh1 = new PDO($dsn1, $username, $pass);
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}

$dbh1->exec("CREATE DATABASE $db CHARACTER SET utf8 COLLATE utf8_general_ci");

$dsn = "mysql:dbname=$db;host=$host";
try {
    $dbh = new PDO($dsn, $username, $pass);
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}
$dbh->exec("set names utf8");
$sql = "
CREATE TABLE IF NOT EXISTS `category` (
`id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

INSERT INTO `category` (`id`, `category_id`, `name`) VALUES
(1, 0, 'Компьютеры'),
(2, 1, 'Ноутбуки'),
(4, 1, 'Планшеты');

CREATE TABLE IF NOT EXISTS `photo` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;


INSERT INTO `photo` (`id`, `product_id`, `path`) VALUES
(4, 11, 'http://electrocom.com.ua/image/cache/data-noutbuki-nout-asus-8-pu401la-wo091h-1-650x500.jpg'),
(5, 55, 'http://zapp4.staticworld.net/reviews/graphics/products/uploaded/apple_116inch_macbook_air14ghz_64_gb_710257_g2.jpg'),
(6, 55, 'http://pro-spo.ru/images/stories/581/Apple_MacBook_Air_13-inch_35781451_06_610x4361.jpg'),
(7, 11, 'http://moskva.sindom.ru/upload/m/y/k/x/1_yjdsq-yjen-er.jpg'),
(8, 55, 'http://moskva.sindom.ru/upload/m/y/k/x/1_yjdsq-yjen-er.jpg'),
(9, 56, 'http://moskva.sindom.ru/upload/m/y/k/x/1_yjdsq-yjen-er.jpg'),
(10, 57, 'http://store.storeimages.cdn-apple.com/4710/as-images.apple.com/is/image/AppleInc/aos/published/images/i/pa/ipad/air/ipad-air-specs-white-2013?wid=244&amp;hei=258&amp;fmt=png-alpha&amp;qlt=95&amp;.v=1428609043891'),
(11, 58, 'http://store.storeimages.cdn-apple.com/4710/as-images.apple.com/is/image/AppleInc/aos/published/images/i/pa/ipad/air/ipad-air-specs-white-2013?wid=244&amp;hei=258&amp;fmt=png-alpha&amp;qlt=95&amp;.v=1428609043891');

CREATE TABLE IF NOT EXISTS `product` (
`id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;


INSERT INTO `product` (`id`, `category_id`, `name`) VALUES
(11, 2, 'Asus PU401LA-WO091H'),
(55, 2, 'Apple Air 13'),
(56, 2, 'Dell Vostro 1300'),
(57, 4, 'Apple IPad 5'),
(58, 4, 'Apple IPad 6');

CREATE TABLE IF NOT EXISTS `sale` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sale` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO `sale` (`id`, `product_id`, `quantity`, `sale`) VALUES
(1, 11, 15, 5),
(2, 55, 100, 13),
(3, 57, 100, 13);

ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `photo`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `product`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `sale`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;

ALTER TABLE `photo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;

ALTER TABLE `product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;

ALTER TABLE `sale`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;";

$dbh->exec($sql);

echo 'Установлено<br>';

echo 'Если не запуститься проверьте сущестование папки и права на нее "/twig_cache" <br>';

echo '<a href="/"><h1> Перейти на сайт </h1></a>';

} else {
    ?>
    <form method="post">
        <table style="margin: 100px auto;" >
            <tr>
                <td>Хост</td>
                <td><input type="text" name="host" value="localhost"></td>
            </tr>
            <tr>
                <td>Имя Базы данных</td>
                <td><input type="text" name="db" value="test_rest"></td>
            </tr>
            <tr>
                <td>Имя пользователя</td>
                <td><input type="text" name="username" value="root"></td>
            </tr>
            <tr>
                <td>Пароль</td>
                <td><input type="text" name="pass" value=""></td>
            </tr>
            <tr>
                <td><input type="submit" value="Install"></td>
            </tr>
        </table>
    </form>
    
<?php }?>
</body>
</html>