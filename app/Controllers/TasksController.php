<?php

namespace App\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Comment;

class TasksController
{
    public function index()
    {
        User::checkLogged();

        $user = $_SESSION['user'];

        if (isset($_GET['status'])) {
            $status = $_GET['status'];
        }else{
            $status = 'active';
        }

        $tasks = Task::getTasksByUser($user, $status);

        require __DIR__ . '/../Views/task/index.php';
    }


    public function show($id)
    {
        User::checkLogged();

        $executors = User::getAllUsers();

        $task = Task::getTaskById($id);

        $comments = Comment::getCommentsByTasksId($id);

        require __DIR__ . '/../Views/task/show.php';
    }


    public function create()
    {
        User::checkLogged();

        $executors = User::getAllUsers();

        if ($_POST) {
            $title = trim($_POST['title']);
            $description = trim($_POST['description']);
            $deadline = $_POST['deadline'];
            $creator = $_SESSION['user'];
            $executor = $_POST['executor'];

            $title = strip_tags($title);
            $description = strip_tags($description);

            Task::addTask($title, $description, $deadline, $creator, $executor);

            header('Location: /');
        }

        require __DIR__ . '/../Views/task/create.php';
    }


    public function destroy($id)
    {
        Task::deleteTaskById($id);

        header('Location: /');
    }


    public function updateDeadline($id)
    {
        $deadline = $_POST['deadline'];

        Task::updateTasksDeadlineById($id, $deadline);

        $referrer = $_SERVER['HTTP_REFERER'];

        header('Location:' . $referrer);
    }


    public function updateExecutor($id)
    {
        $executor_id = $_POST['executor_id'];

        Task::updateTasksExecutorById($id, $executor_id);

        $referrer = $_SERVER['HTTP_REFERER'];

        header('Location:' . $referrer);
    }


    public function updateStatus($id)
    {
        $status = $_POST['status'];

        Task::updateTasksStatusById($id, $status);

        header('Location: /');
    }

}