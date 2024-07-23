<?php

require_once __DIR__ . '/../../controllers/imovelControllers.php';

header("Content-Type: application/json");

// Get the request method
$method = $_SERVER['REQUEST_METHOD'];

// Get the request URI and split it into parts
$requestUri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

// Get the action from the request URI
$action = isset($requestUri[3]) ? $requestUri[3] : '';

// Get the input data
$input = json_decode(file_get_contents('php://input'), true);

$imovel = new ImovelController();

// Route the request
switch ($action) {
    case 'create':
        if ($method == 'POST') {
            $response = $imovel->create($input);
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Método de requisição inválido'
            ];
        }
        break;

    case 'list':
        if ($method == 'GET') {
            $response = $imovel->list();
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Método de requisição inválido'
            ];
        }
        break;

    default:
        $response = [
            'status' => 'error',
            'message' => 'Rota inválida',
        ];

        break;
}

// Send the response
echo json_encode($response);

?>
