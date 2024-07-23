<?php

header("Content-Type: application/json");

$requestUri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));


$action = isset($requestUri[2]) ? $requestUri[2] : '';

$input = json_decode(file_get_contents('php://input'), true);


switch ($action) {
    case 'clients':
        include __DIR__ . "/clients/index.php";
        break;

        case 'usuario':
            include __DIR__ . "/usuario/index.php";
            break;

            case 'contactos':
                include __DIR__ . "/contacto/index.php";
                break;

                case 'imoveis':
                    include __DIR__ . "/imovel/index.php";
                    break;

                    
                case 'proprietarios':
                    include __DIR__ . "/proprietarios/index.php";
                    break;

                    case 'vendas':
                        include __DIR__ . "/vendas/index.php";
                        break;
                        
                        case 'funcionarios':
                            include __DIR__ . "/contacto/index.php";
                            break;
    default:
        $response = [
            'status' => 'error',
            'message' => 'Invalid Fernando TESTE',
            "input" => $input,
            "action" => $action,
            "requestUri" => $requestUri

        ];
        break;
}


echo json_encode($response);

?>