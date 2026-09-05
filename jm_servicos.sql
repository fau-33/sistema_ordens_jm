-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/09/2026 às 16:12
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jm_servicos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `service`
--

CREATE TABLE `service` (
  `id_service` bigint(20) NOT NULL,
  `name_client` varchar(150) DEFAULT NULL,
  `car_plate` varchar(20) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `service`
--

INSERT INTO `service` (`id_service`, `name_client`, `car_plate`, `price`, `date`, `status`) VALUES
(1, 'Maria da Silva', 'DEF-9876', 250.00, '2026-09-02 18:39:41', 'Finalizado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `id_user` bigint(20) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `password`, `created_at`, `update_at`, `ativo`) VALUES
(1, 'Funcionario Teste', 'teste@jm.com', '123456', '2026-09-02 13:03:17', NULL, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `service`
--
ALTER TABLE `service`
  MODIFY `id_service` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
