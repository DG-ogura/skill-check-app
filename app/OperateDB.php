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

    // ログイン時のユーザID取得
    public function set_id($db, $user, $pass)
    {
        try {
            $user = "'$user'";
            $pass = "'$pass'";
            $stmt = $db->prepare("SELECT * FROM user WHERE name = $user and password = $pass");
            $stmt->execute();
            $row = $stmt->fetchAll();
            return $row;
        //例外発生
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

    // スキルポイント変更
    public function modify_point($db, $id, $point)
    {
        try {
            $id = "'$id'";
            $point = "'$point'";
            $stmt = $db->prepare("UPDATE skill_user SET point = $point WHERE user_id = $id");
            $row = $stmt->execute();
            return $row;
            //例外発生
            } catch(PDOException $e) {
                return 2;
            }
        }

    // 多対多での取得
    public function join_db($db, $user_table, $middle_table, $skill_table, $login_user)
    {
        try {
            $login_user = "'$login_user'";
            $stmt = $db->prepare("SELECT * FROM $user_table AS U 
                                JOIN $middle_table AS M ON U.id = M.user_id 
                                JOIN $skill_table AS S ON M.skill_id = S.id 
                                WHERE U.name = $login_user");
            $stmt->execute();
            $row = $stmt->fetchAll();
            return $row;
        //例外発生
        } catch(PDOException $e) {
            return 2;
        }
    }   

}