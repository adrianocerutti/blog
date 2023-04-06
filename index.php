<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<?php

require_once 'sistema/configuracao.php';
include_once 'Helpers.php';
include './sistema/Nucleo/Mensagem.php';

$msg = new Mensagem();
echo $msg->erro('Mensagem de erro')->renderizar();
echo '<hr>';
var_dump($msg);

// Parei na aula 43
