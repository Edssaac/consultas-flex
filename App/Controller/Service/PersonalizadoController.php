<?php

namespace App\Controller\Service;

use App\Controller;
use Library\ServiceManager;

/**
 * Controller responsável por representar uma Requisição Personalizada.
 */
class PersonalizadoController extends Controller
{
    public function __construct()
    {
        $this->data["title"] = "Consulta Personalizada";
        $this->data["content"] = "Service/Personalizado";
    }

    public function index(): void
    {
        $this->render($this->data);
    }

    public function getData(): void
    {
        $json = [];

        $availableMethods = [
            1 => "GET",
            2 => "POST",
            3 => "PUT",
            4 => "DELETE",
        ];

        if (empty($_POST["requested_endpoint"]) || empty($_POST["requested_type"])) {
            $json["message"] = "Requisição inválida.";
        } else {
            $endpoint = $_POST["requested_endpoint"];
            $method = $availableMethods[$_POST["requested_endpoint"]] ?? "GET";

            $fields = !empty($_POST["requested_body"]) ? json_decode($_POST["requested_body"], true) : [];

            if (!is_array($fields)) {
                $json["message"] = "Corpo da Requisição inválido.";
            }

            $headers = !empty($_POST["requested_header"]) ? json_decode($_POST["requested_header"], true) : [];

            if (!is_array($headers)) {
                $json["message"] = "Cabeçalho da Requisição inválido.";
            }

            if (!isset($json["message"])) {
                $response = ServiceManager::request($endpoint, $method, $fields, $headers);

                $json["data"]["data"] = $response;
            }
        }

        header("Content-Type: application/json");
        echo json_encode($json);
    }
}
