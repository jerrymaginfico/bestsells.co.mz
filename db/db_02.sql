-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Maio-2021 às 14:43
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_02`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acc_eletro`
--

CREATE TABLE `acc_eletro` (
  `acc_id` int(10) NOT NULL,
  `ac_title` varchar(200) NOT NULL,
  `ac_brand` varchar(100) NOT NULL,
  `image_one` varchar(100) NOT NULL,
  `image_two` varchar(100) NOT NULL,
  `ac_descricao` varchar(200) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `product_status` varchar(50) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `data_cadastro` varchar(100) NOT NULL,
  `vend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `acc_men`
--

CREATE TABLE `acc_men` (
  `ac_id` int(11) NOT NULL,
  `ac_title` varchar(200) NOT NULL,
  `image_one` varchar(100) NOT NULL,
  `image_two` varchar(100) NOT NULL,
  `ac_descricao` varchar(200) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `product_status` varchar(50) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `data_cadastro` varchar(100) NOT NULL,
  `vend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `acc_women`
--

CREATE TABLE `acc_women` (
  `acc_wid` int(10) NOT NULL,
  `ac_title` varchar(255) NOT NULL,
  `image_one` varchar(100) NOT NULL,
  `image_two` varchar(100) NOT NULL,
  `ac_descricao` varchar(255) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `product_status` varchar(50) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `data_cadastro` varchar(100) NOT NULL,
  `vend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `acessorioscarros`
--

CREATE TABLE `acessorioscarros` (
  `ac_id` int(10) NOT NULL,
  `ac_title` varchar(200) NOT NULL,
  `ac_brand` varchar(100) NOT NULL,
  `image_one` varchar(100) NOT NULL,
  `image_two` varchar(100) NOT NULL,
  `ac_descricao` varchar(255) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `product_status` varchar(50) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `data_cadastro` varchar(100) NOT NULL,
  `vend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `acessorioseletrodomesticos`
--

CREATE TABLE `acessorioseletrodomesticos` (
  `ac_id` int(10) NOT NULL,
  `ac_title` varchar(200) NOT NULL,
  `ac_brand` varchar(100) NOT NULL,
  `image_one` varchar(100) NOT NULL,
  `image_two` varchar(100) NOT NULL,
  `ac_descricao` varchar(200) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `product_status` varchar(50) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `data_cadastro` varchar(100) NOT NULL,
  `vend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bicicletas`
--

CREATE TABLE `bicicletas` (
  `bic_id` int(10) NOT NULL,
  `bic_title` varchar(255) NOT NULL,
  `mobile_brand` varchar(100) NOT NULL,
  `bic_modelo` varchar(50) NOT NULL,
  `bic_cor` varchar(50) NOT NULL,
  `image_one` varchar(100) NOT NULL,
  `image_two` varchar(100) NOT NULL,
  `bic_descricao` varchar(255) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `product_status` text NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `data_cadastro` varchar(100) NOT NULL,
  `vend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `celulares`
--

CREATE TABLE `celulares` (
  `cel_id` int(10) NOT NULL,
  `cel_title` varchar(250) NOT NULL,
  `mobile_brand` varchar(100) NOT NULL,
  `cel_modelo` varchar(100) NOT NULL,
  `cel_cor` varchar(50) NOT NULL,
  `cel_cards` varchar(50) NOT NULL,
  `cel_processor` varchar(100) NOT NULL,
  `cel_ram` varchar(100) NOT NULL,
  `cel_storage` varchar(100) NOT NULL,
  `cel_battery_size` varchar(100) NOT NULL,
  `cel_camera` varchar(100) NOT NULL,
  `image_one` varchar(100) NOT NULL,
  `image_two` varchar(100) NOT NULL,
  `image_three` varchar(100) NOT NULL,
  `image_four` varchar(100) NOT NULL,
  `cel_descricao` varchar(250) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `product_status` varchar(50) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `data_cadastro` varchar(100) NOT NULL,
  `vend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('5knajmaj6mn6l9bgvrggk6p6sn1mpbsl', '::1', 1621427582, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632313432373538323b61646d696e5f757365726e616d657c733a353a2261646d696e223b61646d696e5f70617373776f72647c733a353a2261646d696e223b656d61696c7c733a32383a226a6572656d79656c6c6d61676e696669636f40676d61696c2e636f6d223b70617373776f72647c733a343a2231323334223b),
('b3qk7eab6d30i6r06gbqitli5kftv6ti', '::1', 1621426565, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632313432363536353b61646d696e5f757365726e616d657c733a353a2261646d696e223b61646d696e5f70617373776f72647c733a353a2261646d696e223b),
('cdbcaro49otepqtb1edetp14rpli19vo', '::1', 1621426933, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632313432363933333b61646d696e5f757365726e616d657c733a353a2261646d696e223b61646d696e5f70617373776f72647c733a353a2261646d696e223b),
('i7m91mluukrbp328nshupnm6kgnsqd2g', '::1', 1621427625, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632313432373538323b61646d696e5f757365726e616d657c733a353a2261646d696e223b61646d696e5f70617373776f72647c733a353a2261646d696e223b656d61696c7c733a32383a226a6572656d79656c6c6d61676e696669636f40676d61696c2e636f6d223b70617373776f72647c733a343a2231323334223b),
('m9s11v5qdfv8i70t2nr06a80363ponu7', '::1', 1621427244, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632313432373234343b61646d696e5f757365726e616d657c733a353a2261646d696e223b61646d696e5f70617373776f72647c733a353a2261646d696e223b),
('s1bu81bklnipu940500tgj8mp745prdo', '::1', 1621422455, 0x5f5f63695f6c6173745f726567656e65726174657c693a313632313432323435353b61646d696e5f757365726e616d657c733a353a2261646d696e223b61646d696e5f70617373776f72647c733a353a2261646d696e223b);

-- --------------------------------------------------------

--
-- Estrutura da tabela `colectivos`
--

CREATE TABLE `colectivos` (
  `col_id` int(10) NOT NULL,
  `col_title` varchar(255) NOT NULL,
  `mobile_brand` varchar(100) NOT NULL,
  `col_modelo` varchar(100) NOT NULL,
  `col_cor` varchar(50) NOT NULL,
  `col_quilometragem` varchar(100) NOT NULL,
  `col_combustivel` varchar(100) NOT NULL,
  `col_ano` varchar(100) NOT NULL,
  `col_transmissao` varchar(100) NOT NULL,
  `col_tipoCarro` varchar(100) NOT NULL,
  `image_one` varchar(200) NOT NULL,
  `image_two` varchar(200) NOT NULL,
  `image_three` varchar(200) NOT NULL,
  `image_four` varchar(200) NOT NULL,
  `col_descricao` varchar(255) NOT NULL,
  `car_categoria` text NOT NULL,
  `product_status` text NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `data_cadastro` varchar(100) NOT NULL,
  `vend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `desktop`
--

CREATE TABLE `desktop` (
  `desk_id` int(10) NOT NULL,
  `desk_title` varchar(255) NOT NULL,
  `mobile_brand` varchar(100) NOT NULL,
  `desk_monitor` varchar(100) NOT NULL,
  `desk_so` varchar(100) NOT NULL,
  `desk_processor` varchar(100) NOT NULL,
  `desk_hdd` varchar(50) NOT NULL,
  `desk_ram` varchar(50) NOT NULL,
  `image_one` varchar(100) NOT NULL,
  `image_two` varchar(100) NOT NULL,
  `image_three` varchar(100) NOT NULL,
  `image_four` varchar(100) NOT NULL,
  `desk_descricao` varchar(255) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `product_status` varchar(50) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `data_cadastro` varchar(100) NOT NULL,
  `vend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fogoes`
--

CREATE TABLE `fogoes` (
  `fog_id` int(10) NOT NULL,
  `fog_title` varchar(200) NOT NULL,
  `fog_number` varchar(50) NOT NULL,
  `fog_type` varchar(50) NOT NULL,
  `fog_cor` varchar(50) NOT NULL,
  `image_one` varchar(200) NOT NULL,
  `image_two` varchar(200) NOT NULL,
  `image_three` varchar(200) NOT NULL,
  `image_four` varchar(200) NOT NULL,
  `fog_descricao` varchar(200) NOT NULL,
  `fog_categoria` varchar(50) NOT NULL,
  `product_status` varchar(50) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `data_cadastro` varchar(100) NOT NULL,
  `vend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `footwears`
--

CREATE TABLE `footwears` (
  `mfoot_id` int(10) NOT NULL,
  `mfoot_title` varchar(200) NOT NULL,
  `mfoot_size` varchar(100) NOT NULL,
  `image_one` varchar(100) NOT NULL,
  `image_two` varchar(100) NOT NULL,
  `mfoot_descricao` varchar(100) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `product_status` varchar(50) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `data_cadastro` varchar(100) NOT NULL,
  `vend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gel_cong`
--

CREATE TABLE `gel_cong` (
  `freeze_id` int(10) NOT NULL,
  `freeze_title` varchar(255) NOT NULL,
  `mobile_brand` varchar(100) NOT NULL,
  `freeze_type` varchar(100) NOT NULL,
  `freeze_size` varchar(100) NOT NULL,
  `freeze_cor` varchar(100) NOT NULL,
  `image_one` varchar(200) NOT NULL,
  `image_two` varchar(200) NOT NULL,
  `freeze_descricao` varchar(255) NOT NULL,
  `freeze_categoria` varchar(100) NOT NULL,
  `product_status` varchar(50) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `data_cadastro` varchar(100) NOT NULL,
  `vend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `impressoras`
--

CREATE TABLE `impressoras` (
  `print_id` int(10) NOT NULL,
  `print_title` varchar(255) NOT NULL,
  `mobile_brand` varchar(100) NOT NULL,
  `image_one` varchar(100) NOT NULL,
  `image_two` varchar(100) NOT NULL,
  `image_three` varchar(100) NOT NULL,
  `image_four` varchar(100) NOT NULL,
  `print_descricao` varchar(200) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `product_status` varchar(50) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `data_cadastro` varchar(100) NOT NULL,
  `vend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `language`
--

CREATE TABLE `language` (
  `phrase_id` int(11) NOT NULL,
  `phrase` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `laptops`
--

CREATE TABLE `laptops` (
  `lap_id` int(10) NOT NULL,
  `lap_title` varchar(255) NOT NULL,
  `mobile_brand` varchar(100) NOT NULL,
  `lap_size` varchar(100) NOT NULL,
  `lap_so` varchar(100) NOT NULL,
  `lap_processor` varchar(100) NOT NULL,
  `lap_hdd` varchar(100) NOT NULL,
  `lap_ram` varchar(100) NOT NULL,
  `image_one` varchar(100) NOT NULL,
  `image_two` varchar(100) NOT NULL,
  `image_three` varchar(100) NOT NULL,
  `image_four` varchar(100) NOT NULL,
  `lap_descricao` varchar(255) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `product_status` varchar(50) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `data_cadastro` varchar(100) NOT NULL,
  `vend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marcas`
--

CREATE TABLE `marcas` (
  `brand_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `marca` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `marcas`
--

INSERT INTO `marcas` (`brand_id`, `product_id`, `marca`) VALUES
(1, 1, 'Samsung'),
(2, 1, 'Iphone'),
(3, 1, 'Infinix'),
(4, 1, 'Hisense'),
(5, 1, 'Nokia'),
(6, 1, 'Tecno'),
(7, 1, 'Itel'),
(8, 1, 'Huawei'),
(9, 1, 'MI'),
(10, 2, 'IFA'),
(11, 2, 'Freightliner'),
(12, 2, 'TATA'),
(13, 3, 'Toyota'),
(14, 3, 'Isuzu'),
(15, 3, 'Nissan'),
(16, 3, 'Peugeot'),
(17, 3, 'Volkswagen'),
(18, 3, 'BMW'),
(19, 3, 'Mercedes'),
(20, 4, 'Yamaha'),
(21, 4, 'Harley'),
(22, 5, 'BMX'),
(23, 6, 'Samsung'),
(24, 6, 'KIK'),
(25, 6, 'Defy'),
(26, 7, 'Samsung'),
(27, 7, 'Samsung'),
(28, 7, 'TEK'),
(29, 7, 'LG'),
(30, 7, 'Hisense'),
(31, 8, 'Dell'),
(32, 8, 'Samsung'),
(33, 8, 'HP'),
(34, 8, 'Macbook'),
(35, 8, 'Asus'),
(36, 8, 'Lenovo'),
(37, 8, 'Siemens'),
(38, 1, 'VIVO'),
(39, 9, 'Samsung'),
(40, 9, 'HP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `motos`
--

CREATE TABLE `motos` (
  `moto_id` int(10) NOT NULL,
  `moto_title` varchar(255) NOT NULL,
  `mobile_brand` varchar(100) NOT NULL,
  `moto_modelo` varchar(50) NOT NULL,
  `moto_cor` varchar(50) NOT NULL,
  `moto_quilometragem` varchar(100) NOT NULL,
  `moto_combustivel` varchar(100) NOT NULL,
  `moto_ano` varchar(100) NOT NULL,
  `image_one` varchar(200) NOT NULL,
  `image_two` varchar(200) NOT NULL,
  `image_three` varchar(200) NOT NULL,
  `image_four` varchar(200) NOT NULL,
  `moto_descricao` varchar(255) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `product_status` varchar(50) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `data_cadastro` varchar(100) NOT NULL,
  `vend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `particulares`
--

CREATE TABLE `particulares` (
  `part_id` int(10) NOT NULL,
  `part_title` varchar(255) NOT NULL,
  `mobile_brand` varchar(100) NOT NULL,
  `part_modelo` varchar(100) NOT NULL,
  `part_cor` text NOT NULL,
  `part_quilometragem` varchar(100) NOT NULL,
  `part_combustivel` varchar(100) NOT NULL,
  `part_ano` varchar(50) NOT NULL,
  `part_transmissao` text NOT NULL,
  `part_tipocarro` text NOT NULL,
  `image_one` varchar(200) NOT NULL,
  `image_two` varchar(200) NOT NULL,
  `image_three` varchar(200) NOT NULL,
  `image_four` varchar(200) NOT NULL,
  `part_descricao` varchar(255) NOT NULL,
  `car_categoria` text NOT NULL,
  `product_status` text NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `data_cadastro` varchar(200) NOT NULL,
  `vend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `particulares`
--

INSERT INTO `particulares` (`part_id`, `part_title`, `mobile_brand`, `part_modelo`, `part_cor`, `part_quilometragem`, `part_combustivel`, `part_ano`, `part_transmissao`, `part_tipocarro`, `image_one`, `image_two`, `image_three`, `image_four`, `part_descricao`, `car_categoria`, `product_status`, `product_price`, `data_cadastro`, `vend_id`) VALUES
(1, 'BMW', 'BMW', '520i', 'Branco', '72000 km', 'Gasolina', '2012', 'Manual', 'Turismo', 'index1.jpg', 'index06.jpg', 'index11.jpg', 'index061.jpg', 'Modelo 520i\nAno 2012\nGasolina\nMotor 2.0cc\n04 cilindros - Turbo\nBotão start', 'Carros', 'Active', ' 95000000 MT', '2021-05-19', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pesados`
--

CREATE TABLE `pesados` (
  `pes_id` int(10) NOT NULL,
  `pes_title` varchar(255) NOT NULL,
  `mobile_brand` varchar(100) NOT NULL,
  `pes_modelo` varchar(100) NOT NULL,
  `pes_cor` varchar(50) NOT NULL,
  `pes_quilometragem` varchar(100) NOT NULL,
  `pes_combustivel` varchar(100) NOT NULL,
  `pes_ano` varchar(50) NOT NULL,
  `pes_transmissao` varchar(100) NOT NULL,
  `image_one` varchar(200) NOT NULL,
  `image_two` varchar(200) NOT NULL,
  `image_three` varchar(200) NOT NULL,
  `image_four` varchar(200) NOT NULL,
  `pes_descricao` varchar(255) NOT NULL,
  `car_categoria` varchar(50) NOT NULL,
  `product_status` varchar(50) NOT NULL,
  `product_price` varchar(200) NOT NULL,
  `data_cadastro` varchar(200) NOT NULL,
  `vend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `product_id` int(10) NOT NULL,
  `nome_produto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`product_id`, `nome_produto`) VALUES
(1, 'Celulares'),
(2, 'Carros Pesados'),
(3, 'Carros'),
(4, 'Motos'),
(5, 'Bicicletas'),
(6, 'Geleiras & Congeladores'),
(7, 'Televisores'),
(8, 'Computadores'),
(9, 'Impressoras');

-- --------------------------------------------------------

--
-- Estrutura da tabela `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'system_name', 'COMPLETE ERP SOFTWARE'),
(2, 'system_title', 'COMPLETE ERP SOFTWARE'),
(3, 'address', '546787, Kertz shopping complext, Silicon Valley, United State of America, New York city.'),
(4, 'phone', '+1564783934'),
(6, 'currency', 'USD'),
(7, 'system_email', 'optimumproblemsolver@gmail.com'),
(11, 'language', 'english'),
(12, 'text_align', 'left-to-right'),
(16, 'skin_colour', 'purple'),
(21, 'session', '2019-2020'),
(22, 'footer', 'Developed by Optimum Linkup Computers. All Right Reserved (2019)'),
(116, 'paypal_email', 'clone@paypalemail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `shirts`
--

CREATE TABLE `shirts` (
  `shirt_id` int(10) NOT NULL,
  `shirt_title` varchar(200) NOT NULL,
  `shirt_size` varchar(100) NOT NULL,
  `image_one` varchar(100) NOT NULL,
  `image_two` varchar(100) NOT NULL,
  `shirt_descricao` varchar(200) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `product_status` varchar(50) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `data_cadastro` varchar(100) NOT NULL,
  `vend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tablets`
--

CREATE TABLE `tablets` (
  `tab_id` int(10) NOT NULL,
  `tab_title` varchar(255) NOT NULL,
  `mobile_brand` varchar(100) NOT NULL,
  `tab_modelo` varchar(100) NOT NULL,
  `tab_cor` varchar(50) NOT NULL,
  `tab_cards` varchar(50) NOT NULL,
  `tab_processor` varchar(100) NOT NULL,
  `tab_ram` varchar(100) NOT NULL,
  `tab_storage` varchar(100) NOT NULL,
  `tab_battery_size` varchar(100) NOT NULL,
  `tab_camera` varchar(50) NOT NULL,
  `image_one` varchar(100) NOT NULL,
  `image_two` varchar(100) NOT NULL,
  `image_three` varchar(100) NOT NULL,
  `image_four` varchar(100) NOT NULL,
  `tab_descricao` varchar(200) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `product_status` varchar(50) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `data_cadastro` varchar(100) NOT NULL,
  `vend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `televisores`
--

CREATE TABLE `televisores` (
  `tv_id` int(10) NOT NULL,
  `tv_title` varchar(200) NOT NULL,
  `tv_brand` varchar(100) NOT NULL,
  `tv_size` varchar(100) NOT NULL,
  `tv_cor` varchar(50) NOT NULL,
  `image_one` varchar(100) NOT NULL,
  `image_two` varchar(100) NOT NULL,
  `tv_descricao` varchar(255) NOT NULL,
  `tv_categoria` varchar(50) NOT NULL,
  `product_status` varchar(50) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `data_cadastro` varchar(100) NOT NULL,
  `vend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `trousers`
--

CREATE TABLE `trousers` (
  `trous_id` int(10) NOT NULL,
  `calc_title` varchar(200) NOT NULL,
  `calc_size` varchar(100) NOT NULL,
  `image_one` varchar(100) NOT NULL,
  `image_two` varchar(100) NOT NULL,
  `calc_descricao` varchar(200) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `product_status` varchar(50) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `data_cadastro` varchar(100) NOT NULL,
  `vend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `vend_id` int(10) NOT NULL,
  `nome_completo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `agree` text NOT NULL,
  `vend_contato1` text NOT NULL,
  `vend_contato2` text NOT NULL,
  `vend_localizacao` varchar(255) NOT NULL,
  `data_cadastro` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vendedor`
--

INSERT INTO `vendedor` (`vend_id`, `nome_completo`, `email`, `password`, `agree`, `vend_contato1`, `vend_contato2`, `vend_localizacao`, `data_cadastro`) VALUES
(1, 'Jeremias Honwana', 'jeremyellmagnifico@gmail.com', '1234', 'Yes', '84 057 6568', '87 057 6568', 'Maputo, Patrice Lumumba', '2021-05-19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `wfootwears`
--

CREATE TABLE `wfootwears` (
  `wfoot_id` int(10) NOT NULL,
  `mfoot_title` varchar(255) NOT NULL,
  `mfoot_size` varchar(200) NOT NULL,
  `image_one` varchar(100) NOT NULL,
  `image_two` varchar(100) NOT NULL,
  `mfoot_descricao` varchar(200) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `product_status` varchar(50) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `data_cadastro` varchar(100) NOT NULL,
  `vend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `wshirts`
--

CREATE TABLE `wshirts` (
  `wshirt_id` int(10) NOT NULL,
  `wshirt_title` varchar(200) NOT NULL,
  `wshirt_size` varchar(100) NOT NULL,
  `image_one` varchar(100) NOT NULL,
  `image_two` varchar(100) NOT NULL,
  `wshirt_descricao` varchar(200) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `product_status` varchar(50) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `data_cadastro` varchar(100) NOT NULL,
  `vend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `wtrousers`
--

CREATE TABLE `wtrousers` (
  `wtrou_id` int(10) NOT NULL,
  `calc_title` varchar(255) NOT NULL,
  `calc_size` varchar(200) NOT NULL,
  `image_one` varchar(100) NOT NULL,
  `image_two` varchar(100) NOT NULL,
  `calc_descricao` varchar(200) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `product_status` varchar(50) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `data_cadastro` varchar(100) NOT NULL,
  `vend_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acc_eletro`
--
ALTER TABLE `acc_eletro`
  ADD PRIMARY KEY (`acc_id`);

--
-- Índices para tabela `acc_men`
--
ALTER TABLE `acc_men`
  ADD PRIMARY KEY (`ac_id`);

--
-- Índices para tabela `acc_women`
--
ALTER TABLE `acc_women`
  ADD PRIMARY KEY (`acc_wid`);

--
-- Índices para tabela `acessorioscarros`
--
ALTER TABLE `acessorioscarros`
  ADD PRIMARY KEY (`ac_id`);

--
-- Índices para tabela `acessorioseletrodomesticos`
--
ALTER TABLE `acessorioseletrodomesticos`
  ADD PRIMARY KEY (`ac_id`);

--
-- Índices para tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Índices para tabela `bicicletas`
--
ALTER TABLE `bicicletas`
  ADD PRIMARY KEY (`bic_id`);

--
-- Índices para tabela `celulares`
--
ALTER TABLE `celulares`
  ADD PRIMARY KEY (`cel_id`);

--
-- Índices para tabela `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Índices para tabela `colectivos`
--
ALTER TABLE `colectivos`
  ADD PRIMARY KEY (`col_id`);

--
-- Índices para tabela `desktop`
--
ALTER TABLE `desktop`
  ADD PRIMARY KEY (`desk_id`);

--
-- Índices para tabela `fogoes`
--
ALTER TABLE `fogoes`
  ADD PRIMARY KEY (`fog_id`);

--
-- Índices para tabela `footwears`
--
ALTER TABLE `footwears`
  ADD PRIMARY KEY (`mfoot_id`);

--
-- Índices para tabela `gel_cong`
--
ALTER TABLE `gel_cong`
  ADD PRIMARY KEY (`freeze_id`);

--
-- Índices para tabela `impressoras`
--
ALTER TABLE `impressoras`
  ADD PRIMARY KEY (`print_id`);

--
-- Índices para tabela `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`phrase_id`);

--
-- Índices para tabela `laptops`
--
ALTER TABLE `laptops`
  ADD PRIMARY KEY (`lap_id`);

--
-- Índices para tabela `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`brand_id`);

--
-- Índices para tabela `motos`
--
ALTER TABLE `motos`
  ADD PRIMARY KEY (`moto_id`);

--
-- Índices para tabela `particulares`
--
ALTER TABLE `particulares`
  ADD PRIMARY KEY (`part_id`);

--
-- Índices para tabela `pesados`
--
ALTER TABLE `pesados`
  ADD PRIMARY KEY (`pes_id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`product_id`);

--
-- Índices para tabela `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Índices para tabela `shirts`
--
ALTER TABLE `shirts`
  ADD PRIMARY KEY (`shirt_id`);

--
-- Índices para tabela `tablets`
--
ALTER TABLE `tablets`
  ADD PRIMARY KEY (`tab_id`);

--
-- Índices para tabela `televisores`
--
ALTER TABLE `televisores`
  ADD PRIMARY KEY (`tv_id`);

--
-- Índices para tabela `trousers`
--
ALTER TABLE `trousers`
  ADD PRIMARY KEY (`trous_id`);

--
-- Índices para tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`vend_id`);

--
-- Índices para tabela `wfootwears`
--
ALTER TABLE `wfootwears`
  ADD PRIMARY KEY (`wfoot_id`);

--
-- Índices para tabela `wshirts`
--
ALTER TABLE `wshirts`
  ADD PRIMARY KEY (`wshirt_id`);

--
-- Índices para tabela `wtrousers`
--
ALTER TABLE `wtrousers`
  ADD PRIMARY KEY (`wtrou_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acc_eletro`
--
ALTER TABLE `acc_eletro`
  MODIFY `acc_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `acc_men`
--
ALTER TABLE `acc_men`
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `acc_women`
--
ALTER TABLE `acc_women`
  MODIFY `acc_wid` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `acessorioscarros`
--
ALTER TABLE `acessorioscarros`
  MODIFY `ac_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `acessorioseletrodomesticos`
--
ALTER TABLE `acessorioseletrodomesticos`
  MODIFY `ac_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `bicicletas`
--
ALTER TABLE `bicicletas`
  MODIFY `bic_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `celulares`
--
ALTER TABLE `celulares`
  MODIFY `cel_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `colectivos`
--
ALTER TABLE `colectivos`
  MODIFY `col_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `desktop`
--
ALTER TABLE `desktop`
  MODIFY `desk_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fogoes`
--
ALTER TABLE `fogoes`
  MODIFY `fog_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `footwears`
--
ALTER TABLE `footwears`
  MODIFY `mfoot_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `gel_cong`
--
ALTER TABLE `gel_cong`
  MODIFY `freeze_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `impressoras`
--
ALTER TABLE `impressoras`
  MODIFY `print_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `language`
--
ALTER TABLE `language`
  MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `laptops`
--
ALTER TABLE `laptops`
  MODIFY `lap_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `motos`
--
ALTER TABLE `motos`
  MODIFY `moto_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `particulares`
--
ALTER TABLE `particulares`
  MODIFY `part_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pesados`
--
ALTER TABLE `pesados`
  MODIFY `pes_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT de tabela `shirts`
--
ALTER TABLE `shirts`
  MODIFY `shirt_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tablets`
--
ALTER TABLE `tablets`
  MODIFY `tab_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `televisores`
--
ALTER TABLE `televisores`
  MODIFY `tv_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `trousers`
--
ALTER TABLE `trousers`
  MODIFY `trous_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `vend_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `wfootwears`
--
ALTER TABLE `wfootwears`
  MODIFY `wfoot_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `wshirts`
--
ALTER TABLE `wshirts`
  MODIFY `wshirt_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `wtrousers`
--
ALTER TABLE `wtrousers`
  MODIFY `wtrou_id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
