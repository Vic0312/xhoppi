-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Jun-2026 às 18:54
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `xhoppi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `cpf` varchar(15) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `sobrenome` varchar(60) NOT NULL,
  `dataNasc` date NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `foto_perfil` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cpf`, `nome`, `sobrenome`, `dataNasc`, `telefone`, `email`, `senha`, `foto_perfil`) VALUES
('111.111.111-11', 'Maria', 'Silva', '2007-07-07', '18997280950', 'maria@gmail.com', '12345', NULL),
('33333333333', 'Luzia', 'Alves', '1990-05-07', '18992222222', 'luzia@gmail.com', '1234', 0x66756e646f2e6a7067);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `cpf` varchar(15) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `sobrenome` varchar(60) NOT NULL,
  `dataNasc` date NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `salario` decimal(10,2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `foto_perfil` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`cpf`, `nome`, `sobrenome`, `dataNasc`, `telefone`, `cargo`, `salario`, `email`, `senha`, `foto_perfil`) VALUES
('33344455523', 'Maria', 'Brito', '2007-12-31', '1899568934', 'Gerente', '3000.00', 'maria@gmail.com', '123', 0x706573736f61616c6561746f7269612e61766966),
('55555555555', 'Elizabeth', 'Gonçalves', '1980-06-18', '18995234567', 'Diretora', '8224.00', 'elizabeth@gmail.com', '12345', 0x66756e646f2e6a7067);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_prod` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `fabricante` varchar(60) NOT NULL,
  `descricao` text NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `foto_prod` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_prod`, `nome`, `fabricante`, `descricao`, `valor`, `quantidade`, `foto_prod`) VALUES
(1, 'Perfume Egeo', 'Oboticario', 'Perfume Frutado', '105.00', 100, 0x75706c6f6164732f70726f6475746f732f366131646236323234363835395f70657266756d654567656f2e6a666966),
(2, 'Perfume arabe', 'Arábe', 'Sei não', '500.00', 200, 0x75706c6f6164732f70726f6475746f732f366131646236643964303766315f70657266756d655f61726162652e77656270),
(3, 'Ner Tamid', 'Não sei', 'Sei la', '115.00', 150, 0x75706c6f6164732f70726f6475746f732f366131646237333961306634385f6e657274616d69642e6a706567),
(4, 'Royage', 'Não sei', 'Sei la', '300.00', 280, 0x75706c6f6164732f70726f6475746f732f366131646238303638626231635f726f796167652e6a7067);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_prod`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
