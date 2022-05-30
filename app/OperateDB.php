<?php

namespace Ogura\\20220530\\;

class OperateDB
{
    // DB接続
    public function connect_db($dsn, $user, $pass)
    {
        $db = new PDO($dsn, $user, $pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch(PDOException $e) {
        return 2;
    }

    // DB情報取得
    public function list_db($db)
    {
        try {
            $stmt = $db->prepare("SELECT * FROM skill_user");
            $stmt->execute();
            $row = $stmt->fetchAll();
            return $row;
        //例外発生
        } catch(PDOException $e) {
            return 2;
        }
    }

}