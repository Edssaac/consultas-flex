<?php

namespace App\Controller\Service;

use App\Controller;
use Library\ServiceManager;

/**
 * Controller responsável por representar um DDD.
 */
class DddController extends Controller
{
    public function __construct()
    {
        $this->data["title"] = "Consultar DDD";
        $this->data["content"] = "Service/Ddd";
    }

    public function index(): void
    {
        $this->render($this->data);
    }

    public function getData(): void
    {
        $json = [];

        if (empty($_POST["requested_ddd"]) || !preg_match("/^\d{2}$/", $_POST["requested_ddd"])) {
            $json["message"] = "DDD inválido.";
        } else {
            $endpoint = "https://brasilapi.com.br/api/ddd/v1/" . $_POST["requested_ddd"];

            $response = ServiceManager::request($endpoint);

            if ($response["status"] == 200) {
                $json["data"] = $response["data"];
            } else {
                $json["message"] = "DDD não disponível.";
            }
        }

        header("Content-Type: application/json");
        echo json_encode($json);
    }
}
