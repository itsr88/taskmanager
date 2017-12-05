<?php

namespace App\Controllers;

use App\Models\User;

class UsersController
{
    public function index()
    {

        User::checkLogged();

        $user = User::getUserById($_SESSION['user']);

        $users = User::getAllUsers();

        include __DIR__ . '/../Views/user/index.php';
    }

    public function show($id)
    {

        $user = User::getUserById($id);

        echo $user['fullname'];
    }


    public function create()
    {
        if (isset($_POST['email']) && isset($_POST['fullname'])) {

            $email = trim($_POST['email']);
            $fullname = trim($_POST['fullname']);

            $email = strip_tags($email);
            $fullname = strip_tags($fullname);

            if (isset($_POST['admin'])) {
                $admin = 1;
            }else{
                $admin = 0;
            }

            User::addUser($email, $fullname, $admin);

            header('Location: /users/');
        }

        include __DIR__ . '/../Views/user/create.php';
    }


    public function login()
    {
        $email = '';
        $password = '';

        $errors = false;

        if (isset($_POST['email']) && isset($_POST['password'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $userId = User::checkUserData($email, $password);

            if ($userId == false){
                $errors[] = 'Неправильные данные для входа в систему';
            }else{
                User::auth($userId);
                header('Location: /');
            }
        }

        include __DIR__ . '/../Views/user/auth.php';
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header('Location: /');
    }

}