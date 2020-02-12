<?php 

require_once(__DIR__ . '/api/user/index.php');

function substring($string, $start, $end) {
    return substr($string, $start, $end - $start);
}

$uri = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];
$query = $_SERVER["QUERY_STRING"];

$request = str_replace("/rest/", "", $uri);
$endpoint = substring($request, 0, strpos($request, "/"));
$pathParam = substring($request, strpos($request, "/") , strpos($request, "?") > 0 ? strpos($request, "?") : strlen($request));
$queryParam = strpos($request, "?") > 0 ? substring($request, strpos($request, "?"), strlen($request)) : "";

$body = file_get_contents("php://input");

$requestObject = array(
    "method" => $method,
    "endpoint" => $endpoint,
    "pathParam" => $pathParam,
    "queryParam" => $queryParam,
    "body" => $body
);
// echo json_encode($requestObject);

switch ($endpoint) {
    case "user":
        $userController = new UserController();
        $userController->handleRequest($requestObject);
        break;
    case "module":
        echo "module";
        break;
    default:
        echo "ferrou";
        break;
}
