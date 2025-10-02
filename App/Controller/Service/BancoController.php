<?php

namespace App\Controller\Service;

use App\Controller;
use Library\ServiceManager;

/**
 * Controller responsável por representar um Banco.
 */
class BancoController extends Controller
{
    public function __construct()
    {
        $this->data["title"] = "Consultar Banco";
        $this->data["content"] = "Service/Banco";
    }

    public function index(): void
    {
        $endpoint = "https://brasilapi.com.br/api/banks/v1";

        $response = ServiceManager::request($endpoint);

        if ($response["status"] == 200) {
            $this->data["banks"] = $this->sortAndFilterArray($response["data"]);
        } else {
            $this->data["banks"] = [];
        }

        $this->render($this->data);
    }

    private function sortAndFilterArray(array $array): array
    {
        setlocale(LC_COLLATE, "pt_BR.UTF-8");

        $array = array_filter($array, function ($item) {
            return $item["code"] !== NULL && $item["fullName"] !== NULL;
        });

        usort($array, function ($a, $b) {
            return strcoll($a["fullName"], $b["fullName"]);
        });

        return $array;
    }

    public function getData(): void
    {
        $json = [];

        if (empty($_POST["requested_bank"]) || !preg_match("/^\d{1,3}$/", $_POST["requested_bank"])) {
            $json["message"] = "Banco inválido.";
        } else {
            $endpoint = "https://brasilapi.com.br/api/banks/v1/" . $_POST["requested_bank"];

            $response = ServiceManager::request($endpoint);

            if ($response["status"] == 200) {
                $json["data"] = $response["data"];
            } else {
                $json["message"] = "Banco não disponível.";
            }
        }

        header("Content-Type: application/json");
        echo json_encode($json);
    }
}
