<?php

namespace App\Models;

use Lib\Storage\Database\DataBase;

class User
{
    public static function getAllUsers()
    {

        $db = DataBase::getConnect();

        $sql = 'SELECT id, email, fullname FROM users';
        $res = $db->prepare($sql);
        $res->execute();

        $users = array();
        foreach ($res as $row){
            $users[]=[
                'id' => $row['id'],
                'email' => $row['email'],
                'fullname' => $row['fullname'],
            ];
        }
        return $users;
    }

    public static function getUserById($id)
    {

        $db = DataBase::getConnect();

        $sql = 'SELECT id, email, password, fullname 
                FROM users 
                WHERE id = :id';

        $res = $db->prepare($sql);
        $res->bindParam(':id', $id, \PDO::PARAM_INT);
        $res->execute();

        $user = $res->fetch();

        return $user;
    }

    public static function addUser($email, $fullname, $admin)
    {
        $db = DataBase::getConnect();

        $sql = 'INSERT INTO users (email, fullname, is_admin, password)
                VALUES (:email, :fullname, :is_admin, :password)';

        $password = 'test';

        $res = $db->prepare($sql);
        $res->bindParam(':email', $email, \PDO::PARAM_STR);
        $res->bindParam(':fullname', $fullname, \PDO::PARAM_STR);
        $res->bindParam(':is_admin', $admin, \PDO::PARAM_INT);
        $res->bindParam(':password', $password);
        $res->execute();
    }

    public static function checkUserData($email, $password)
    {

        $db = DataBase::getConnect();

        $sql = 'SELECT id, email, password 
                FROM users 
                WHERE email = :email 
                AND password = :password';

        $res = $db->prepare($sql);
        $res->bindParam(':email', $email, \PDO::PARAM_STR);
        $res->bindParam(':password', $password, \PDO::PARAM_STR);
        $res->setFetchMode(\PDO::FETCH_ASSOC);
        $res->execute();

        $user = $res->fetch();

        if($user) {
            return $user['id'];
        }
        return false;
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header("Location: /users/login");
    }

    public static function isAdmin()
    {
        $id = $_SESSION['user'];

        $db = DataBase::getConnect();

        $sql = 'SELECT id, is_admin
                FROM users
                WHERE id = :id' ;

        $res = $db->prepare($sql);
        $res->bindParam(':id', $id, \PDO::PARAM_INT);
        $res->execute();

        $user = $res->fetch();

        if ($user['is_admin']==1) {
            return true;
        }else{
            return false;
        }
    }
}