-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 08, 2022 at 03:40 PM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ab6952_dbgrijle`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `cate_id` int(11) NOT NULL,
  `cate_nom` varchar(255) DEFAULT NULL,
  `cate_dsc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`cate_id`, `cate_nom`, `cate_dsc`) VALUES
(1, 'Derecho Administrativo', 'Derecho Administrativo'),
(2, 'Derecho Penal y CriminologÃ­a', 'Derecho Penal y CriminologÃ­a'),
(10, 'Derecho Civil', 'Derecho Civil'),
(11, 'Derecho Laboral', 'Derecho Laboral'),
(12, 'Derecho Comercial', 'Derecho Comercial'),
(13, 'Derecho de Familia', 'Derecho de Familia'),
(14, 'Derecho Constitucional y Ciencias Politicas', 'Derecho Constitucional y Ciencias Politicas'),
(15, 'Derecho Registral y Notarial', 'Derecho Registral y Notarial'),
(16, 'Derecho Internacional', 'Derecho Internacional'),
(17, 'Derecho y Literatura', 'Derecho y literatura'),
(18, 'Medicina ', '');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(160) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `usuario` varchar(40) NOT NULL,
  `contrasena` varchar(64) NOT NULL,
  `celular1` int(11) DEFAULT NULL,
  `celular2` int(11) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `pais` varchar(105) DEFAULT NULL,
  `direccion` text,
  `referencia` text,
  `distrito` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellidos`, `email`, `usuario`, `contrasena`, `celular1`, `celular2`, `telefono`, `pais`, `direccion`, `referencia`, `distrito`) VALUES
(25, 'Mckenneth', 'Flores Rivera', 'mflores_rivera@hotmail.com', 'mckenneth', '846b91b8ec0192bec1319336060ecc5326db0638', 940997221, 999991931, 7340616, 'Peru', 'Lima', 'Lima', ''),
(26, 'Oswaldo', 'Flores Rivera', 'mkennt_free@hotmail.com', 'oswaldo', 'Tengomuchodinero', 940997221, 0, 7340616, 'Peru', 'Lima', 'Lima', ''),
(32, 'MCKENNETH', 'FLORES', 'mkflores@comolohace.com', 'mckenneth', 'mckenneth12345', 999991931, 0, 0, 'Peru', 'Lima', '', ''),
(33, 'Hector', 'Suarez Castro', 'hectorsuarezc@gmail.com', 'hesuca', '1973Aida', 2147483647, 0, 0, 'colombia', 'Cra 8 No. 16-88 ', '', ''),
(34, 'MÃ³nica del Pilar GarcÃ­a Armas', NULL, 'moniquitagarciaarmas@hotmail.com', '', '', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(35, 'MÃ³nica del Pilar GarcÃ­a Armas', NULL, 'moniquitagarciaarmas@hotmail.com', '', '', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(36, 'MÃ³nica del Pilar GarcÃ­a Armas', NULL, 'moniquitagarciaarmas@hotmail.com', '', '', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(37, 'MÃ³nica del Pilar GarcÃ­a Armas', NULL, 'moniquitagarciaarmas@hotmail.com', '', '', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(38, 'Rolando angel', 'sosa iturre', 'joseama233@gmail.com', 'phreacker', 'ashiport', 2147483647, 0, 2147483647, 'Estados Unidos', '4283 Express Lane Suite 2588-179, Suite 2589-419', '', ''),
(39, 'JosÃ©', 'Andino', 'jose.arturo.andino.m@gmail.com', 'josearturoa', 'yo345cnaci2556', 2147483647, 0, 0, 'Ecuador', 'urbanizaciÃ³n la saiba manzana c villa 7 - Guayas - Guayaquil', 'Cerca del Crossfit Horda, por la calle BogotÃ¡', ''),
(40, 'Jesus', 'Llerena Flores', 'jesusllerenaflores@gmail.com', 'JESUSLLERENA', 'chucktaylor', 941048859, 0, 0, 'PerÃº', 'Av. General GarzÃ³n 1283, Jesus MarÃ­a', 'Altura de la cuadra 12 de Av. Brasil', '');

-- --------------------------------------------------------

--
-- Table structure for table `editorial`
--

CREATE TABLE `editorial` (
  `edito_id` int(10) NOT NULL,
  `edito_nom` varchar(255) NOT NULL,
  `edito_dsc` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `editorial`
--

INSERT INTO `editorial` (`edito_id`, `edito_nom`, `edito_dsc`) VALUES
(1, 'Grijley', ''),
(2, 'Idemsa', ''),
(3, 'Ediciones Legales', ''),
(4, 'Palestra Editores', ''),
(5, 'Jurista Editores', '');

-- --------------------------------------------------------

--
-- Table structure for table `gproductos`
--

CREATE TABLE `gproductos` (
  `gprod_id` int(11) NOT NULL,
  `gprod_prod_id` int(11) DEFAULT NULL,
  `gprod_foto` varchar(255) DEFAULT NULL,
  `gprod_nom` varchar(180) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gproductos`
--

INSERT INTO `gproductos` (`gprod_id`, `gprod_prod_id`, `gprod_foto`, `gprod_nom`) VALUES
(1, 8, 'libro1.jpg', 'EL DRECHO AL DEBIDO PROCESO EN EL PROCESO CIVIL'),
(2, 1, 'libro2.jpg', ''),
(3, 2, 'libro3.jpg', ''),
(4, 2, 'libro4.jpg', ''),
(5, 3, 'libro5.jpg', ''),
(6, 3, 'libro6.jpg', ''),
(7, 4, 'libro7.jpg', 'LAVADO DE ACTIVOS Y FINANCIACIÒN DEL TERRORISMO'),
(8, 4, 'libro8.jpg', 'LAVADO DE ACTIVOS Y FINANCIACIÒN DEL TERRORISMO'),
(9, 5, 'libro9.jpg', 'LA REFORMA CONSTITUCIONAL PENDIENTE'),
(10, 5, 'libro10.jpg', 'LA REFORMA CONSTITUCIONAL PENDIENTE'),
(11, 6, 'libro11.jpg', 'LAS FALTAS EN EL ORDENAMIENTO PENAL PERUANO'),
(12, 6, 'libro12.jpg', 'LAS FALTAS EN EL ORDENAMIENTO PENAL PERUANO'),
(13, 7, 'libro13.jpg', 'PRUEBA ILÃŒCITA Y LUCHA ANTICORRPCIÃ’N'),
(14, 7, 'libro14.jpg', 'PRUEBA ILÃŒCITA Y LUCHA ANTICORRPCIÃ’N'),
(15, 8, 'libro15.jpg', 'EL DRECHO AL DEBIDO PROCESO EN EL PROCESO CIVIL'),
(16, 8, 'libro16.jpg', 'EL DRECHO AL DEBIDO PROCESO EN EL PROCESO CIVIL'),
(17, 1, 'libro17.jpg', ''),
(18, 1, 'libro18.jpg', '3'),
(19, 1, 'libro19.jpg', ''),
(20, 12, 'libro20.jpg', ''),
(23, 16, 'libro23.jpg', ''),
(24, 17, 'libro24.jpg', ''),
(25, 18, 'libro25.jpg', ''),
(26, 19, 'libro26.jpg', ''),
(27, 20, 'libro27.jpg', ''),
(28, 22, 'libro28.jpg', ''),
(30, 23, 'libro30.jpg', ''),
(31, 24, 'libro31.jpg', ''),
(32, 25, 'libro32.jpg', ''),
(33, 26, 'libro33.jpg', ''),
(34, 27, 'libro34.jpg', ''),
(35, 28, 'libro35.jpg', ''),
(36, 29, 'libro36.jpg', ''),
(37, 30, 'libro37.jpg', ''),
(38, 31, 'libro38.jpg', ''),
(39, 32, 'libro39.jpg', ''),
(40, 33, 'libro40.jpg', ''),
(41, 34, 'libro41.jpg', ''),
(42, 35, 'libro42.jpg', ''),
(43, 36, 'libro43.jpg', ''),
(44, 37, 'libro44.jpg', ''),
(45, 38, 'libro45.jpg', ''),
(46, 39, 'libro46.jpg', ''),
(47, 40, 'libro47.jpg', ''),
(48, 1, 'sdfg.jpg', 'demo'),
(49, 25, '5.jpg', NULL),
(50, 25, 'foto.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `libro`
--

CREATE TABLE `libro` (
  `idlibro` int(11) NOT NULL,
  `tlibro` varchar(255) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `pais` varchar(45) DEFAULT NULL,
  `edicion` text,
  `formato` varchar(45) DEFAULT NULL,
  `paginas` varchar(45) DEFAULT NULL,
  `isbn` varchar(45) DEFAULT NULL,
  `precio1` decimal(7,2) DEFAULT NULL,
  `precio2` decimal(7,2) DEFAULT NULL,
  `indice` text,
  `resumen` mediumtext,
  `moneda` varchar(45) DEFAULT NULL,
  `stock` int(255) DEFAULT NULL,
  `activado` tinyint(1) DEFAULT NULL,
  `fotodestacada` varchar(512) DEFAULT NULL,
  `idcategoria` int(11) NOT NULL,
  `idsubcategoria` int(11) NOT NULL,
  `editorial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `libro`
--

INSERT INTO `libro` (`idlibro`, `tlibro`, `autor`, `pais`, `edicion`, `formato`, `paginas`, `isbn`, `precio1`, `precio2`, `indice`, `resumen`, `moneda`, `stock`, `activado`, `fotodestacada`, `idcategoria`, `idsubcategoria`, `editorial`) VALUES
(1, 'Lo racional como razonable', 'Aulis Aarnio', 'Peru', 'Grijle', '14 x 20.5', '314 aprox.', '123456789', '100.00', '120.00', 'no tiene', 'El autor finlandÃ©s, plantea una teorÃ­a de la interpretaciÃ³n jurÃ­dica ubicando al Derecho en el contexto social al que se debe, sin limitarse a concepciones donde Ã©ste no es mÃ¡s que la estructura silogÃ­stica del procedimiento de interpretaciÃ³n. De allÃ­ que la exigencia de justificar las decisiones haya desplazado la fe en las autoridades, y estas justificaciones resulten expresando no solo la desconfianza en el poder, sino una intelecciÃ³n inexorable entre Derecho y moral desde la racionalidad interpretativa cual expresiÃ³n de una teorÃ­a de valores, especialmente una teorÃ­a de justicia.', 'SOLES', 7, 1, 'libro1.jpg', 2, 2, 2),
(2, 'El libro de los placeres prohibidos', 'Federico Andahazi', 'Argentina', 'Grupo Planeta', '120x256p', '327', '564123789', '10.00', '0.00', 'Tampoco tiene', 'no', 'SOLES', 87, 1, 'libro2.jpg', 1, 1, 1),
(3, 'La Vaca', 'Camilo Cruz', 'Mexico', 'La Vaca', '152x156p', '500', '123456', '12.00', '150.00', 'no tiene', 'no tiene', 'SOLES', 31, 1, 'libro3.jpg', 2, 2, 2),
(4, 'Enemigo Comun', 'Yet Lee', 'China', 'La China', '150x160p', '100', '123456789', '50.00', '120.00', 'no tiene', 'tiene resumen', 'SOLES', 18, 1, 'libro4.jpg', 5, 4, 1),
(5, 'mi libro', 'mck', 'peru', 'grijle', '120px', '1560', '123456', '10.00', '20.00', '', 'aa', 'SOLES', 12, 1, 'libro5.jpg', 1, 1, 1),
(6, 'mi libro', 'mck', 'peru', 'grijle', '120px', '1560', '123456', '10.00', '20.00', '', 'aa', 'SOLES', 12, 1, 'libro6.jpg', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lineaspedido`
--

CREATE TABLE `lineaspedido` (
  `id` int(100) NOT NULL,
  `idpedido` int(100) DEFAULT NULL,
  `prod_id` int(100) DEFAULT NULL,
  `unidades` int(100) DEFAULT NULL,
  `tapa` varchar(1) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lineaspedido`
--

INSERT INTO `lineaspedido` (`id`, `idpedido`, `prod_id`, `unidades`, `tapa`, `precio`) VALUES
(1, 1, 1, 1, 'S', 100),
(2, 1, 2, 1, 'S', 50),
(3, 2, 3, 3, 'S', 50),
(4, 2, 4, 3, 'S', 50),
(5, 3, -1, 1, 'S', 280),
(6, 3, 8, 1, 'S', 200),
(7, 4, 8, 1, 'S', 200),
(8, 5, 8, 1, 'S', 200),
(9, 6, 8, 4, 'S', 200),
(10, 7, 8, 1, 'S', 200),
(11, 8, 8, 2, 'S', 200),
(12, 9, 7, 1, 'S', 280),
(13, 10, 8, 2, 'S', 200),
(14, 11, 8, 1, 'S', 200),
(15, 12, 31, 1, 'S', 80),
(16, 13, 40, 1, 'S', 120),
(17, 14, 31, 3, 'D', 0);

-- --------------------------------------------------------

--
-- Table structure for table `paises`
--

CREATE TABLE `paises` (
  `pais_id` int(11) NOT NULL,
  `pais_nom` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paises`
--

INSERT INTO `paises` (`pais_id`, `pais_nom`) VALUES
(1, '---'),
(2, 'PERU'),
(3, 'COLOMBIA'),
(4, 'ESPAÑA');

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `fecha` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `moneda` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pedidos`
--

INSERT INTO `pedidos` (`id`, `idcliente`, `fecha`, `estado`, `moneda`) VALUES
(1, 26, '1480640950', '1', 'S'),
(2, 26, '1480641039', '0', 'S'),
(3, 26, '1480643044', '0', 'S'),
(4, 26, '1480643330', '0', 'S'),
(5, 26, '1480643455', '0', 'S'),
(6, 26, '1480643493', '2', 'S'),
(7, 26, '1480643511', '-1', 'S'),
(8, 26, '1480645348', '2', 'S'),
(9, 26, '1480646121', '2', 'S'),
(10, 26, '1480647666', '-1', 'S'),
(11, 27, '1492811369', '-1', 'S'),
(12, 38, '1506220365', '0', 'S'),
(13, 38, '1507660152', '0', 'S'),
(14, 40, '1510421405', '0', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `prod_id` int(11) NOT NULL,
  `prod_nom` varchar(512) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `prod_aut` varchar(512) DEFAULT NULL,
  `prod_pais_id` varchar(255) DEFAULT NULL,
  `prod_edi` text,
  `prod_format` varchar(255) DEFAULT NULL,
  `prod_pagi` varchar(255) DEFAULT NULL,
  `prod_isbn` varchar(255) DEFAULT NULL,
  `prod_pre1` decimal(7,2) NOT NULL,
  `prod_pre2` decimal(7,2) NOT NULL,
  `prod_indi` varchar(255) DEFAULT NULL,
  `prod_resu` longtext,
  `prod_stock` int(255) DEFAULT NULL,
  `prod_acti_id` varchar(255) DEFAULT NULL,
  `prod_foto` varchar(255) DEFAULT NULL,
  `prod_cate_id` int(15) NOT NULL,
  `prod_scate_id` int(15) NOT NULL,
  `prod_edito_id` int(15) NOT NULL,
  `prod_year` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`prod_id`, `prod_nom`, `prod_aut`, `prod_pais_id`, `prod_edi`, `prod_format`, `prod_pagi`, `prod_isbn`, `prod_pre1`, `prod_pre2`, `prod_indi`, `prod_resu`, `prod_stock`, `prod_acti_id`, `prod_foto`, `prod_cate_id`, `prod_scate_id`, `prod_edito_id`, `prod_year`) VALUES
(23, 'METODOLOGÃA DE LA COMUNICACIÃ“N ACADÃ‰MICA Y CIENTÃFICA 	   El arte de escribir y cÃ³mo evitar el plagio', 'Lino Aranzamendi', '2', 'Primera', '17.5 x 24.5', '304', '978-9972-04-551-6', '55.00', '0.00', '', 'La obra llena un gran vacio en el aprendizaje de la escritura del rango acadÃ©mico y cientÃ­fico. El autor resuelve las interrogantes que se formulan sobre la diversidad de aspectos formales â€“relativos a recursos, estructuras y funcionesâ€“ para la redacciÃ³n de los textos acadÃ©micos y cientÃ­ficos.', 15, '2', 'libro23.jpg', 14, 6, 1, '2017'),
(24, 'EL DELITO DE LAVADO DE ACTIVO 	AnÃ¡lisis crÃ­tico', 'Manuel A. Abanto VÃ¡squez', '2', 'Primera', '17.5 x 24.5', '320', '978 - 9972 - 04 - 554 - 7', '0.00', '90.00', '', 'La obra expone un anÃ¡lisis sobre los principios penales y constitucionales, sobre la evoluciÃ³n histÃ³rica de la dogmÃ¡tica penal del tipo peruano del lavado de activo. \r\nCon una clara valoraciÃ³n crÃ­tica y analÃ­tica de los principios de nuestro sistema jurÃ­dico-penal, en un Estado de derecho.\r\n', 15, '2', 'libro24.jpg', 2, 1, 1, '2017'),
(25, 'LA PRUEBA EN EL DERECHO PROCESAL Su valoraciÃ³n testimonial, documental, pericial y sucedÃ¡neo', 'RaÃºl B. Canelo Rabanal', '2', 'Primera', '17.5 x 24.5', '640', '9789972045493', '0.00', '130.00', '', ': La presente obra marca un antes y un despuÃ©s en la incesante polÃ©mica del estudio de la prueba, pues se basa en una investigaciÃ³n realizada desde diversos enfoques del conocimiento. El tema central es establecer nuestra postura sobre la finalidad de la prueba. Para sustentar dicha posiciÃ³n, abordaremos el campo de la FilosofÃ­a y de la EpistemologÃ­a. AsÃ­, en cada capÃ­tulo presentaremos un estudio histÃ³rico que explicarÃ¡ el origen y la razÃ³n de ser de cada instituciÃ³n procesal. AdemÃ¡s, complementamos este estudio insertando la legislaciÃ³n procesal y la jurisprudencia vinculada a fin de que el lector encuentre las  diferencias y similitudes entre las instituciones procesales reguladas por nuestro CÃ³digo Procesal Civil.\r\n\r\n', 15, '2', 'libro25.jpg', 10, 2, 1, '2017'),
(26, 'VIOLACIÃ“N DE LA LIBERTAD E INDEMNIDAD SEXUAL', 'Ivan Noguera Ramos', '2', 'Primera', '17.5 x 24.5', '736', '9789972044892', '0.00', '130.00', '', 'El delito de violaciÃ³n constituye uno de los delitos mÃ¡s graves severamente castigados por la legislaciÃ³n penal peruana. Este se refiere al abuso de tipo sexual que sufre una persona en el cual queda absolutamente menoscabada su dignidad humana y su derecho a elegir libremente con quiÃ©n desea mantener una relaciÃ³n sexual. En la mayorÃ­a de los casos, la violaciÃ³n sexual, es decir, el contacto sexual entre violador y vÃ­ctima se encuentra acompaÃ±ado de violencia fÃ­sica y psicolÃ³gica para lograr el efectivo sometimiento de la vÃ­ctima.', 15, '2', 'libro26.jpg', 2, 1, 1, '2015'),
(27, 'FILOSOFÍA DEL DERECHO', 'Ramos Suyo J. A.', '2', 'Segunda', '17.5 x 24.5', '944', '9789972045509', '160.00', '0.00', '', 'La obra esta constituida por antiguos y nuevos estudios filosÃ³fico-jurÃ­dicos; ya que el aprendizaje de los lectores tiende a constituir vocaciÃ³n, concentraciÃ³n e intencionalidad. \r\nSus aportes se orientan por la integraciÃ³n filosÃ³fico-jurÃ­dica; reconociendo que el derecho es parte integrante de la filosofÃ­a. Por esta razÃ³n se convierte en un instrumento que aporta mÃºltiples conocimientos en aras de enriquecer a la disciplina jurÃ­dica. \r\n\r\n', 15, '2', 'libro27.jpg', 10, 2, 1, '2017'),
(20, 'EL JUICIO DEL SIGLO. EL CASO FUJIMORI Igualdad ante la Ley', 'JosÃ© Antonio PelÃ¡ez Bardales', '2', 'Primera', '17.5 x 24.5', '400', '978-9972-04-552-3', '38.00', '0.00', '', 'Este libro permite comprender y entender a los diversos personajes y las estrategias jurÃ­dicas, polÃ­ticas y mediÃ¡ticas que se emplearon en el caso mÃ¡s emblemÃ¡tico de la historia judicial y polÃ­tica del PerÃº.\r\nUna etapa de la historia que sigue generando debate y que todo peruano debe saber.\r\n', 15, '2', 'libro20.jpg', 2, 1, 1, '2017'),
(28, 'SALUD PARA TODOS CÃ³mo vivir saludable y prevenir las  enfermedades mÃ¡s frecuentes', 'Joseph SÃ¡nchez Gavidia', '2', 'Primera', '17.5 x 24.5', '448', '9789972045479', '60.00', '0.00', '', 'Es un libro de consulta familiar Ãºtil para la vida, donde se brindan los conocimientos bÃ¡sicos y necesarios que toda persona debe tener para alcanzar y mantener un estilo de vida saludable. Se hace un recorrido del cuerpo humano, los Ã³rganos y sistemas que lo componen.', 15, '2', 'libro28.jpg', 18, 7, 1, '2017'),
(29, 'LA INICIATIVA PROBATORIA DEL JUEZ Racionalidad de la Prueba de Oficio', 'Luis Alfaro Valverde', '2', 'Primera', '17.5 x 24.5', '306', '9789972045486', '0.00', '85.00', '', 'La obra se analiza, de modo crÃ­tico, el problema de las pruebas de oficio, denominado por el autor como: Iniciativa Probatoria del Juez. Contiene un minucioso estudio histÃ³rico, normativo y jurisprudencial, siendo un gran aporte en el proceso civil peruano. Se pretende una redefiniciÃ³n teÃ³rica del modo como se ha estudiado a nivel nacional, ademÃ¡s, se exponen razones para su mejor comprensiÃ³n; especÃ­ficamente, se emplea el enfoque racionalista de la prueba sobre uno de los poderes probatorios del juez. TambiÃ©n, algunos  criterios para su adecuada utilizaciÃ³n en primera y en segunda instancia.', 15, '2', 'libro29.jpg', 10, 2, 1, '2017'),
(30, 'PROCESOS JUDICIALES DERIVADOS DEL DERECHO DE FAMILIA', 'Alberto Hinostroza Minguez', '2', 'Segunda', '17.5 x 24.5', '1264', '9786124362019', '140.00', '0.00', '', 'Esta obra trata, sobre las pretensiones (contenciosas o no contenciosas) relacionadas con la indicada rama del Derecho de Familia cuya normatividad, estÃ¡ orientada a regular todas aquellas situaciones de orden jurÃ­dico que nacen del referido grupo social y que se traducen en una serie de poderes y deberes asignados a sus integrantes que acarrean consecuencias no solo para ellos sino tambiÃ©n respecto de terceros en algunos casos.', 15, '2', 'libro30.jpg', 10, 2, 1, '2017'),
(31, 'FILOSOFÃA DEL DERECHO Derechos Humanos, ArgumentaciÃ³n JurÃ­dica y Neoconstitucionalismo', 'Enrique MÃ¡rmol Palacios', '2', 'Segunda', '17.5 x 24.5', '432', '9789972045462', '80.00', '0.00', '', 'La obra contiene un profundo planteamiento teÃ³rico-prÃ¡ctico con un lenguaje meta-jurÃ­dico, donde confluyen los autores clÃ¡sicos y modernos, con una versada metodologÃ­a con nuevas estructuras interrelacionadas con el proceso enseÃ±anza-aprendizaje de la filosofÃ­a, la lÃ³gica, la sociologÃ­a jurÃ­dica y el derecho, de carÃ¡cter ontolÃ³gico y deontolÃ³gico, en la bÃºsqueda epistemolÃ³gica de la luz, de los saberes. Aborda en su contenido, no solo los antecedentes de la filosofÃ­a del derecho, sino la propia interpretaciÃ³n como clave hermenÃ©utica de la justicia, la axiologÃ­a y la argumentaciÃ³n jurÃ­dica.', 6, '2', 'libro31.jpg', 10, 2, 1, '2017'),
(32, 'MANUAL TEÃ“RICO-PRÃCTICO 	DEL SISTEMA PROCESAL PENAL', 'Marco Aurelio Tejada Ortiz', '2', 'primera', '17.5 x 24.5', '448', '9789972045349', '75.00', '0.00', '', 'El CÃ³digo Procesal Penal (Decreto Legislativo N. 957) procura alcanzar eficiencia con garantismo y con base, claro estÃ¡, al manejo mucho mÃ¡s versado de la Â«teorÃ­a del casoÂ» y, evidentemente, de las Â«tÃ©cnicas de litigaciÃ³n oralÂ»;  instrumentos procedimentales empleados en la praxis para el convencimiento absoluto del funcionario judicial en el caso discernido. En efecto, tanto el representante de la fiscalÃ­a como del imputado gozarÃ¡n de igualdad en oportunidades, esto es, para equilibrar el proceso, al momento de ser oÃ­dos, a la hora de interrogar y contrainterrogar a testigos y peritos, asÃ­ como al instante de presentar medios de convicciÃ³n y otros.', 7, '2', 'libro32.jpg', 2, 1, 1, '2016'),
(33, 'CONTRATOS MERCANTILES 	Contratos Modernos', 'Erik Francesc Obiol Anaya', '2', 'Primera', '17.5 x 24.5', '448', '9789972045370', '75.00', '0.00', 'demo', 'En el presente trabajo proporcionaremos algunas nociones generales del contrato porque los llamados contratos modernos o atÃ­picos se regulan por las normas generales de contrataciÃ³n, que no son mÃ¡s que las liberalidades por las que ambas partes firmantes se van a comprometer de manera conmutativa. En ese sentido, podemos decir que la doctrina mÃ¡s reciente aplica el concepto de contrato exclusivamente respecto de todos aquellos negocios jurÃ­dicos que inciden sobre relaciones jurÃ­dicas patrimoniales. Si lo vemos desde esta perspectiva, podrÃ­amos afirmar lo siguiente: â€œEl contrato es el negocio jurÃ­dico patrimonial de carÃ¡cter bilateral cuyo efecto consiste en construir, modificar o extinguir una relaciÃ³n jurÃ­dica patrimonialâ€.\r\n\r\n', 8, '2', 'libro33.jpg', 12, 4, 1, '2016'),
(34, 'ESTUDIOS ACTUALES DEL REGISTRO DE PERSONAS JURÃDICAS', 'Manuel Alejandro Mallqui LuzquiÃ±os Cristian Ociel Caballero Arroyo', '2', 'Primera', '17.5 x 24.5', '250', '9789972045448', '45.00', '0.00', '', 'La presente obra es un trabajo conjunto de la experiencia profesional de los autores en el Registro de Personas JurÃ­dicas. Los temas comprendidos se abordan desde un punto de vista doctrinario y casuÃ­stico, en relaciÃ³n a la jurisprudencia del Tribunal Registral en el PerÃº, que permiten analizar las instituciones como el objeto social, el rÃ©gimen orgÃ¡nico de las personas jurÃ­dicas, prÃ³rroga de sus Ã³rganos directivos, la problemÃ¡tica de la inscripciÃ³n en torno a los actos y derechos de las comunidades campesinas, y al mismo tiempo adoptar una postura crÃ­tica frente al rÃ©gimen legal vigente.\r\n\r\n', 10, '2', 'libro34.jpg', 15, 6, 1, '2017'),
(35, 'LA INVESTIGACIÃ“N DEL DELITO EN EL PROCESO PENAL', 'Luis Pastor Salazar', '2', 'Segunda', '17.5 x 24.5', '832', '9789972045318', '0.00', '140.00', '', 'Con el fin de profundizar en una crÃ­tica al sistema inquisitivo en sus formas de construir la verdad, esta obra se constituye en una de las herramientas jurÃ­dicas mÃ¡s importantes de la legislaciÃ³n peruana. El aporte fundamental de este libro es que se trata de una guÃ­a Ãºtil y prÃ¡ctica para los estudiantes y profesionales del derecho que comienzan sus estudios en la investigaciÃ³n del delito en el sistema procesal penal y que buscan la soluciÃ³n de los conflictos sociales.', 6, '2', 'libro35.jpg', 2, 1, 1, '2016'),
(36, 'LAS VÃCTIMAS Y SUS DERECHOS', 'Jhonn Medina Olivas', '2', 'Primera', '17.5 x 24.5', '272', '9789972045271', '0.00', '75.00', '', 'Velar por la defensa de la persona humana y el respeto a su dignidad es el objetivo principal de esta obra que brinda un instrumento de apoyo para los operadores de justicia. Mejorar el servicio a la poblaciÃ³n y contribuir al enriquecimiento de los conocimientos en el tratamiento a las vÃ­ctimas, testigos, peritos y colaboradores; permitirÃ¡ garantizar el derecho a la vida, a la dignidad humana, al respeto de su integridad fÃ­sica, psÃ­quica, psicolÃ³gica y moral.', 8, '2', 'libro36.jpg', 2, 1, 1, '2016'),
(37, 'DERECHO PENAL PARTE GENERAL', 'Felipe Villavicencio Terrones', '2', 'Primera', '17.5 x 24.5', '812', '9789972040788', '60.00', '0.00', '', 'Quince aÃ±os despuÃ©s de su primera obra sobre la parte general el profesor Villavicencio nos entrega este nuevo libro que moderniza su sistemÃ¡tica, indica y muestra el manejo Ã¡gil y profundo de una bibliografÃ­a muy considerable, sintetiza con acierto las opiniones ajenas y expone sus propias soluciones con claridad. Nada de lo que actualmente se discute en el plano jurÃ­dico-penal escapa a la atenciÃ³n del autor en esta obra general. Se expone las ideas del pasado y las del presente, se critican y valoran dejando ver con claridad la lÃ­nea  expositiva de la sistemÃ¡tica propia del autor.\r\n\r\n', 8, '2', 'libro37.jpg', 2, 1, 1, '2017'),
(38, 'Los niÃ±os de plomo 	La omisiÃ³n del deber y el derecho de los niÃ±os a la vida y la salud', 'Jorge Luis Salazar', '2', 'Primera', '17.5 x 24.5', '98', '9789972045455', '20.00', '0.00', '', 'Esta narrativa expresa las paradojas de la convivencia humana en un contexto de riqueza material, de grave contaminaciÃ³n y de la extrema pobreza.', 7, '2', 'libro38.jpg', 17, 5, 1, '2017'),
(39, 'GradÃºese de MagÃ­ster y Doctor en ciencias jurÃ­dicas', 'Juan Ramos Suyo', '2', 'Tercera', '17.5 x 24.5', '464', '9789972044915', '100.00', '0.00', '', 'La presente obra brinda las herramientas necesarias que todo graduando en Derecho debe aplicar para concretar el objeto de estudio que debe estar orientado a resolver parte de la problemÃ¡tica jurÃ­dica existente. Proyecto que finalizado le permitirÃ¡ elaborar el plan de tesis a sustentar.  ', 8, '2', 'libro39.jpg', 14, 5, 1, '2016'),
(40, 'DERECHO INDIVIDUAL DEL TRABAJO', 'TeÃ³fila T. DÃ­az Aroco / CÃ©sar M. Benavides DÃ­az', '2', 'Segunda', '17.5 x 24.5', '790', '9789972045110', '120.00', '0.00', '', '\r\nLa Obra es bastante didÃ¡ctica para ser comprendida en Ã¡mbito del Derecho individual del trabajo, los temas son tratados con rigor y claridad, con un anÃ¡lisis, con un anÃ¡lisis crÃ­tico, concreto y objetivo, cuidando la relaciÃ³n causa-efecto del diagnÃ³stico integral de la problemÃ¡tica central, teniendo presente la legislaciÃ³n legal vigente, diversas fuentes bibliogrÃ¡ficas nacionales e internacionales, con un enfoque doctrinario y legislativo comprendiendo casos prÃ¡cticos, modelos de contrato y jurisprudencia.\r\n', 8, '2', 'libro40.jpg', 11, 5, 1, '2016');

-- --------------------------------------------------------

--
-- Table structure for table `prod_activo`
--

CREATE TABLE `prod_activo` (
  `acti_id` int(10) NOT NULL,
  `acti_nom` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prod_activo`
--

INSERT INTO `prod_activo` (`acti_id`, `acti_nom`) VALUES
(1, '---'),
(2, 'Si'),
(3, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `recuperar_ps`
--

CREATE TABLE `recuperar_ps` (
  `id` int(10) UNSIGNED NOT NULL,
  `idusuario` int(10) UNSIGNED NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `token` varchar(64) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recuperar_ps`
--

INSERT INTO `recuperar_ps` (`id`, `idusuario`, `usuario`, `token`, `creado`) VALUES
(42, 7, 'jcarlos', '050532fa4af288bf3f702b8a84f5034ab78cb2e1', '2016-08-10 16:40:38'),
(44, 34, 'grijle', 'b238a31e27af476bb6dc7a061249853767692cbc', '2016-08-19 01:52:31'),
(45, 5, 'luigui1', '88d637d7f22455e5dee859b5944a8b7583e04961', '2016-08-19 22:38:27'),
(50, 24, 'cliente1', 'f8e0ee66744767be7192405cf7fdcdbb02d874f7', '2016-10-25 19:44:53'),
(54, 26, 'oswaldo', 'fddfa7e7ac16a746e5d265c0e2ba52263ddd1478', '2016-10-25 19:50:15'),
(55, 25, 'mckenneth', 'e9e4b9139cc306ed481c4d6ed731176622431919', '2016-10-25 19:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `scategorias`
--

CREATE TABLE `scategorias` (
  `scate_id` int(11) NOT NULL,
  `scate_nom` varchar(255) DEFAULT NULL,
  `scate_dsc` varchar(255) DEFAULT NULL,
  `scate_cate_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scategorias`
--

INSERT INTO `scategorias` (`scate_id`, `scate_nom`, `scate_dsc`, `scate_cate_id`) VALUES
(1, 'Procesal Penal', '', 2),
(2, 'Procesal  Civil', 'Procesal  Civil', 10),
(3, 'Administrativo', '', 1),
(4, 'Penal Economico', '', 2),
(5, 'literatura', '', 17),
(6, ' Argumentación Jurídica', '', 14),
(7, 'Medicina', '', 18);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `titulo` varchar(150) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `imagen`, `titulo`, `descripcion`) VALUES
(14, 'slide19.jpg', 'el juicio del siglo', ''),
(15, 'slide15.jpg', 'slide', '');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `us` varchar(45) DEFAULT NULL,
  `ps` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='			';

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idusuario`, `us`, `ps`) VALUES
(6, 'admin', '123'),
(7, 'nestor', '72150326');

-- --------------------------------------------------------

--
-- Table structure for table `valores`
--

CREATE TABLE `valores` (
  `dato` varchar(50) NOT NULL DEFAULT '',
  `valor` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `valores`
--

INSERT INTO `valores` (`dato`, `valor`) VALUES
('c_url', 'http://localhost:85/grijleimport/'),
('tipo_cambio', '3.341');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vis_detalle_pedidos`
-- (See below for the actual view)
--
CREATE TABLE `vis_detalle_pedidos` (
`unidades` int(100)
,`tapa` varchar(1)
,`precio` float
,`prod_nom` varchar(512)
,`moneda` varchar(1)
,`id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vis_gproductos`
-- (See below for the actual view)
--
CREATE TABLE `vis_gproductos` (
`gprod_id` int(11)
,`prod_id` int(11)
,`prod_nom` varchar(512)
,`scate_nom` varchar(255)
,`gprod_foto` varchar(255)
,`gprod_nom` varchar(180)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vis_productos`
-- (See below for the actual view)
--
CREATE TABLE `vis_productos` (
`prod_id` int(11)
,`prod_nom` varchar(512)
,`prod_aut` varchar(512)
,`prod_pais_id` varchar(255)
,`pais_id` int(11)
,`pais_nom` varchar(255)
,`prod_edi` text
,`prod_format` varchar(255)
,`prod_pagi` varchar(255)
,`prod_isbn` varchar(255)
,`prod_pre1` decimal(7,2)
,`prod_pre2` decimal(7,2)
,`prod_indi` varchar(255)
,`prod_resu` longtext
,`prod_stock` int(255)
,`prod_foto` varchar(255)
,`prod_cate_id` int(15)
,`cate_id` int(11)
,`cate_nom` varchar(255)
,`acti_nom` varchar(255)
,`acti_id` int(10)
,`scate_id` int(11)
,`scate_nom` varchar(255)
,`prod_scate_id` int(15)
,`prod_edito_id` int(15)
,`prod_acti_id` varchar(255)
,`edito_nom` varchar(255)
,`edito_id` int(10)
,`prod_year` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vis_scategorias`
-- (See below for the actual view)
--
CREATE TABLE `vis_scategorias` (
`cate_nom` varchar(255)
,`scate_id` int(11)
,`cate_id` int(11)
,`scate_nom` varchar(255)
,`scate_cate_id` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `vis_detalle_pedidos`
--
DROP TABLE IF EXISTS `vis_detalle_pedidos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ab6952`@`localhost` SQL SECURITY DEFINER VIEW `vis_detalle_pedidos`  AS SELECT `lineaspedido`.`unidades` AS `unidades`, `lineaspedido`.`tapa` AS `tapa`, `lineaspedido`.`precio` AS `precio`, `productos`.`prod_nom` AS `prod_nom`, `pedidos`.`moneda` AS `moneda`, `pedidos`.`id` AS `id` FROM ((`lineaspedido` join `pedidos` on((`pedidos`.`id` = `lineaspedido`.`idpedido`))) join `productos` on((`productos`.`prod_id` = `lineaspedido`.`prod_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vis_gproductos`
--
DROP TABLE IF EXISTS `vis_gproductos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ab6952`@`localhost` SQL SECURITY DEFINER VIEW `vis_gproductos`  AS SELECT `gproductos`.`gprod_id` AS `gprod_id`, `vis_productos`.`prod_id` AS `prod_id`, `vis_productos`.`prod_nom` AS `prod_nom`, `vis_productos`.`scate_nom` AS `scate_nom`, `gproductos`.`gprod_foto` AS `gprod_foto`, `gproductos`.`gprod_nom` AS `gprod_nom` FROM (`gproductos` join `vis_productos` on((`vis_productos`.`prod_id` = `gproductos`.`gprod_prod_id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `vis_productos`
--
DROP TABLE IF EXISTS `vis_productos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ab6952`@`localhost` SQL SECURITY DEFINER VIEW `vis_productos`  AS SELECT `productos`.`prod_id` AS `prod_id`, `productos`.`prod_nom` AS `prod_nom`, `productos`.`prod_aut` AS `prod_aut`, `productos`.`prod_pais_id` AS `prod_pais_id`, `paises`.`pais_id` AS `pais_id`, `paises`.`pais_nom` AS `pais_nom`, `productos`.`prod_edi` AS `prod_edi`, `productos`.`prod_format` AS `prod_format`, `productos`.`prod_pagi` AS `prod_pagi`, `productos`.`prod_isbn` AS `prod_isbn`, `productos`.`prod_pre1` AS `prod_pre1`, `productos`.`prod_pre2` AS `prod_pre2`, `productos`.`prod_indi` AS `prod_indi`, `productos`.`prod_resu` AS `prod_resu`, `productos`.`prod_stock` AS `prod_stock`, `productos`.`prod_foto` AS `prod_foto`, `productos`.`prod_cate_id` AS `prod_cate_id`, `categorias`.`cate_id` AS `cate_id`, `categorias`.`cate_nom` AS `cate_nom`, `prod_activo`.`acti_nom` AS `acti_nom`, `prod_activo`.`acti_id` AS `acti_id`, `scategorias`.`scate_id` AS `scate_id`, `scategorias`.`scate_nom` AS `scate_nom`, `productos`.`prod_scate_id` AS `prod_scate_id`, `productos`.`prod_edito_id` AS `prod_edito_id`, `productos`.`prod_acti_id` AS `prod_acti_id`, `editorial`.`edito_nom` AS `edito_nom`, `editorial`.`edito_id` AS `edito_id`, `productos`.`prod_year` AS `prod_year` FROM (((((`productos` join `paises` on((`paises`.`pais_id` = `productos`.`prod_pais_id`))) join `prod_activo` on((`prod_activo`.`acti_id` = `productos`.`prod_acti_id`))) join `categorias` on((`categorias`.`cate_id` = `productos`.`prod_cate_id`))) join `scategorias` on((`scategorias`.`scate_id` = `productos`.`prod_scate_id`))) join `editorial` on((`editorial`.`edito_id` = `productos`.`prod_edito_id`))) ORDER BY `productos`.`prod_id` DESC ;

-- --------------------------------------------------------

--
-- Structure for view `vis_scategorias`
--
DROP TABLE IF EXISTS `vis_scategorias`;

CREATE ALGORITHM=UNDEFINED DEFINER=`ab6952`@`localhost` SQL SECURITY DEFINER VIEW `vis_scategorias`  AS SELECT `categorias`.`cate_nom` AS `cate_nom`, `scategorias`.`scate_id` AS `scate_id`, `categorias`.`cate_id` AS `cate_id`, `scategorias`.`scate_nom` AS `scate_nom`, `scategorias`.`scate_cate_id` AS `scate_cate_id` FROM (`categorias` join `scategorias` on((`scategorias`.`scate_cate_id` = `categorias`.`cate_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`edito_id`);

--
-- Indexes for table `gproductos`
--
ALTER TABLE `gproductos`
  ADD PRIMARY KEY (`gprod_id`);

--
-- Indexes for table `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`idlibro`);

--
-- Indexes for table `lineaspedido`
--
ALTER TABLE `lineaspedido`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`pais_id`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `prod_activo`
--
ALTER TABLE `prod_activo`
  ADD PRIMARY KEY (`acti_id`);

--
-- Indexes for table `recuperar_ps`
--
ALTER TABLE `recuperar_ps`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idusuario` (`idusuario`);

--
-- Indexes for table `scategorias`
--
ALTER TABLE `scategorias`
  ADD PRIMARY KEY (`scate_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indexes for table `valores`
--
ALTER TABLE `valores`
  ADD PRIMARY KEY (`dato`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `editorial`
--
ALTER TABLE `editorial`
  MODIFY `edito_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gproductos`
--
ALTER TABLE `gproductos`
  MODIFY `gprod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `libro`
--
ALTER TABLE `libro`
  MODIFY `idlibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lineaspedido`
--
ALTER TABLE `lineaspedido`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `paises`
--
ALTER TABLE `paises`
  MODIFY `pais_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `prod_activo`
--
ALTER TABLE `prod_activo`
  MODIFY `acti_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recuperar_ps`
--
ALTER TABLE `recuperar_ps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `scategorias`
--
ALTER TABLE `scategorias`
  MODIFY `scate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
