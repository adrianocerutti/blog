-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 27/04/2023 às 12:44
-- Versão do servidor: 10.11.2-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `blog`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `texto` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`id`, `titulo`, `texto`, `status`) VALUES
(1, 'Tecnologia', 'Tudo sobre Tecnologia você encontra aqui', 1),
(2, 'PHP', 'Tudo sobre PHP você encontra aqui', 1),
(3, 'Segurança', 'Tudo sobre Segurança você encontra aqui', 1),
(4, 'MYSQL', 'Tudo sobre MYSQL você encontra aqui', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `texto` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `posts`
--

INSERT INTO `posts` (`id`, `categoria_id`, `titulo`, `texto`, `status`) VALUES
(1, 2, 'O que é um sistema MVC?', 'O MVC é uma sigla do termo em inglês Model (modelo) View (visão) e Controller (Controle) que facilita a troca de informações entre a interface do usuário aos dados no banco, fazendo com que as respostas sejam mais rápidas e dinâmicas.', 1),
(2, 2, 'O que o PHP pode fazer?', 'Qualquer coisa. O PHP é focado principalmente nos scripts do lado do servidor, portanto, você pode fazer qualquer coisa que outro programa CGI pode fazer: coletar dados de formulários, gerar páginas com conteúdo dinâmico ou enviar e receber cookies. Mas o PHP pode fazer muito mais.', 1),
(3, 1, 'O que é o PHP?', 'O PHP (um acrônimo recursivo para PHP: Hypertext Preprocessor) é uma linguagem de script open source de uso geral, muito utilizada, e especialmente adequada para o desenvolvimento web e que pode ser embutida dentro do HTML.', 1),
(4, 3, 'PDO (PHP Data Object)', 'É uma extensão da linguagem PHP para acesso a banco de dados. Totalmente orientado a objetos ele possui diversos recursos importantes, além de suporte a diversos mecanismos de banco de dados.', 1),
(5, 4, 'O que é o MySQL?', 'O MySQL é um sistema open-source de gerenciamento de base de dados relacional SQL, desenvolvido e suportado pela Oracle.', 1),
(6, 2, 'O que é Twig?', 'Twig é uma engine de templates PHP baseado no modelo MVC, os criadores do Twig também são responsáveis pelo Symfony framework. O objetivo do Twig é otimizar o código-fonte tornando-o visualmente mais elegante, em outras palavras o Twig procura separar o código-fonte do HTML. Seguindo o modelo MVC para criar separações claras entre Model, Controller da View.', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`categoria_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
