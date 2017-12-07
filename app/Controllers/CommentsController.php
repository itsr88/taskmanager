<?php
/**
 * Created by PhpStorm.
 * User: dron
 * Date: 06.12.17
 * Time: 14:18
 */

namespace App\Controllers;

use App\Models\Comment;


class CommentsController
{
    public function create()
    {
        if(!empty($_POST['text'])) {
            $id = $_POST['id'];
            $text = trim($_POST['text']);
            $author= $_POST['author'];

            $text = strip_tags($text);

            Comment::addCommentByTasksId($id, $author, $text);

            $comments = Comment::getCommentsByTasksId($id);

            foreach ($comments as $comment) {
                echo "<li class=\"list-group-item\">";
                echo "<h4>$comment->author</h4>";
                echo "<span class=\"text-primary\">$comment->added</span>";
                echo "<div> $comment->text</div>";
                echo "</li>";
            }
        }
    }
}