<?php

namespace Paw\App\Controllers;

use Paw\Core\Controller;

class ErrorController extends Controller
{
    
    public function notFound()
    {
        $titulo = "Pagina NO Encontrada";
        http_response_code(404);
        $this->twigLoader("notFound.view.twig", compact("titulo"));
    }

    public function internalError()
    {
        $titulo = "Error Interno del Servidor";
        http_response_code(500);
        $this->twigLoader("internalError.view.twig", compact("titulo"));
    }

}