<?php

use Phalcon\Loader;
use Phalcon\Mvc\Micro;
use Phalcon\Db\Exception;
use Phalcon\Http\Response;
use Phalcon\Db\Enum as Db;
use Phalcon\Di\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Factory;
use Phalcon\Db\Adapter\Pdo\Mysql as MysqlConnection;

require ("./controllers/ApiController.php");
require ("./models/Jobs.php" );

$loader = new Loader();
$loader->registerNamespaces([
        'MyApp\Models' => __DIR__ . '/models/',
]);
$loader->register();

$di = new FactoryDefault();
$di->set('db', function () {
    return new MysqlConnection([
        "host"     => "localhost",
        "username" => "root",
        "password" => "R00t//v3",
        "dbname"   => "test"
    ]);
});

function getUriToHandle() {
	return substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['REQUEST_URI'], '/'));
} 

$uri = getUriToHandle();

$di->set('uri', function () use ($uri) {return $uri;});

$app = new Micro($di);

$app->post(
    '/addJob',
    function() use($app) {
        $job        = $app->request->getJsonRawBody();
        $controller = new ApiController();
        return $controller->insert($job);
    }
);

$app->get(
    '/getAll',
    function() use($app) {
        $controller = new ApiController();
        return $controller->getAll();
    }
);

$app->delete(
    '/delete/{id:[0-9]+}',
    function($id) use($app) {
        $controller = new ApiController();
        return $controller->deleteJob($id);
    }
);

$app->notFound(function () use ($app) {
    $app->response->setStatusCode(404, "Not Found")->sendHeaders();
    echo 'not  found !';
});

$app->handle(
    $uri
);