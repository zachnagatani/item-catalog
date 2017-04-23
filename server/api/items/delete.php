<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    $app->delete('/api/items/delete/{id}', function(Request $request, Response $response) {
        // Delete item from database
        $data = Item::delete($request->getAttribute('id'));

        // Alert the user of success or failure with proper status code
        $response = $response->withStatus($data['status']);
        return $response->withJson($data['data']);
    });
?>