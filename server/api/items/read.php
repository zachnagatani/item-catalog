<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    $app->get('/api/categories', function(Request $request, Response $response) {
        $conn = Db::connect();

        // Prepare

        // Bind
        // Execute
    });
?>