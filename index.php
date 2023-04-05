<?php

require_once 'sistema/configuracao.php';
include_once 'Helpers.php';

$cpf = '004.348.491-38';

var_dump(validarCpf($cpf));

// echo $limpaNumero = preg_replace('/[^0-9]/', '', $cpf);

// Parei na aula 39
