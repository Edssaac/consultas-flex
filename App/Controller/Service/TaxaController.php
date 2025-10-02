<?php

namespace App\Controller\Service;

use App\Controller;
use Library\ServiceManager;

/**
 * Controller responsável por representar uma Taxa.
 */
class TaxaController extends Controller
{
    public function __construct()
    {
        $this->data["title"] = "Consultar Taxa";
        $this->data["content"] = "Service/Taxa";
    }

    public function index(): void
    {
        $endpoint = "https://brasilapi.com.br/api/taxas/v1";

        $response = ServiceManager::request($endpoint);

        if ($response["status"] == 200) {
            $this->data["taxas"] = $response["data"];
        } else {
            $this->data["taxas"] = [];
        }

        $this->render($this->data);
    }

    public function getData(): void
    {
        $json = [];

        if (empty($_POST["requested_taxa"])) {
            $json["message"] = "Taxa inválida.";
        } else {
            $endpoint = "https://brasilapi.com.br/api/taxas/v1/" . $_POST["requested_taxa"];

            $response = ServiceManager::request($endpoint);

            if ($response["status"] == 200) {
                $json["data"] = $response["data"];
            } else {
                $json["message"] = "Taxa não disponível.";
            }
        }

        header("Content-Type: application/json");
        echo json_encode($json);
    }
}
