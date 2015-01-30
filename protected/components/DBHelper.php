<?php

class DBHelper
{
    public static function dbExists($name){
        $sql = <<<SQL
SHOW DATABASES LIKE :name
SQL;
        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(':name', $name);
        $res = $command->queryAll();
        return !empty($res);
    }

    public static function dbCreate($name){
        $sql = <<<SQL
CREATE DATABASE `$name` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
SQL;
        $command = Yii::app()->db->createCommand($sql);
        return $command->execute();
    }

    public static function userCreate($login,$password,$dbName){
        $sql = <<<SQL
GRANT ALL PRIVILEGES ON $dbName.* TO '$login'@'%' IDENTIFIED BY '$password' WITH GRANT OPTION;
SQL;
        $command = Yii::app()->db->createCommand($sql);
        try {
            $command->execute();
        } catch (Exception $ex) {
            return false;
        }
        return true;
    }


}
