<?php

require_once __DIR__ . '/../../controllers/clienteControllers.php';

header("Content-Type: application/json");

// Get the request method
$method = $_SERVER['REQUEST_METHOD'];

// Get the request URI and split it into parts
$requestUri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

// Get the action from the request URI
$action = isset($requestUri[3]) ? $requestUri[3] : '';

// Get the input data
$input = json_decode(file_get_contents('php://input'), true);

$client = new ClientController();

// Route the request
switch ($action) {
    case 'create':
        if ($method == 'POST') {
            $response = $client->create($input);
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Metodo de requisicao invalido'
            ];
        }
        break;

    case 'list':
        if ($method == 'GET') {
            $response = $client->list();
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Metodo de requisicao invalido'
            ];
        }
        break;

    default:
        $response = [
            'status' => 'error',
            'message' => 'Rota invalida',
        ];

        break;
}

// Send the response
echo json_encode($response);

?>