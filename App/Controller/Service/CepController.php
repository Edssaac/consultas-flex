<?php

namespace App\Controller\Service;

use App\Controller;
use Library\ServiceManager;

/**
 * Controller responsável por representar um CEP.
 */
class CepController extends Controller
{
    public function __construct()
    {
        $this->data['title'] = 'Consultar CEP';
        $this->data['content'] = 'Service/Cep';
    }

    public function index(): void
    {
        $this->render($this->data);
    }

    public function getData(): void
    {
        $json = [];

        if (empty($_POST['requested_cep']) || !preg_match('/^\d{8}$/', $_POST['requested_cep'])) {
            $json['message'] = 'CEP inválido.';
        } else {
            $endpoint = 'https://viacep.com.br/ws/' . $_POST['requested_cep'] . '/json/';

            $response = ServiceManager::request($endpoint);

            if ($response['status'] == 200 && !isset($response['data']['erro'])) {
                $json['data'] = $response['data'];
            } else {
                $json['message'] = 'CEP não disponível.';
            }
        }

        header('Content-Type: application/json');
        echo json_encode($json);
    }
}
