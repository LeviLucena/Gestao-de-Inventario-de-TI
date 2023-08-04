-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/08/2023 às 21:41
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `inventario`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `componentes`
--

CREATE TABLE `componentes` (
  `ID` int(11) NOT NULL,
  `MARCA` varchar(100) NOT NULL,
  `MODELO` varchar(100) NOT NULL,
  `SERIE` varchar(100) NOT NULL,
  `TIPO` varchar(100) NOT NULL,
  `DESCRICAO` varchar(100) NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `OBS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `componentes`
--

INSERT INTO `componentes` (`ID`, `MARCA`, `MODELO`, `SERIE`, `TIPO`, `DESCRICAO`, `QUANTIDADE`, `OBS`) VALUES
(1, 'Marca X', 'Modelo 1', 'ABC123', 'Placa de Vídeo', 'Placa de vídeo para jogos de alta performance', 499, 'Compatível com DirectX 12'),
(2, 'Marca Y', 'Modelo 2', 'DEF456', 'Memória RAM', 'Módulo de memória DDR4 de 8GB', 89, 'Frequência de 3200MHz'),
(3, 'Marca Z', 'Modelo 3', 'GHI789', 'HD', 'Disco rígido de 1TB para armazenamento', 79, 'Velocidade de rotação de 7200RPM'),
(4, 'Marca W', 'Modelo 4', 'JKL012', 'Fonte de Alimentação', 'Fonte de alimentação de 600W certificada 80 Plus', 85, 'Ventoinha de refrigeração silenciosa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `componentes_saida`
--

CREATE TABLE `componentes_saida` (
  `COMPONENTE_ID` int(11) NOT NULL,
  `MARCA` varchar(100) NOT NULL,
  `MODELO` varchar(100) NOT NULL,
  `SERIE` varchar(100) NOT NULL,
  `TIPO` varchar(100) NOT NULL,
  `DESCRICAO` varchar(100) NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `OBS` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `componentes_saida`
--

INSERT INTO `componentes_saida` (`COMPONENTE_ID`, `MARCA`, `MODELO`, `SERIE`, `TIPO`, `DESCRICAO`, `QUANTIDADE`, `OBS`) VALUES
(1, 'Marca E', 'Modelo 5', 'YRT568', 'Processador', '4.4GHz Max Turbo Cache 18MB', 23, 'Intel Core i5-12400F');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cpu`
--

CREATE TABLE `cpu` (
  `ID` int(11) NOT NULL,
  `MARCA` varchar(100) NOT NULL,
  `MODELO` varchar(100) NOT NULL,
  `SERIE` varchar(100) NOT NULL,
  `PROCESSADOR` varchar(100) NOT NULL,
  `MEMORIA_RAM` varchar(100) NOT NULL,
  `ARMAZENAMENTO` varchar(100) NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `OBS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cpu`
--

INSERT INTO `cpu` (`ID`, `MARCA`, `MODELO`, `SERIE`, `PROCESSADOR`, `MEMORIA_RAM`, `ARMAZENAMENTO`, `QUANTIDADE`, `OBS`) VALUES
(1, 'Marca A', 'Modelo 1', 'ABC123', 'Intel Core i5-9400F', '8GB DDR4', '256GB SSD', 29, 'Clock base de 2.9GHz'),
(2, 'Marca B', 'Modelo 2', 'DEF456', 'AMD Ryzen 7 3700X', '16GB DDR4', '1TB HDD', 44, 'Clock base de 3.6GHz'),
(3, 'Marca C', 'Modelo 3', 'GHI789', 'Intel Core i7-10700K', '32GB DDR4', '512GB NVMe SSD', 59, 'Desbloqueado para overclocking'),
(4, 'Marca D', 'Modelo 4', 'JKL012', 'AMD Ryzen 5 5600X', '16GB DDR4', '500GB NVMe SSD', 34, 'Clock base de 3.7GHz');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cpu_saida`
--

CREATE TABLE `cpu_saida` (
  `CPU_ID` int(11) NOT NULL,
  `MARCA` varchar(100) NOT NULL,
  `MODELO` varchar(100) NOT NULL,
  `SERIE` varchar(100) NOT NULL,
  `PROCESSADOR` varchar(100) NOT NULL,
  `MEMORIA_RAM` varchar(100) NOT NULL,
  `ARMAZENAMENTO` varchar(100) NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `OBS` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cpu_saida`
--

INSERT INTO `cpu_saida` (`CPU_ID`, `MARCA`, `MODELO`, `SERIE`, `PROCESSADOR`, `MEMORIA_RAM`, `ARMAZENAMENTO`, `QUANTIDADE`, `OBS`) VALUES
(1, 'Marca E', 'Modelo 5', '123456789', 'Intel Core i7', '16GB DDR4', '1TB SSD', 5, 'Novo processador para a equipe de desenvolvimento.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `disco`
--

CREATE TABLE `disco` (
  `ID` int(11) NOT NULL,
  `MARCA` varchar(100) NOT NULL,
  `CAPACIDADE` varchar(100) NOT NULL,
  `VELOCIDADE` varchar(100) NOT NULL,
  `INTERFACE` varchar(100) NOT NULL,
  `CONEXAO` varchar(100) NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `OBS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `disco`
--

INSERT INTO `disco` (`ID`, `MARCA`, `CAPACIDADE`, `VELOCIDADE`, `INTERFACE`, `CONEXAO`, `QUANTIDADE`, `OBS`) VALUES
(1, 'Marca1', '1TB', '7200 RPM', 'SATA', 'Interno', 100, 'Observação 1'),
(2, 'Marca2', '2TB', '5400 RPM', 'SATA', 'Externo', 150, 'Observação 2'),
(3, 'Marca3', '500GB', '7200 RPM', 'SSD', 'Interno', 120, 'Observação 3'),
(4, 'Marca4', '4TB', '5400 RPM', 'SATA', 'Interno', 200, 'Observação 4'),
(5, 'Marca5', '1TB', '7200 RPM', 'SATA', 'Externo', 130, 'Observação 5');

-- --------------------------------------------------------

--
-- Estrutura para tabela `disco_saida`
--

CREATE TABLE `disco_saida` (
  `DISCO_ID` int(11) NOT NULL,
  `MARCA` varchar(100) NOT NULL,
  `CAPACIDADE` varchar(100) NOT NULL,
  `VELOCIDADE` varchar(100) NOT NULL,
  `INTERFACE` varchar(100) NOT NULL,
  `CONEXAO` varchar(100) NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `OBS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `disco_saida`
--

INSERT INTO `disco_saida` (`DISCO_ID`, `MARCA`, `CAPACIDADE`, `VELOCIDADE`, `INTERFACE`, `CONEXAO`, `QUANTIDADE`, `OBS`) VALUES
(1, '', 'Marca6', '3TB', '8500 RPM', 'SSD', 0, 'Observação 6');

-- --------------------------------------------------------

--
-- Estrutura para tabela `impressora`
--

CREATE TABLE `impressora` (
  `ID` int(11) NOT NULL,
  `MARCA` varchar(100) NOT NULL,
  `MODELO` varchar(100) NOT NULL,
  `SERIE` varchar(100) NOT NULL,
  `TIPO` varchar(100) NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `OBS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `impressora`
--

INSERT INTO `impressora` (`ID`, `MARCA`, `MODELO`, `SERIE`, `TIPO`, `QUANTIDADE`, `OBS`) VALUES
(1, 'Marca X', 'Modelo 1', 'ABC123', 'Jato de Tinta', 149, 'Impressora colorida com conectividade Wi-Fi'),
(2, 'Marca Y', 'Modelo 2', 'DEF456', 'Laser Monocromática', 249, 'Impressora de alta velocidade para escritórios'),
(3, 'Marca Z', 'Modelo 3', 'GHI789', 'Jato de Tinta', 99, 'Impressora multifuncional com alimentador automático de documentos'),
(4, 'Marca W', 'Modelo 4', 'JKL012', 'Laser Colorida', 399, 'Impressora de qualidade profissional para gráficos e fotos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `impressora_saida`
--

CREATE TABLE `impressora_saida` (
  `IMPRESSORA_ID` int(11) NOT NULL,
  `MARCA` varchar(100) NOT NULL,
  `MODELO` varchar(100) NOT NULL,
  `SERIE` varchar(100) NOT NULL,
  `TIPO` varchar(100) NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `OBS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `impressora_saida`
--

INSERT INTO `impressora_saida` (`IMPRESSORA_ID`, `MARCA`, `MODELO`, `SERIE`, `TIPO`, `QUANTIDADE`, `OBS`) VALUES
(1, 'Marca E', 'Modelo 5', 'YRT568', 'Matricial', 5, 'Impressora Matricial de baixa qualidade');

-- --------------------------------------------------------

--
-- Estrutura para tabela `monitor`
--

CREATE TABLE `monitor` (
  `ID` int(11) NOT NULL,
  `MARCA` varchar(100) NOT NULL,
  `MODELO` varchar(100) NOT NULL,
  `SERIE` varchar(100) NOT NULL,
  `TAMANHO` varchar(100) NOT NULL,
  `RESOLUCAO` varchar(100) NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `OBS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `monitor`
--

INSERT INTO `monitor` (`ID`, `MARCA`, `MODELO`, `SERIE`, `TAMANHO`, `RESOLUCAO`, `QUANTIDADE`, `OBS`) VALUES
(1, 'Marca A', 'Modelo 1', 'ABC123', '24 polegadas', '1920x1080', 199, 'Monitor com painel IPS'),
(2, 'Marca B', 'Modelo 2', 'DEF456', '27 polegadas', '2560x1440', 299, 'Monitor curvo com taxa de atualização de 144Hz'),
(3, 'Marca C', 'Modelo 3', 'GHI789', '32 polegadas', '3840x2160', 499, 'Monitor 4K com HDR'),
(4, 'Marca D', 'Modelo 4', 'JKL012', '21.5 polegadas', '1920x1080', 149, 'Monitor de entrada com bordas finas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `monitor_saida`
--

CREATE TABLE `monitor_saida` (
  `MONITOR_ID` int(11) NOT NULL,
  `MARCA` varchar(100) NOT NULL,
  `MODELO` varchar(100) NOT NULL,
  `SERIE` varchar(100) NOT NULL,
  `TAMANHO` varchar(100) NOT NULL,
  `RESOLUCAO` varchar(100) NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `OBS` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `monitor_saida`
--

INSERT INTO `monitor_saida` (`MONITOR_ID`, `MARCA`, `MODELO`, `SERIE`, `TAMANHO`, `RESOLUCAO`, `QUANTIDADE`, `OBS`) VALUES
(1, 'Marca E', 'Modelo 5', 'YRT568', '22.5 polegadas', '1720x1090', 9, 'Monitor de baixa qualidade');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mouse`
--

CREATE TABLE `mouse` (
  `ID` int(11) NOT NULL,
  `MARCA` varchar(100) NOT NULL,
  `MODELO` varchar(100) NOT NULL,
  `SERIE` varchar(100) NOT NULL,
  `TIPO` varchar(100) NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `OBS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `mouse`
--

INSERT INTO `mouse` (`ID`, `MARCA`, `MODELO`, `SERIE`, `TIPO`, `QUANTIDADE`, `OBS`) VALUES
(1, 'Marca X', 'Modelo 1', 'ABC123', 'Óptico', 29, 'Mouse ergonômico com fio'),
(2, 'Marca Y', 'Modelo 2', 'DEF456', 'Laser', 49, 'Mouse gamer com iluminação RGB'),
(3, 'Marca Z', 'Modelo 3', 'GHI789', 'Bluetooth', 39, 'Mouse sem fio para uso em notebooks'),
(4, 'Marca W', 'Modelo 4', 'JKL012', 'Óptico', 19, 'Mouse compacto para viagens');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mouse_saida`
--

CREATE TABLE `mouse_saida` (
  `MOUSE_ID` int(11) NOT NULL,
  `MARCA` varchar(100) NOT NULL,
  `MODELO` varchar(100) NOT NULL,
  `SERIE` varchar(100) NOT NULL,
  `TIPO` varchar(100) NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `OBS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `mouse_saida`
--

INSERT INTO `mouse_saida` (`MOUSE_ID`, `MARCA`, `MODELO`, `SERIE`, `TIPO`, `QUANTIDADE`, `OBS`) VALUES
(1, 'Marca A', 'Modelo X', 'S123', 'Tipo1', 5, 'Mouse óptico');

-- --------------------------------------------------------

--
-- Estrutura para tabela `notebook`
--

CREATE TABLE `notebook` (
  `ID` int(11) NOT NULL,
  `MARCA` varchar(100) NOT NULL,
  `MODELO` varchar(100) NOT NULL,
  `SERIE` varchar(100) NOT NULL,
  `PROCESSADOR` varchar(100) NOT NULL,
  `MEMORIA_RAM` varchar(100) NOT NULL,
  `ARMAZENAMENTO` varchar(100) NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `OBS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `notebook`
--

INSERT INTO `notebook` (`ID`, `MARCA`, `MODELO`, `SERIE`, `PROCESSADOR`, `MEMORIA_RAM`, `ARMAZENAMENTO`, `QUANTIDADE`, `OBS`) VALUES
(1, 'Marca A', 'Modelo 1', 'ABC123', 'Intel Core i5-10210U', '8GB DDR4', '256GB SSD', 89, 'Notebook leve e portátil'),
(2, 'Marca B', 'Modelo 2', 'DEF456', 'AMD Ryzen 7 4800H', '16GB DDR4', '512GB NVMe SSD', 12, 'Notebook gamer com placa de vídeo dedicada'),
(3, 'Marca C', 'Modelo 3', 'GHI789', 'Intel Core i7-1165G7', '16GB DDR4', '1TB HDD', 11, 'Notebook com tela sensível ao toque'),
(4, 'Marca D', 'Modelo 4', 'JKL012', 'AMD Ryzen 5 4500U', '8GB DDR4', '256GB SSD', 69, 'Notebook para uso geral');

-- --------------------------------------------------------

--
-- Estrutura para tabela `notebook_saida`
--

CREATE TABLE `notebook_saida` (
  `NOTEBOOK_ID` int(11) NOT NULL,
  `MARCA` varchar(100) NOT NULL,
  `MODELO` varchar(100) NOT NULL,
  `SERIE` varchar(100) NOT NULL,
  `PROCESSADOR` varchar(100) NOT NULL,
  `MEMORIA_RAM` varchar(100) NOT NULL,
  `ARMAZENAMENTO` varchar(100) NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `OBS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `notebook_saida`
--

INSERT INTO `notebook_saida` (`NOTEBOOK_ID`, `MARCA`, `MODELO`, `SERIE`, `PROCESSADOR`, `MEMORIA_RAM`, `ARMAZENAMENTO`, `QUANTIDADE`, `OBS`) VALUES
(1, 'Marca E', 'Modelo 5', 'YRT568', 'Intel Core i3-453Y', '32GB SSD', '1TB SSD', 5, 'Notebook com processamento rápido');

-- --------------------------------------------------------

--
-- Estrutura para tabela `teclado`
--

CREATE TABLE `teclado` (
  `ID` int(11) NOT NULL,
  `MARCA` varchar(100) NOT NULL,
  `MODELO` varchar(100) NOT NULL,
  `SERIE` varchar(100) NOT NULL,
  `TIPO` varchar(100) NOT NULL,
  `LAYOUT` varchar(100) NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `OBS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `teclado`
--

INSERT INTO `teclado` (`ID`, `MARCA`, `MODELO`, `SERIE`, `TIPO`, `LAYOUT`, `QUANTIDADE`, `OBS`) VALUES
(1, 'Marca A', 'Modelo 1', 'ABC123', 'Mecânico', 'ABNT2', 99, 'Teclado com iluminação LED'),
(2, 'Marca B', 'Modelo 2', 'DEF456', 'Membrana', 'ABNT2', 49, 'Teclado básico para uso doméstico'),
(3, 'Marca C', 'Modelo 3', 'GHI789', 'Mecânico', 'US', 149, 'Teclado gamer com switches Cherry MX'),
(4, 'Marca D', 'Modelo 4', 'JKL012', 'Membrana', 'ABNT2', 29, 'Teclado compacto para notebooks');

-- --------------------------------------------------------

--
-- Estrutura para tabela `teclado_saida`
--

CREATE TABLE `teclado_saida` (
  `TECLADO_ID` int(11) NOT NULL,
  `MARCA` varchar(100) NOT NULL,
  `MODELO` varchar(100) NOT NULL,
  `SERIE` varchar(100) NOT NULL,
  `TIPO` varchar(100) NOT NULL,
  `LAYOUT` varchar(100) NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `OBS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `teclado_saida`
--

INSERT INTO `teclado_saida` (`TECLADO_ID`, `MARCA`, `MODELO`, `SERIE`, `TIPO`, `LAYOUT`, `QUANTIDADE`, `OBS`) VALUES
(1, 'Marca E', 'Modelo 5', 'YRT568', 'Mecânico', 'EU', 9, 'Teclado básico para uso doméstico');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `componentes`
--
ALTER TABLE `componentes`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `componentes_saida`
--
ALTER TABLE `componentes_saida`
  ADD KEY `componente_id` (`COMPONENTE_ID`);

--
-- Índices de tabela `cpu`
--
ALTER TABLE `cpu`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `cpu_saida`
--
ALTER TABLE `cpu_saida`
  ADD KEY `CPU_ID` (`CPU_ID`);

--
-- Índices de tabela `disco`
--
ALTER TABLE `disco`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `disco_saida`
--
ALTER TABLE `disco_saida`
  ADD PRIMARY KEY (`DISCO_ID`);

--
-- Índices de tabela `impressora`
--
ALTER TABLE `impressora`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `impressora_saida`
--
ALTER TABLE `impressora_saida`
  ADD PRIMARY KEY (`IMPRESSORA_ID`);

--
-- Índices de tabela `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `monitor_saida`
--
ALTER TABLE `monitor_saida`
  ADD PRIMARY KEY (`MONITOR_ID`);

--
-- Índices de tabela `mouse`
--
ALTER TABLE `mouse`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `mouse_saida`
--
ALTER TABLE `mouse_saida`
  ADD PRIMARY KEY (`MOUSE_ID`);

--
-- Índices de tabela `notebook`
--
ALTER TABLE `notebook`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `notebook_saida`
--
ALTER TABLE `notebook_saida`
  ADD PRIMARY KEY (`NOTEBOOK_ID`);

--
-- Índices de tabela `teclado`
--
ALTER TABLE `teclado`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `teclado_saida`
--
ALTER TABLE `teclado_saida`
  ADD PRIMARY KEY (`TECLADO_ID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `componentes`
--
ALTER TABLE `componentes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cpu`
--
ALTER TABLE `cpu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `disco`
--
ALTER TABLE `disco`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `impressora`
--
ALTER TABLE `impressora`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `monitor`
--
ALTER TABLE `monitor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `mouse`
--
ALTER TABLE `mouse`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `notebook`
--
ALTER TABLE `notebook`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `teclado`
--
ALTER TABLE `teclado`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `componentes_saida`
--
ALTER TABLE `componentes_saida`
  ADD CONSTRAINT `componentes_saida_ibfk_1` FOREIGN KEY (`componente_id`) REFERENCES `componentes` (`ID`);

--
-- Restrições para tabelas `cpu_saida`
--
ALTER TABLE `cpu_saida`
  ADD CONSTRAINT `cpu_saida_ibfk_1` FOREIGN KEY (`CPU_ID`) REFERENCES `cpu` (`ID`);

--
-- Restrições para tabelas `disco_saida`
--
ALTER TABLE `disco_saida`
  ADD CONSTRAINT `disco_saida_ibfk_1` FOREIGN KEY (`DISCO_ID`) REFERENCES `disco` (`ID`);

--
-- Restrições para tabelas `impressora_saida`
--
ALTER TABLE `impressora_saida`
  ADD CONSTRAINT `impressora_saida_ibfk_1` FOREIGN KEY (`IMPRESSORA_ID`) REFERENCES `impressora` (`ID`);

--
-- Restrições para tabelas `monitor_saida`
--
ALTER TABLE `monitor_saida`
  ADD CONSTRAINT `monitor_saida_ibfk_1` FOREIGN KEY (`MONITOR_ID`) REFERENCES `monitor` (`ID`);

--
-- Restrições para tabelas `mouse_saida`
--
ALTER TABLE `mouse_saida`
  ADD CONSTRAINT `mouse_saida_ibfk_1` FOREIGN KEY (`MOUSE_ID`) REFERENCES `mouse` (`ID`);

--
-- Restrições para tabelas `notebook_saida`
--
ALTER TABLE `notebook_saida`
  ADD CONSTRAINT `notebook_saida_ibfk_1` FOREIGN KEY (`NOTEBOOK_ID`) REFERENCES `notebook` (`ID`);

--
-- Restrições para tabelas `teclado_saida`
--
ALTER TABLE `teclado_saida`
  ADD CONSTRAINT `teclado_saida_ibfk_1` FOREIGN KEY (`TECLADO_ID`) REFERENCES `teclado` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
