<?php

namespace sistema\Controlador;

use sistema\Nucleo\Controlador;

class SiteControlador extends Controlador
{
    public function __construct()
    {
        parent::__construct('templates/site/views');
    }

    public function index(): void
    {
       echo $this->template->renderizar('index.html', [
        'titulo' => 'teste de título',
        'subtitulo' => 'teste de subtítulo'
       ]);
    }

    public function sobre(): void
    {
        echo $this->template->renderizar('sobre.html', [
            'titulo' => 'teste de título sobre',
            'subtitulo' => 'teste de subtítulo sobre'
           ]);
    }
}