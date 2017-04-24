<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    $app->get('/api/items', function(Request $request, Response $response) {
        // Connect to database
        $db = Db::connect();

        $data = Item::getAll();

        $response = $response->withStatus($data['status']);
        return $response->withJson($data['data']);
    });
?>