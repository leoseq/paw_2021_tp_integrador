<?php

namespace Paw\App\Controllers;


use Paw\Core\Controller;
use Paw\App\Models\Turno;


class PageController extends Controller
{

    public function index()
    {
        $tituloPage = "Index";
        $tituloView = "JUEGO DEL PARAMESIO"; 
        $this->twigLoader("index.view.twig", compact("tituloPage", "tituloView"));
    }

    public function introduccion()
    {
        $tituloPage = "Introduccion";
        $tituloView = "VIDEO/ANIMACIÓN DEL PARAMESIO"; 
        $this->twigLoader("introduccion.view.twig", compact("tituloPage", "tituloView"));
    }

    public function controles()
    {
        $tituloPage = "Controles";
        $tituloView = "CONTROLES"; 
        $this->twigLoader("controles.view.twig", compact("tituloPage", "tituloView"));
    }

    public function seleccion()
    {
        $tituloPage = "Seleccion";
        $tituloView = "SELECCIONÁ TU JUGADOR"; 
        $this->twigLoader("seleccion.view.twig", compact("tituloPage", "tituloView"));
    }

    public function jugar()
    {
        $tituloPage = "Jugar";
        $tituloView = "JUEGO"; 
        $this->twigLoader("jugar.view.twig", compact("tituloPage", "tituloView"));
    }

    public function finJuego()
    {
        $tituloPage = "Juego Finalizado";
        $tituloView = "RESULTADOS"; 
        $this->twigLoader("finJuego.view.twig", compact("tituloPage", "tituloView"));
    }
}