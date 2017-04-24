<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    $app->post('/api/items/create', function(Request $request, Response $response) {
        // Insantiate new item and call its create method
        // to attempt to save to database
        $item = new Item(
            $request->getParam('itemName'),
            $request->getParam('description'),
            $request->getParam('categoryName')
        );
        $data = $item->create();

        // Alert the user of success or failure with proper status code
        $response = $response->withStatus($data['status']);
        return $response->withJson($data['data']);
    });
?>