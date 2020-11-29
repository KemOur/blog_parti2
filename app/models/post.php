<?php

use Carbon\Carbon;

function getAllPosts()
{
    $db = dbConnect();
    $statement = $db->query('SELECT id, title, DATE_FORMAT(created_at, "%d/%m/%Y") as created_at_fr FROM posts ORDER BY id DESC');
    return $statement->fetchAll(PDO::FETCH_OBJ);
}

function getPostById($id)
{
    $db = dbConnect();
    $statement = $db->prepare('SELECT * FROM posts WHERE id = :id');
    $statement->execute(['id' => $id]);
    $post = $statement->fetchObject();
    if ($post) {
        $post->created_at = ucfirst(Carbon::parse($post->created_at, 'Europe/Paris')->locale('fr_FR')->diffForHumans());
    }
    return $post;
}

function createPost($post)
{
    $db = dbConnect();
    $statement = $db->prepare('INSERT INTO posts (title, body) VALUES (:title, :body)');
    $statement->execute([
        'title' => $post['title'],
        'body' => $post['body'],
    ]);
    return $db->lastInsertId();
}

function deletePost($id)
{
    $db = dbConnect();
    $statement = $db->prepare('DELETE FROM posts WHERE id = :id');
    $statement->execute(['id' => $id]);
    return;
}

function genereFaker(){
    $db = dbConnect();
    $faker = Faker\Factory::create('fr_FR');
    $title = $faker->catchPhrase;
    $body = $faker->text;
    $statement = $db->prepare('INSERT INTO posts (title, body) VALUES ( :title, :body)');
    $statement->execute([
        'title' => $title,
        'body' => $body,
    ]);
    header('location:/');
    exit();
}


function updatePost($post)
{
    $db = dbConnect();
    $statement = $db->prepare('UPDATE posts SET title = :title, body = :body WHERE id = :id');
    $statement->execute([
        'id' => $post->id,
        'title' => $post->title,
        'body' => $post->body,
    ]);

}
