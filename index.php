<?php

require_once(__DIR__ . "/system/vendor/autoload.php");

use Library\Log;

set_exception_handler(function (Throwable $exception) {
    Log::write(sprintf(
        "Exceção: %s - Arquivo: %s - Linha: %s",
        $exception->getMessage(),
        $exception->getFile(),
        $exception->getLine()
    ));

    session_start();

    $_SESSION["INTERNAL_SITUATION"] = 500;

    header("Location: /");
});

set_error_handler(function ($errorLevel, $errorMessage, $errorFile, $errorLine) {
    if (error_reporting() === 0) {
        return false;
    }

    switch ($errorLevel) {
        case E_NOTICE:
        case E_USER_NOTICE:
            $error = "Notice";
            break;
        case E_WARNING:
        case E_USER_WARNING:
            $error = "Warning";
            break;
        case E_ERROR:
        case E_USER_ERROR:
            $error = "Fatal Error";
            break;
        default:
            $error = "Unknown";
            break;
    }

    Log::write(sprintf(
        "%s: %s - Arquivo: %s - Linha: %s",
        $error,
        $errorMessage,
        $errorFile,
        $errorLine
    ));

    return true;
});

function handleRoute()
{
    $requestUri = $_SERVER["REQUEST_URI"];
    $url = parse_url(trim($requestUri, "/"), PHP_URL_PATH);
    $urlParts = explode("/", $url);

    $path = [
        "controller"    => !empty($urlParts[0]) ? strtolower($urlParts[0]) : "home",
        "class"         => !empty($urlParts[1]) ? strtolower($urlParts[1]) : "index",
        "method"        => !empty($urlParts[2]) ? strtolower($urlParts[2]) : "index",
    ];

    // Criar o controlador de forma dinâmica
    $formattedPath = implode("/", [
        "App/Controller",
        ucfirst($path["controller"]),
        ucfirst($path["class"]) . "Controller.php"
    ]);

    // Verificar se o controlador existe
    if (!file_exists($formattedPath)) {
        header("Location: /");
    }

    $request = file_get_contents("php://input");

    if (empty($_POST) && !empty($request)) {
        $_POST = json_decode($request, true);
    }

    if (empty($_POST)) {
        $path["method"] = "index";
    }

    include_once($formattedPath);

    $controllerClass = implode("\\", [
        "App\\Controller",
        ucfirst($path["controller"]),
        ucfirst($path["class"]) . "Controller"
    ]);

    $controllerObject = new $controllerClass();

    // Verificar se o método existe no controlador
    if (method_exists($controllerObject, $path["method"])) {
        if (!defined("SCHOOL_NAME")) {
            define("SCHOOL_NAME", "Escola");
        }

        // Chamar o método do controlador
        call_user_func(array($controllerObject, $path["method"]));
    } else {
        header("Location: /");
    }
}

handleRoute();
