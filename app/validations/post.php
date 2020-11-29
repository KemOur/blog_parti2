<?php

function postValidate($id)
{
    /*
    // Useless because the app uses FastRoute validation
    if (empty($id) or !is_numeric($id)) {
        http_response_code(400);
        echo "<html><body>Bad request</body></html>";
        return false;
    }
    */

    $post = getPostById($id);

    if (!$post) {
        http_response_code(404);
        echo "<html><body>Post not found</body></html>";
        return false;
    }

    return $post;
}
