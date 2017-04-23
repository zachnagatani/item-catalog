<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    $app->patch('/api/items/update/{id}', function(Request $request, Response $response) {
        // Insantiate new item and call its create method
        // to attempt to save to database
        $item = new Item(
            $request->getParam('itemName'),
            $request->getParam('description')
        );
        $data = $item->update($request->getAttribute('id'));

        // Alert the user of success or failure with proper status code
        $response->withStatus($data['status']);
        return $response->withJson($data['data']);
    });
?>