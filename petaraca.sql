SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `petaraca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `animal`
--

CREATE TABLE `animal` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `sexo` varchar(9) NOT NULL,
  `raca` varchar(30) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `foto` longblob,
  `anonasc` date DEFAULT NULL,
  `cor` varchar(30) DEFAULT NULL,
  `tamanho` varchar(7) DEFAULT NULL,
  `disponivel` int(11) DEFAULT NULL,
  `telefone` varchar(15) NOT NULL,
  `datapublicacao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estrutura da tabela `doacao`
--

CREATE TABLE `doacao` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `anunciante` varchar(60) DEFAULT NULL,
  `contato` varchar(60) DEFAULT NULL,
  `foto` longblob,
  `disponivel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `moderador`
--

CREATE TABLE `moderador` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `login` varchar(30) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `aprovado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `doacao`
--
ALTER TABLE `doacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moderador`
--
ALTER TABLE `moderador`
  ADD PRIMARY KEY (`codigo`);
COMMIT;
