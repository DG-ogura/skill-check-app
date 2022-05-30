<?php

namespace App;
use \PDO;

class OperateDB
{
    // DB接続
    public function connect_db($dsn, $user, $pass)
    {
        try {
            $db = new PDO($dsn, $user, $pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch(PDOException $e) {
            return 2;
        }
    }

    // DB情報取得
    public function list_db($db, $table)
    {
        try {
            $stmt = $db->prepare("SELECT * FROM $table");
            $stmt->execute();
            $row = $stmt->fetchAll();
            return $row;
        //例外発生
        } catch(PDOException $e) {
            return 2;
        }
    }

}