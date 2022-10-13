-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Out-2022 às 03:21
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `trabalhobd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `republica`
--

CREATE TABLE `republica` (
  `id_rep` int(11) NOT NULL,
  `republica` varchar(45) NOT NULL,
  `imagem` longtext NOT NULL,
  `endereço` longtext NOT NULL,
  `cep` int(11) NOT NULL,
  `cidade` longtext NOT NULL,
  `preço` int(4) NOT NULL,
  `genero` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `republica`
--

INSERT INTO `republica` (`id_rep`, `republica`, `imagem`, `endereço`, `cep`, `cidade`, `preço`, `genero`) VALUES
(42, 'Rep TS', 'be9e8e4cb739da151c8b24b0021a2b7f.png', 'Rua Alberto Sharlet', 35702265, 'João Monlevade', 290, 'masculino'),
(43, 'Rep Fabs', '83c128ba21eebd7ce9fe6b2b02500361.png', 'Rua Tangente', 34243445, 'João Monlevade', 330, 'masculino'),
(45, 'Tribal', '', 'R. José Silvério, 143a', 35164465, 'João Monlevade', 320, 'masculino'),
(46, 'Casildis', '2bdbda551444c651ce04517f3891f553.png', 'R. Dr. Mascarenhas, 2-114', 35167935, 'João Monlevade', 400, 'masculino'),
(47, 'Xilicas', '2bdbda551444c651ce04517f3891f553.png\r\n', 'R. São Jerônimo, 319 ', 34164974, 'João Monlevade', 350, 'feminino'),
(48, 'Castelo', '6a85278d1962dfbfa4565f4c77188eec.png', 'R. Santa Rita, 254', 35930674, 'João Monlevade', 600, 'feminino');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `telefone`) VALUES
(42, 'Felipe Victor', 'lipe0.9@hotmail.com', 'felipe0.911', '(31) 99889-9344'),
(43, 'Fabs', 'fabs@hotmail.com', '1234', '(31) 98457-0897'),
(44, 'Matheus Abelardo Trevenzole Araujo', 'matheusabelardo12@hotmail.com', '1234', '(31) 983410907'),
(45, 'Ryan Rezende', 'RyanRezende@hotmail.com', '1234', '(31)96784-9867'),
(46, 'Danilo Nascimento Jesus', 'DaniloNascimento@hotmail.com', '1234', '(31) 96463-7635'),
(47, 'Julia Viana da Silva', 'Juliaviana@hotmail.com', '1234', '(31) 98541-0907'),
(48, 'Bárbara Novaes Da cunha', 'BarbaraNovaes@hotmail.com', '1234', '(31)96584-9867');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `republica`
--
ALTER TABLE `republica`
  ADD PRIMARY KEY (`id_rep`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`,`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `republica`
--
ALTER TABLE `republica`
  MODIFY `id_rep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `republica`
--
ALTER TABLE `republica`
  ADD CONSTRAINT `rep_associada` FOREIGN KEY (`id_rep`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
