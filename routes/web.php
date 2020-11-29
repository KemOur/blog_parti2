<?php

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $route) {
    $route->get('/', 'postIndex');
    $route->get('/show/{id:[0-9]+}', 'postShow');
    $route->get('/create', 'postCreate');
    $route->get('/edit/{id:[0-9]+}', 'postEdit');
    $route->post('/', 'postStore');
    $route->put('/update', 'postUpdate');
    $route->delete('/delete/{id:[0-9]+}', 'postDestroy');
});
