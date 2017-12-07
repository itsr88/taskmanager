<?php




$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
//    $r->addRoute('GET', '/users', 'get_all_users_handler');
    // {id} must be a number (\d+)
    // The /{title} suffix is optional
    $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');

    $r->get('/', 'TasksController@index');
    $r->get('/{status}', 'TasksController@index');
    $r->addRoute(['GET', 'POST'], '/tasks/{id:\d+}', 'TasksController@show');
    $r->addRoute(['GET', 'POST'], '/tasks/create', 'TasksController@create');
    $r->addRoute(['GET', 'POST'], '/tasks/destroy/{id:\d+}', 'TasksController@destroy');
    $r->addRoute(['GET', 'POST'], '/tasks/update-deadline/{id:\d+}', 'TasksController@updateDeadline');
    $r->addRoute(['GET', 'POST'], '/tasks/update-executor/{id:\d+}', 'TasksController@updateExecutor');
    $r->addRoute(['GET', 'POST'], '/tasks/update-status/{id:\d+}', 'TasksController@updateStatus');

    $r->addRoute(['GET', 'POST'], '/comments/create', 'CommentsController@create');


    $r->addRoute(['GET', 'POST'],'/users/login', 'UsersController@login');
    $r->addRoute(['GET', 'POST'],'/users/create', 'UsersController@create');
    $r->get('/users/logout', 'UsersController@logout');
    $r->get('/users/', 'UsersController@index');
    $r->get('/users/{id:\d+}', 'UsersController@show');




});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // ... call $handler with $vars
        list($class, $method) = explode("@", $handler, 2);
        call_user_func_array(array('App\Controllers\\'.$class, $method), $vars);
        break;
}
