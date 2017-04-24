<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    $app->get('/api/categories', function(Request $request, Response $response) {
        // Call static method on Category class to retrieve all category
        $data = Category::getAll();

        $response = $response->withStatus($data['status']);
        return $response->withJson($data['data']);
    });

    $app->get('/api/categories/{categoryID}', function(Request $request, Response $response) {
        // Create new category instance
        $category = new Category($request->getAttribute('categoryID'));

        // Get all items that belong to category
        $data = $category->getItems();

        $response = $response->withStatus($data['status']);
        return $response->withJson($data['data']);
    });
?>