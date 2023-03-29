<?php

    function url(string $url): string
    {
        $servidor = filter_input(INPUT_SERVER, 'SERVER_NAME');
        $ambiente = ($servidor == 'localhost') ? URL_DESENVOLVIMENTO : URL_PRODUCAO;

        if(str_starts_with($url, '/')) {
            return $ambiente.$url;
        }

        return $ambiente.'/'.$url;
    }

    function localhost(): bool
    {
        $servidor = filter_input(INPUT_SERVER, 'SERVER_NAME');

        if($servidor == 'localhost') {
            return true;
        }

        return false;
    }

    /**
     * Valida uma url
     * @param string url
     * @return bool
     */
    function validarUrl(string $url) : bool
    {
        if(mb_strlen($url) < 10) {
            return false;
        }
        if(!str_contains($url, '.')) {
            return false;
        }
        if(str_contains($url, 'http://') or str_contains($url, 'https://')) {
            return true;
        }

        return false;
    }

    function validarUrlComFiltro(string $url) : bool
    {
        return filter_var($url, FILTER_VALIDATE_URL);
    }

    function validarEmail(string $email) : bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Conta o tempo decorrido de uma data
     * @param string $data
     * @return string
     */
    function contarTempo(string $data) : string
    {
        $agora = strtotime(date('Y-m-d h:i:s'));
        $tempo = strtotime($data);
        $diferenca = $agora - $tempo;

        $segundos = $diferenca;
        $minutos = round($diferenca / 60);
        $horas = round($diferenca / 3600);
        $dias = round($diferenca / 86400);
        $semanas = round($diferenca / 604800);
        $meses = round($diferenca / 2419200);
        $anos = round($diferenca / 29030400);

        if($segundos <= 60) {
            return 'agora';
        }elseif($minutos <= 60) {
            return $minutos == 1 ? 'há 1 minuto' : 'há '.$minutos.' minutos';
        }elseif($horas <= 24) {
            return $horas == 1 ? 'há 1 hora' : 'há '.$horas.' horas';
        }elseif($dias <= 7) {
            return $dias == 1 ? 'há 1 dia' : 'há '.$dias.' dias';
        }elseif($semanas <= 4) {
            return $semanas == 1 ? 'há 1 semana' : 'há '.$semanas.' semanas';
        }elseif($meses <= 12) {
            return $meses == 1 ? 'há 1 mês' : 'há '.$meses.' meses';
        }else {
            return $anos == 1 ? 'há 1 ano' : 'há '.$anos.' anos';
        }
    }

    /**
     * Formata um valor com ponto e vírgula
     * @param float $valor
     * @return string
     */
    function formatarValor(float $valor = null):string
    {
        return number_format(($valor ? $valor : 0), 2, ",", ".");
    }

    /**
     * Formata um número com pontos
     * @param int $numero
     * @return string
     */
    function formatarNumero(string $numero = null)
    {
        return number_format($numero ? $numero : 0, 0, ".", ".");
    }

    /**
     * Saudação de acordo com o horário
     * @return string saudacao
     */
    function saudacao(): string
    {
        $hora = date('H:i:s');

        if($hora >= 0 && $hora <= 5){
            $saudacao = 'boa madrugada';
        }
        elseif($hora >= 6 && $hora <= 12){
            $saudacao = 'bom dia';
        }
        elseif($hora >= 13 && $hora <= 18)
        {
            $saudacao = 'boa tarde';
        }
        else {
            $saudacao = 'boa noite';
        }
        return $saudacao;
    }

    /**
     * Resume um texto
     * 
     * @param string $texto
     * @param int $limite
     * @param string $continue
     */
    function resumirTexto(string $texto, int $limite, string $continue = "..."): string
    {
        $textoLimpo = trim(strip_tags($texto));
        if(mb_strlen($textoLimpo) <= $limite) {
            return $textoLimpo;
        }

        $resumirTexto = mb_substr($textoLimpo, 0, mb_strrpos(mb_substr($textoLimpo, 0, $limite), ''));
        return $resumirTexto.$continue;
    }