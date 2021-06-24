-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Jun-2021 às 16:59
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `observatorio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `article`
--

CREATE TABLE `article` (
  `idArticle` int(11) NOT NULL,
  `Title` varchar(150) DEFAULT NULL,
  `Authors` varchar(300) DEFAULT NULL,
  `Journal` varchar(100) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Volume` varchar(10) DEFAULT NULL,
  `Number` varchar(10) DEFAULT NULL,
  `Pages` varchar(20) DEFAULT NULL,
  `Month` varchar(20) DEFAULT NULL,
  `Data_Publicacao` varchar(30) DEFAULT NULL,
  `Palavras_chave` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `article`
--

INSERT INTO `article` (`idArticle`, `Title`, `Authors`, `Journal`, `Year`, `Volume`, `Number`, `Pages`, `Month`, `Data_Publicacao`, `Palavras_chave`) VALUES
(1, '\"DOIDIÇA\" E DEPRESSÃO: AS CONCEPÇÕES DOS USUÁRIOS DA REDE DE ATENÇÃO INTEGRAL À SAÚDE MENTAL DE SOBRAL-CE', 'Costa, Maria Suely Alves', '', 2008, '', '', '', 'Jan', '01/01/2008', 'epressão, Doidice, S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `book`
--

CREATE TABLE `book` (
  `idBook` int(11) NOT NULL,
  `Title` varchar(150) DEFAULT NULL,
  `Authors` varchar(150) DEFAULT NULL,
  `Publisher` varchar(100) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Volume` varchar(10) DEFAULT NULL,
  `Number` varchar(10) DEFAULT NULL,
  `Series` varchar(45) DEFAULT NULL,
  `Edition` varchar(45) DEFAULT NULL,
  `Month` varchar(20) DEFAULT NULL,
  `Note` varchar(45) DEFAULT NULL,
  `Data_Publicacao` varchar(30) DEFAULT NULL,
  `Palavras_chave` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `book`
--

INSERT INTO `book` (`idBook`, `Title`, `Authors`, `Publisher`, `Year`, `Volume`, `Number`, `Series`, `Edition`, `Month`, `Note`, `Data_Publicacao`, `Palavras_chave`) VALUES
(1, 'SAÚDE MENTAL: DESAFIOS DA PREVENÇÃO, DIAGNÓSTICO, TRATAMENTO E CUIDADO NA SOCIEDADE MODERNA', 'Freitas, Guilherme Barroso Langoni and Martins, Guilherme Augusto G', 'Paraná: Editora Pasteur', 2021, '', '', '', '', 'Jan', '', '01/01/2021', 'Cuidado, Saúde mental, Saúde Pública.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `inproceedings`
--

CREATE TABLE `inproceedings` (
  `idInproceedings` int(11) NOT NULL,
  `Title` varchar(150) DEFAULT NULL,
  `Authors` varchar(150) DEFAULT NULL,
  `Booktitle` varchar(150) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Editor` varchar(100) DEFAULT NULL,
  `Volume` varchar(10) DEFAULT NULL,
  `Number` varchar(10) DEFAULT NULL,
  `Series` varchar(45) DEFAULT NULL,
  `Pages` varchar(20) DEFAULT NULL,
  `Address` varchar(45) DEFAULT NULL,
  `Month` varchar(20) DEFAULT NULL,
  `Organization` varchar(100) DEFAULT NULL,
  `Publisher` varchar(100) DEFAULT NULL,
  `Note` varchar(45) DEFAULT NULL,
  `Data_Publicacao` varchar(30) DEFAULT NULL,
  `Palavras_chave` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mastersthesis`
--

CREATE TABLE `mastersthesis` (
  `idMastersThesis` int(11) NOT NULL,
  `Title` varchar(300) NOT NULL,
  `Authors` varchar(300) NOT NULL,
  `School` varchar(300) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `Year` int(11) NOT NULL,
  `Data_Publicacao` varchar(30) NOT NULL,
  `Palavras_chave` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mastersthesis`
--

INSERT INTO `mastersthesis` (`idMastersThesis`, `Title`, `Authors`, `School`, `Address`, `Year`, `Data_Publicacao`, `Palavras_chave`) VALUES
(1, 'Tecnologia educativa digital para a promoção da saúde mental de adolescentes: Estudo de validação por especialistas', 'Farias, Quiteria Larissa Teodoro', 'Universidade Federal do Ceará, Sobral, CE, Brasil', '', 2021, '01/01/2021', 'Promoção da Saúde, Saúde do Adolescente, Saúde Mental'),
(2, 'ATENÇÃO A SAÚDE MENTAL NO MUNICIPIO DE SOBRAL - CE', 'Quinderé, Paulo Henrique Dias', ' Universidade Estadual do Ceará, Fortaleza, CE, Brasil', '', 2008, '01/01/2008', 'Assistência em saúde mental , Níveis de atenção à saúde , Prestação integrada de cuidados de saúde');

-- --------------------------------------------------------

--
-- Estrutura da tabela `misc`
--

CREATE TABLE `misc` (
  `idMisc` int(11) NOT NULL,
  `Title` varchar(150) DEFAULT NULL,
  `Author` varchar(150) DEFAULT NULL,
  `Howpublished` varchar(100) DEFAULT NULL,
  `Month` varchar(20) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Note` varchar(45) DEFAULT NULL,
  `Data_Publicacao` varchar(30) DEFAULT NULL,
  `Palavras_chave` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `phdthesis`
--

CREATE TABLE `phdthesis` (
  `idPhdthesis` int(11) NOT NULL,
  `Title` varchar(150) DEFAULT NULL,
  `Authors` varchar(150) DEFAULT NULL,
  `School` varchar(100) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Type` varchar(45) DEFAULT NULL,
  `Data_Publicacao` varchar(30) DEFAULT NULL,
  `Palavras_chave` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `phdthesis`
--

INSERT INTO `phdthesis` (`idPhdthesis`, `Title`, `Authors`, `School`, `Year`, `Type`, `Data_Publicacao`, `Palavras_chave`) VALUES
(1, 'EXPERIÊNCIAS DAS FAMÍLIAS COM USUÁRIOS ATENDIDOS NOS DISPOSITIVOS DE ATENÇÃO PSICOSSOCIAL', 'Barros, Márcia Maria Mont´Alverne', '', 2012, '', '09/12/2012', 'Família, Pesquisa qualitativa, Saúde Mental'),
(2, 'TRABALHO E SAÚDE MENTAL EM PROFISSIONAIS DA ATENÇÃO BÁSICA: A  EXPERIÊNCIA DE SOBRAL, CEARÁ.', 'Farias, Mariana Ramalho', ' Universidade Estadual do Ceará, Fortaleza, CE, Brasil', 2015, '', '01/01/2015', 'Atenção Primária à Saúde, Saúde do Trabalhador, Saúde Mental');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idArticle`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`idBook`);

--
-- Indexes for table `inproceedings`
--
ALTER TABLE `inproceedings`
  ADD PRIMARY KEY (`idInproceedings`);

--
-- Indexes for table `mastersthesis`
--
ALTER TABLE `mastersthesis`
  ADD PRIMARY KEY (`idMastersThesis`);

--
-- Indexes for table `misc`
--
ALTER TABLE `misc`
  ADD PRIMARY KEY (`idMisc`);

--
-- Indexes for table `phdthesis`
--
ALTER TABLE `phdthesis`
  ADD PRIMARY KEY (`idPhdthesis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mastersthesis`
--
ALTER TABLE `mastersthesis`
  MODIFY `idMastersThesis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
