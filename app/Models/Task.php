<?php

namespace App\Models;

use Lib\Storage\Database\DataBase;

class Task
{
    public static function getAllTasks()
    {
        $db = DataBase::getConnect();

        $sql = 'SELECT id, title, description, deadline FROM tasks';

        $res = $db->prepare($sql);
        $res->setFetchMode(\PDO::FETCH_ASSOC);
        $res->execute();

        $tasks = [];

        foreach ($res as $row) {
            $tasks[] = [
                'id' => $row['id'],
                'title' => $row['title'],
                'description' => $row['description'],
                'deadline' => $row['deadline'],
                'creator' => $row['creator'],
                'executor' => $row['executor'],
            ];
        }
        return $tasks;
    }


    public static function getTaskById($id)
    {
        $db = DataBase::getConnect();

        $sql = 'SELECT t.id, t.title, t.description, t.deadline, u.fullname AS executor, 
                      creator.fullname AS creator
                FROM tasks_executors t_e
                INNER JOIN tasks t 
                ON t_e.task_id = t.id
                INNER JOIN users u 
                ON t_e.user_id = u.id
                INNER JOIN tasks_creators tc 
                ON tc.task_id = t.id
                INNER JOIN users creator
                ON creator.id = tc.user_id
                WHERE t_e.task_id=' . $id;

        $res = $db->prepare($sql);
        $res->setFetchMode(\PDO::FETCH_ASSOC);
        $res->execute();

        $task = $res->fetch();

        return $task;
    }


    public static function getTasksByUser($user, $status='active')
    {
        $db = DataBase::getConnect();

        $sql = 'SELECT t.id AS task_id, t.title, t.description, t.deadline, 
                        u.fullname AS executor, creator.fullname AS creator
                FROM tasks_executors te
                INNER JOIN tasks t 
                ON t.id=te.task_id
                INNER JOIN users u
                ON te.user_id = u.id
                INNER JOIN tasks_creators tc
                ON tc.task_id = t.id
                INNER JOIN users creator
                ON creator.id = tc.user_id
                WHERE te.user_id=' . $user .
                ' AND t.status=' . "\"$status\"" .
                'ORDER BY deadline';



        $res = $db->prepare($sql);
        $res->setFetchMode(\PDO::FETCH_ASSOC);
        $res->execute();

        $tasks = [];

        $count = 0;

        foreach ($res as $row) {
            $tasks[] = [
                'id' => $row['task_id'],
                'title' => $row['title'],
                'description' => $row['description'],
                'deadline' => $row['deadline'],
                'executor' => $row['executor'],
                'creator' => $row['creator'],
            ];
            $count++;
        }

//        $tasks['count'] = count($tasks);

        $tasks['count'] = $count;

        return $tasks;
    }


    public static function addTask($title, $description, $deadline, $creator, $executor)
    {
        $db = DataBase::getConnect();

        $maxTaskId ='SELECT MAX(id) FROM tasks';

        $sql = "INSERT INTO tasks (title, description, deadline) 
                VALUES (:title, :description, :deadline);
                INSERT INTO tasks_executors (task_id, user_id)
                VALUES (($maxTaskId), :user_id);
                INSERT INTO tasks_creators (task_id, user_id)
                VALUES (($maxTaskId), :creator)";

        $res = $db->prepare($sql);
        $res->bindParam(':title', $title);
        $res->bindParam(':description', $description);
        $res->bindParam(':deadline', $deadline);
        $res->bindParam(':creator', $creator);
        $res->bindParam(':user_id', $executor);
        $res->execute();
    }


    public static function deleteTaskById($id)
    {
        $db = DataBase::getConnect();

        $sql = 'DELETE FROM tasks WHERE id = :id';

        $res = $db->prepare($sql);
        $res->bindParam(':id', $id, \PDO::PARAM_INT);
        $res->execute();
    }


    public static function updateTasksDeadlineById($id, $deadline)
    {
        $db = DataBase::getConnect();

        $sql = 'UPDATE tasks 
                SET
                deadline = :deadline
                WHERE id = :id';

        $res = $db->prepare($sql);
        $res->bindParam(':id', $id, \PDO::PARAM_INT);
        $res->bindParam(':deadline', $deadline);
        $res->execute();
    }


    public static function updateTasksExecutorById($id, $executor_id)
    {
        $db = DataBase::getConnect();

        $sql = 'UPDATE tasks_executors 
                SET
                user_id = :user_id
                WHERE task_id = :id';

        $res = $db->prepare($sql);
        $res->bindParam(':id', $id, \PDO::PARAM_INT);
        $res->bindParam(':user_id', $executor_id, \PDO::PARAM_INT);
        $res->execute();
    }

    public static function updateTasksStatusById($id, $status)
    {
        $db = DataBase::getConnect();

        $sql = 'UPDATE tasks
                SET
                status = :status
                WHERE id = :id';

        $res = $db->prepare($sql);
        $res->bindParam(':status', $status, \PDO::PARAM_STR);
        $res->bindParam(':id', $id, \PDO::PARAM_STR);
        $res->execute();
    }
}