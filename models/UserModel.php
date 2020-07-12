<?php
class UserModel {

    public static function getUserByName($username)
    {
        $query = "SELECT `id`, `username`, `password`, `active`, `role`"
        . " FROM users WHERE username = :username";
        $params = [
            ':username' => $username
        ];
        return Db::queryOne($query, $params);  
    }
}
