<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    $app->get('/api/categories', function(Request $request, Response $response) {
        // Call static method on Category class to retrieve all category
        $data = Category::getAll();

        $response = $response->withStatus($data['status']);
        return $response->withJson($data['data']);
    });
?>