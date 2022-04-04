-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Abr-2022 às 23:38
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `blog_bis2bis`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `admin_user`
--

INSERT INTO `admin_user` (`id`, `user_name`, `name`, `email`, `is_active`, `password`, `created_at`) VALUES
(1, 'hamiltonf', 'hamilton freire', 'milton.fan2323@hotmail.com232', 0, '$2y$10$W.Tq55yziOqdP43O4N7TieFIwNYE81UJnm8gytIdVnQS38Ad83Ary', '2022-03-31 17:38:46'),
(2, 'hamilton', 'Hamilton Freire', 'milton.fan@hotmail.com', 0, '$2y$10$9b7TXE/ipZUJp8KC2Vk7yu0wF3T6BHOv2sMkUtb4AD02zQmHkoFHq', '2022-03-31 17:47:35'),
(3, 'hamiltonf', 'Hamilton freire de andrade neto', 'milton.fan@hotmail.com4234234', 0, '$2y$10$f3d9tzFp1ToVb4wpcHl1KeaaS20nA2SzmsjslVeuCUXTJhLeGA652', '2022-03-31 17:50:19'),
(4, 'hamiltonf123', 'Hamilton freire de andrade neto', 'milton.fan@hotmail.com12345124124', 0, '$2y$10$DzM15RtJXEKR.iHSdjcHmOiimlZMR0igBkQ6ky9kEEuxu6qztOUMu', '2022-03-31 18:05:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tittle` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Hamilton freire de andrade neto', 'milton.fan@hotmail.com', '$2y$10$q3CpDH2LkrbZif/OYjZ5Y..FlBOyePHW9edlWCtRkaAjdWGwFBS76', '2022-03-27 00:40:43'),
(2, 'hamilton freire', 'hamiltonfreire.a@gmail.com', '$2y$10$eXKR9QLsxyE29QE8mvdU5.LqIb2R/JFKKScn9QhY6tu0bqgTmuiye', '2022-03-27 14:35:40'),
(6, 'hamilton freire', 'teste@teste.com', '$2y$10$aUS6q6uthQzGxYceEvQnEOexdlcModmaTbU8co1FWBNFLxZWRev9u', '2022-03-27 14:36:49'),
(7, 'hamilton freire', 'teste@teste.com.br', '$2y$10$mm4O6lexdvAWvGexqHNsR.OprdefxfeLPq.LDc5WE7bxl0q6Qfz52', '2022-03-27 14:40:41'),
(8, 'hamilton', 'teste@testeteste.com', '$2y$10$HhW0d9c9cASTGL8woTDECugrzoTL15Lqn3W.4/hY6Eq1VecsMDBXy', '2022-03-27 14:42:13'),
(9, 'testeste', 'testesteste@bis2bis.com', '$2y$10$4wuIx3kL0rmUhWLxxDiWkeqeOiY4FxTMweoEKWcOwgLyA8R//Z3Ri', '2022-03-27 14:43:56'),
(10, 'testeste', 'testesteste@bis2bis.com', '$2y$10$96L1utQinzxTeA.8RmObBuiz4TzLqVCB3Uu1LN0dB9pRmOALpk2/y', '2022-03-27 14:48:38'),
(11, 'Hamilton freire de andrade neto', 'milton.fan@hotmail.com', '$2y$10$sS7qcC9wAEZS6HFNV8z5YuFvOq7Nq8rhfKLJJIneywdql9TFyaWGq', '2022-03-27 14:49:56'),
(12, 'Hamilton freire de andrade neto', 'milton.fan1@hotmail.com', '$2y$10$C8ytUPGs/CgGWO8bLbsdkOv1.JgWi.FqmCcrVmycVJiQHoSjY2bZC', '2022-03-27 14:50:37'),
(13, 'Hamilton freire de andrade neto', 'milton.fan2@hotmail.com', '$2y$10$SYn6eZS0ZyTbBft14sSrQOgQWIJdxmfJCZtVHYjJn7reJ28fLfnC.', '2022-03-27 14:51:21'),
(14, 'Hamilton freire de andrade neto', 'milton.fan3@hotmail.com', '$2y$10$RKEFEs9UqTtLJmsxgt4vjOCPtIrqC8P7u64iUqYRrCWf2jY32uaRS', '2022-03-27 14:53:42'),
(15, 'Hamilton freire de andrade neto', 'milton.fan@hotmail.com', '$2y$10$iMA0dwgCf1RnPFVhEa//tOUV8q5Wt2V20Qu9tdqjAVN2oGCuN9o5m', '2022-03-27 14:54:34'),
(16, 'Hamilton freire de andrade neto', 'milton.fan@hotmail.com', '$2y$10$5ZhubsHcHW9TTFsDLOwRee52Rj8c/TKfC88VAmMSQBcS.WAGWJUrC', '2022-03-27 14:54:48'),
(17, 'Hamilton freire de andrade neto', 'milton.fan5@hotmail.com', '$2y$10$40mP1DEfMjZnz25YfSQDBuLl.qx8G54ffR2QD/nwroXETrCJbuPlu', '2022-03-27 14:56:33'),
(18, 'Hamilton freire de andrade neto', 'milton.fan6@hotmail.com', '$2y$10$ahi6f2Mw0q6RxROL0CoMoepGKrP.Dw03rTlREWavdBT/HZ.3bL2Hq', '2022-03-27 14:58:07'),
(19, 'Hamilton freire de andrade neto', 'milton.fan9@hotmail.com', '$2y$10$uBLDi54yoRkFUoN7hfWcLOsBteEbCaKkeX3WaYAnZ.GMITrR3Yi0C', '2022-03-27 15:01:46'),
(20, 'Hamilton freire de andrade neto', 'milton.fan10@hotmail.com', '$2y$10$A.tJAzc9782eXrV0iSbr4eOtumvoRulTf14UxosoUFbuectUTUXCO', '2022-03-27 15:06:06');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
