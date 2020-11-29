<?php
// Manual router with HTTP method overriding
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($uri == "/") {
        return postIndex();
    } elseif ($uri == "/show" and isset($_GET['id'])) {
        return postShow($_GET['id']);
    }
    elseif ($uri == "/delete" and isset ($_GET['id'])) {
       return postDestroy(($_GET['id']));
    }
    elseif ($uri == "/generate") {
       return postFaker();
    }
    elseif ($uri == "/create") {
        return postCreate();
    } elseif ($uri == "/edit" and isset($_GET['id'])) {
        return postEdit($_GET['id']);
    } else {
        http_response_code(404);
        echo "<html><body>Page not found</body></html>";
        return;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // HTTP Method override
    if (!empty($_POST['_method'])) {
        $_SERVER['REQUEST_METHOD'] = $_POST['_method'];
    }

    if ($uri == "/") {
        return postStore();
    }
}
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    if ($uri == "/update" and isset($_GET['id'])) {
        return updatePost($_GET['id']);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    if ($uri == "/delete" and isset($_GET['id'])) {
        return postDestroy($_GET['id']);
    }
}

http_response_code(405);
echo "<html><body>Method not allowed</body></html>";
