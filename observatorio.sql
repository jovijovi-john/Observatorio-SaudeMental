-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Jun-2021 às 16:56
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
  `Adress` varchar(300) NOT NULL,
  `Year` int(11) NOT NULL,
  `Data_Publicacao` varchar(30) NOT NULL,
  `Palavras-chave` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
