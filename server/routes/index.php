<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    $app->get('/', function(Request $request, Response $response) {
        $file = '../app/index.html';
        if (file_exists($file)) {
            return $response->write(file_get_contents($file));
        } else {
            throw new \Slim\Exception\NotFoundException($request, $response);
        }
    });
?>