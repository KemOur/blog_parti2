<?php

use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\NestedValidationException;

function postIndex()
{
    $posts = getAllPosts();
    view('posts/index', compact('posts'));
}

function postShow($id)
{
    if (!$post = postValidate($id)) {
        return;
    }

    view('posts/show', compact('post'));
}

function postCreate()
{
    view('posts/create');
}
//genere faux articles
function postFaker(){
    genereFaker();
}


function postStore()
{
    $userValidator = v::attribute('title', v::stringType()->length(1, 255))
        ->attribute('body', v::stringType()->length(3));

    $post = (object) $_POST;

    try {
        $userValidator->assert($post);
    } catch (NestedValidationException $exception) {
        $_SESSION['error'] = implode(', ', $exception->getMessages());
        $_SESSION['old'] = $_POST;
        header('Location: /create');
        return;
    }

    $post = createPost($_POST);
    $_SESSION['success'] = "L'article {$_POST['title']} a bien été créé";
    header('Location: /');
    return;
}

function postDestroy($id)
{
    if (!$post = postValidate($id)) {
        return;
    }

    deletePost($id);
    $_SESSION['success'] = "L'article #{$id} a bien été supprimé";
    header('Location: /');
    return;
}

function postEdit($id)
{
    if (!$post = postValidate($id)) {
        return;
    }

    view('posts/edit', compact('post'));
}

function postUpdate($post)
{
    if (!$oldPost = postValidate($post['id'])) {
        return;
    }

    editPost((object) $post);

    $_SESSION['success'] = "L'article #{$post['id']} a bien été modifié";
    header('Location: /');
    return;
}
