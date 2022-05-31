<?php

namespace App\Controllers;
use App\Models\OperateDB;
//$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
//$dotenv->load();

class DBController
{
    public function connect($dsn, $user, $pass)
    {
        $connect = new OperateDB();
        $connect->connect_db($dsn, $user, $pass);
    }

    public function id($db, $user, $pass)
    {
        $id = new OperateDB();
        $id->set_id($db, $user, $pass);
    }

    public function list($db, $table)
    {
        $list = new OperateDB();
        $list->list_db($db, $table);
    }

    public function point($db, $id, $point)
    {
        $point = new OperateDB();
        $point->modify_point($db, $id, $point);
    }
    
    public function join($db, $user_table, $middle_table, $skill_table, $login_user)
    {
        $join = new OperateDB();
        $join->join_db($db, $user_table, $middle_table, $skill_table, $login_user);
    }
}

?>