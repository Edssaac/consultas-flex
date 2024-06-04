<?php

namespace App\Controller\Service;

use App\Controller;
use Library\ServiceManager;

/**
 * Controller responsável por representar um CNPJ.
 */
class CnpjController extends Controller
{
    public function __construct()
    {
        $this->data['title'] = 'Consultar CNPJ';
        $this->data['content'] = 'Service/Cnpj';
    }

    public function index(): void
    {
        $this->render($this->data);
    }

    public function getData(): void
    {
        $json = [];

        if (empty($_POST['requested_cnpj']) || !preg_match('/^\d{14}$/', $_POST['requested_cnpj'])) {
            $json['message'] = 'CNPJ inválido.';
        } else {
            $endpoint = 'https://api-publica.speedio.com.br/buscarcnpj?cnpj=' . $_POST['requested_cnpj'];

            $response = ServiceManager::request($endpoint);

            if ($response['status'] == 200 && !isset($response['data']['error'])) {
                $json['data'] = $response['data'];
            } else if ($response['status'] == 503) {
                $json['message'] = $response['data']['detail'];
            } else {
                $json['message'] = 'CNPJ não disponível.';
            }
        }

        header('Content-Type: application/json');
        echo json_encode($json);
    }
}
