<?php

class Model
{
    public function ConnectDB()
    {
        $dsn = DB_DRIVER.':dbname='.DB_DATABASE.';host='.DB_HOSTNAME;

        try {
            $dbh = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
        } catch (PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
        }
        $dbh->exec("set names utf8");
        return $dbh;
    }

    public function checkUserData($data)
    {
	$input_text = strip_tags($data);
	$input_text = htmlspecialchars($input_text);
	$input_text = mysql_escape_string($input_text);
	$input_text = addslashes($input_text);
	return $input_text;
    }

}