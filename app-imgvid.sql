-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 06-07-2012 a las 19:08:17
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `app-imgvid`
-- 

CREATE DATABASE `app-imgvid`;
USE `app-imgvid`;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `establecimientosfotos`
-- 

CREATE TABLE `fotos` (
  `id` int(11) NOT NULL auto_increment COMMENT 'ID del registro',
  `name` text COMMENT 'Nombre completo de la foto incluyendo extension',
  `nameTumb` text COMMENT 'Es el nombre del thumbanils(imagen miniatura) incluyendo extension',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `establecimientosvideos`
-- 

CREATE TABLE `videos` (
  `id` int(11) NOT NULL auto_increment COMMENT 'ID del registro',
  `name` text COMMENT 'Nombre completo de la foto incluyendo extension',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
