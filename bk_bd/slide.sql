-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Fev-2018 às 16:23
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imgFondo` text NOT NULL,
  `tipoSlide` text NOT NULL,
  `imgProducto` text NOT NULL,
  `estiloImgProducto` text NOT NULL,
  `estiloTextoSlide` text NOT NULL,
  `titulo1` text NOT NULL,
  `titulo2` text NOT NULL,
  `titulo3` text NOT NULL,
  `boton` text NOT NULL,
  `url` text NOT NULL,
  `fecha` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `slide`
--

INSERT INTO `slide` (`id`, `imgFondo`, `tipoSlide`, `imgProducto`, `estiloImgProducto`, `estiloTextoSlide`, `titulo1`, `titulo2`, `titulo3`, `boton`, `url`, `fecha`) VALUES
(1, 'vistas/img/slide/default/back_default.jpg', 'slideOpcion1', 'vistas/img/slide/slide1/calzado.png', '{"top":"15%", "right":"10%", "width":"45%", "left":""}', '{"top":"20%", "right":"", "width":"40%", "left":"10%"}', '{"texto":"Lorem Ipsum", "color":"#333"}', '{"texto":"Lorem Ipsum Lorem Ipsum", "color":"#777"}', '{"texto":"Lorem Ipsum Lorem Ipsum Lorem Ipsum", "color":"#888"}', '<button class="btn btn-default backColor text-uppercase">\r\n                                VER PRODUCTO <span class="fa fa-chevron-right"></span>\r\n                            </button> ', '#', '2018-02-21 16:43:59'),
(10, 'vistas/img/slide/default/back_default.jpg', 'slideOpcion2', 'vistas/img/slide/slide2/curso.png', '{"top":"5%", "right":"", "width":"25%", "left":"15%"}', '{"top":"20%", "right":"10%", "width":"40%", "left":""}', '{"texto":"Lorem Ipsum", "color":"#333"}', '{"texto":"Lorem Ipsum Lorem Ipsum", "color":"#777"}', '{"texto":"Lorem Ipsum Lorem Ipsum Lorem Ipsum", "color":"#888"}', '<button class="btn btn-default backColor text-uppercase">\r\n                                VER PRODUCTO <span class="fa fa-chevron-right"></span>\r\n                            </button> ', '#', '2018-02-21 16:56:22'),
(11, 'vistas/img/slide/slide3/fondo2.jpg', 'slideOpcion2', 'vistas/img/slide/slide3/iphone.png', '{"top":"5%", "right":"", "width":"25%", "left":"15%"}', '{"top":"20%", "right":"10%", "width":"40%", "left":""}', '{"texto":"Lorem Ipsum", "color":"#333"}', '{"texto":"Lorem Ipsum Lorem Ipsum", "color":"#777"}', '{"texto":"Lorem Ipsum Lorem Ipsum Lorem Ipsum", "color":"#888"}', '<button class="btn btn-default backColor text-uppercase">\r\n                                VER PRODUCTO <span class="fa fa-chevron-right"></span>\r\n                            </button> ', '#', '2018-02-21 16:57:47'),
(12, 'vistas/img/slide/slide4/fondo3.jpg', 'slideOpcion1', '', '', '{"top":"20%", "right":"", "width":"40%", "left":"10%"}', '{"texto":"Lorem Ipsum", "color":"#333"}', '{"texto":"Lorem Ipsum Lorem Ipsum", "color":"#777"}', '{"texto":"Lorem Ipsum Lorem Ipsum Lorem Ipsum", "color":"#888"}', '', '#', '2018-02-21 17:00:02');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
