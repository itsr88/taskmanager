<?php

namespace App\Models;

use Lib\Storage\Database\DataBase;


class Comment
{
    public $author;
    public $text;
    public $added;

    public function __construct($author, $text, $added)
    {
        $this->author = $author;
        $this->text = $text;
        $this->added = $added;
    }

    public static function getCommentsByTasksId($taskId)
    {
        $db = DataBase::getConnect();

        $sql = 'SELECT c.text, c.added, u.fullname
                FROM comments c
                INNER JOIN users u
                ON u.id = c.user_id 
                WHERE c.task_id ='. $taskId;

        $res = $db->prepare($sql);
        $res->execute();

        $comments = [];

        foreach ($res as $comment) {
            $comments[] = new Comment($comment['fullname'], $comment['text'], $comment['added']);
        }

        return $comments;
    }

    public static function addCommentByTasksId($taskId, $author, $text)
    {
        $db = DataBase::getConnect();

        $sql = "INSERT INTO comments (task_id, user_id, text)
                VALUES (:task_id, :user_id, :text)";

        $res = $db->prepare($sql);
        $res->bindParam(':task_id', $taskId, \PDO::PARAM_INT);
        $res->bindParam(':user_id', $author, \PDO::PARAM_INT);
        $res->bindParam(':text', $text, \PDO::PARAM_STR);
        $res->execute();
    }
}