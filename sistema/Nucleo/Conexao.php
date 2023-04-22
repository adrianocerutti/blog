<?php

namespace sistema\Nucleo;

use PDO;
use PDOException;

/**
 * Classe Conexao - Padrão Singleton: Retorna uma instância única de uma classe
 */

class Conexao
{
    private static $instancia;

    public static function getInstancia(): PDO
    {
        if (empty(self::$instancia)) {

            try {
                self::$instancia = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NOME, DB_USUARIO, DB_SENHA, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::ATTR_CASE => PDO::CASE_NATURAL
                ]);
            } catch (PDOException $ex) {
                die('Erro de conexão:: ' . $ex->getMessage());
            }

            return self::$instancia;
        }
    }

    protected function __construct()
    {
    }

    private function __clone(): void
    {
    }
}
