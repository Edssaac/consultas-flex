<?php

namespace App\Controller\Home;

use App\Controller;

/**
 * Controller responsável por representar a página inicial.
 */
class IndexController extends Controller
{
    public function __construct()
    {
        $this->data['title'] = 'Consultas Flex';
        $this->data['content'] = 'Home/Index';
    }

    public function index(): void
    {
        session_start();

        if (isset($_SESSION['INTERNAL_SITUATION']) && $_SESSION['INTERNAL_SITUATION'] === 500) {
            $this->data['message'] = 'Não foi possível acessar o recurso no momento. 
                Tente novamente e se o erro persistir entre em contato com o suporte.
            ';

            $this->data['message_type'] = 'danger';
        }

        session_destroy();

        $this->render($this->data);
    }
}
