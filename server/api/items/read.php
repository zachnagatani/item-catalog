<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    $app->get('/api/items', function(Request $request, Response $response) {
        // Call static method on Item class to retrieve all items
        $data = Item::getAll();

        // Return data
        $response = $response->withStatus($data['status']);
        return $response->withJson($data['data']);
    });

    $app->get('/api/items/{id}', function(Request $request, Response $response) {
        // Call static method on Item class to retrieve requested item
        // according to provided id
        $data = Item::getOne($request->getAttribute('id'));

        // Return data
        $response = $response->withStatus($data['status']);
        return $response->withJson($data['data']);
    });
?>