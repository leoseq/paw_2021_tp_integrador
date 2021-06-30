<?php

namespace Paw\App\Controllers;


use Paw\Core\Controller;
use Paw\App\Models\Turno;


class PageController extends Controller
{

    public function index()
    {
        $titulo = "Index";
        $this->twigLoader("index.view.twig", compact("titulo"));
    }

    public function introduccion()
    {
        $titulo = "Introduccion";
        $this->twigLoader("introduccion.view.twig", compact("titulo"));
    }

    public function controles()
    {
        $titulo = "Controles";
        $this->twigLoader("controles.view.twig", compact("titulo"));
    }

    public function seleccion()
    {
        $titulo = "Seleccion";
        $this->twigLoader("seleccion.view.twig", compact("titulo"));
    }

    public function jugar()
    {
        $titulo = "Jugar";
        $this->twigLoader("jugar.view.twig", compact("titulo"));
    }
}