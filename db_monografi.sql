-- phpMyAdmin SQL Dump
-- version 2.8.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Mar 22, 2010 at 09:23 AM
-- Server version: 5.0.21
-- PHP Version: 5.1.4
-- 
-- Database: `monografi`
-- 
CREATE DATABASE `monografi` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `monografi`;

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_fitur`
-- 

CREATE TABLE `tbl_fitur` (
  `idFitur` int(11) NOT NULL auto_increment,
  `value` text collate latin1_general_ci NOT NULL,
  `bln` int(11) NOT NULL,
  `thn` year(4) NOT NULL,
  `kdKatChild` varchar(10) collate latin1_general_ci NOT NULL,
  `kdKatParent` varchar(10) collate latin1_general_ci NOT NULL,
  `idUser` varchar(6) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`idFitur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=201 ;

-- 
-- Dumping data for table `tbl_fitur`
-- 

INSERT INTO `tbl_fitur` VALUES (1, '5513', 1, 2009, '', '1.a', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (2, '175', 1, 2009, '', '1.b', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (3, '9647.75', 1, 2009, '', '1.c', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (4, '', 1, 2009, '1.d.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (5, '', 1, 2009, '1.d.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (6, '', 1, 2009, '2.a.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (7, '', 1, 2009, '2.a.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (8, '', 1, 2009, '2.a.3', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (9, '', 1, 2009, '3.a.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (10, '', 1, 2009, '3.a.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (11, '', 1, 2009, '3.a.3', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (12, '', 1, 2009, '3.a.4', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (13, '', 1, 2009, '3.a.5', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (14, '', 1, 2009, '3.a.6', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (15, '', 1, 2009, '3.a.7', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (16, '', 1, 2009, '3.a.8', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (17, '', 1, 2009, '3.a.9', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (18, '', 1, 2009, '3.a.10', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (19, '', 1, 2009, '3.a.11', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (20, '', 1, 2009, '3.a.12', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (21, '', 1, 2009, '3.a.13', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (22, '', 1, 2009, '3.b.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (23, '', 1, 2009, '3.b.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (24, '', 1, 2009, '3.b.3', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (25, '', 1, 2009, '3.b.4', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (26, '', 1, 2009, '3.b.5', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (27, '', 1, 2009, '3.b.6', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (28, '', 1, 2009, '3.b.7', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (29, '', 1, 2009, '3.b.8', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (30, '', 1, 2009, '3.b.9', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (31, '', 1, 2009, '3.b.10', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (32, '', 1, 2009, '3.b.11', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (33, '', 1, 2009, '3.b.12', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (34, '', 1, 2009, '3.b.13', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (35, '', 1, 2009, '', '3.c', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (36, '', 1, 2009, '', '3.d', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (37, '', 1, 2009, '', '3.e', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (38, '', 1, 2009, '', '3.f', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (39, '', 1, 2009, '3.g.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (40, '', 1, 2009, '3.g.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (41, '', 1, 2009, '3.g.3', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (42, '', 1, 2009, '3.g.4', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (43, '', 1, 2009, '4.a.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (44, '', 1, 2009, '4.a.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (45, '', 1, 2009, '4.a.3', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (46, '', 1, 2009, '4.a.4', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (47, '', 1, 2009, '4.a.5', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (48, '', 1, 2009, '4.a.6', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (49, '', 1, 2009, '4.a.7', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (50, '', 1, 2009, '4.a.8', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (51, '', 1, 2009, '4.a.9', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (52, '', 1, 2009, '4.a.10', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (53, '', 1, 2009, '4.b.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (54, '', 1, 2009, '4.b.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (55, '', 1, 2009, '4.b.3', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (56, '', 1, 2009, '4.b.4', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (57, '', 1, 2009, '', '4.c', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (58, '', 1, 2009, '', '4.d', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (59, '', 1, 2009, '', '4.e', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (60, '', 1, 2009, '4.f.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (61, '', 1, 2009, '4.f.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (62, '', 1, 2009, '4.f.3', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (63, '', 1, 2009, '4.f.4', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (64, '', 1, 2009, '', '4.g', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (65, '', 1, 2009, '', '4.h', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (66, '', 1, 2009, '', '5.a', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (67, '', 1, 2009, '', '5.b', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (68, '', 1, 2009, '', '5.c', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (69, '', 1, 2009, '', '5.d', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (70, '', 1, 2009, '', '5.e', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (71, '', 1, 2009, '', '5.f', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (72, '', 1, 2009, '', '6.a', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (73, '', 1, 2009, '', '6.b', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (74, '', 1, 2009, '7.a.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (75, '', 1, 2009, '7.a.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (76, '', 1, 2009, '7.a.3', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (77, '', 1, 2009, '7.a.4', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (78, '', 1, 2009, '7.a.5', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (79, '', 1, 2009, '7.a.6', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (80, '', 1, 2009, '', '7.b', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (81, '', 1, 2009, '', '8.a', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (82, '', 1, 2009, '', '8.b', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (83, '', 1, 2009, '', '8.c', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (84, '', 1, 2009, '', '8.d', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (85, '', 1, 2009, '', '9.a', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (86, '', 1, 2009, '', '9.b', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (87, '', 1, 2009, '10.a.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (88, '', 1, 2009, '10.a.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (89, '', 1, 2009, '', '10.b', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (90, '', 1, 2009, '', '10.c', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (91, '', 1, 2009, '', '10.d', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (92, '', 1, 2009, '11.a.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (93, '', 1, 2009, '11.a.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (94, '', 1, 2009, '11.a.3', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (95, '', 1, 2009, '', '11.b', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (96, '', 1, 2009, '11.c.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (97, '', 1, 2009, '11.c.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (98, '', 1, 2009, '11.c.3', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (99, '', 1, 2009, '11.c.4', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (100, '', 1, 2009, '11.c.5', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (101, '', 1, 2009, '12.a.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (102, '', 1, 2009, '12.a.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (103, '', 1, 2009, '12.a.3', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (104, '', 1, 2009, '12.a.4', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (105, '', 1, 2009, '12.a.5', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (106, '', 1, 2009, '12.a.6', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (107, '', 1, 2009, '12.a.7', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (108, '', 1, 2009, '', '12.b', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (109, '', 1, 2009, '', '13.a', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (110, '', 1, 2009, '13.b.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (111, '', 1, 2009, '13.b.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (112, '', 1, 2009, '', '13.c', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (113, '', 1, 2009, '', '13.d', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (114, '', 1, 2009, '14.a.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (115, '', 1, 2009, '14.a.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (116, '', 1, 2009, '14.a.3', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (117, '', 1, 2009, '14.a.4', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (118, '', 1, 2009, '14.b.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (119, '', 1, 2009, '14.b.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (120, '', 1, 2009, '14.b.3', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (121, '', 1, 2009, '', '15.a', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (122, '', 1, 2009, '', '15.b', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (123, '', 1, 2009, '16.a.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (124, '', 1, 2009, '16.a.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (125, '', 1, 2009, '16.a.3', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (126, '', 1, 2009, '', '17.a', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (127, '', 1, 2009, '', '17.b', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (128, '', 1, 2009, '', '17.c', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (129, '', 1, 2009, '17.d.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (130, '', 1, 2009, '17.d.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (131, '', 1, 2009, '17.d.3', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (132, '', 1, 2009, '', '18.a', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (133, '', 1, 2009, '', '18.b', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (134, '', 1, 2009, '', '18.c', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (135, '', 1, 2009, '19.a.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (136, '', 1, 2009, '19.a.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (137, '', 1, 2009, '19.a.3', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (138, '', 1, 2009, '', '19.b', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (139, '', 1, 2009, '', '19.c', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (140, '', 1, 2009, '', '20.a', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (141, '', 1, 2009, '', '20.b', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (142, '', 1, 2009, '21.a.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (143, '', 1, 2009, '21.a.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (144, '', 1, 2009, '21.a.3', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (145, '', 1, 2009, '21.b.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (146, '', 1, 2009, '21.b.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (147, '', 1, 2009, '21.b.3', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (148, '', 1, 2009, '21.b.4', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (149, '', 1, 2009, '21.c.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (150, '', 1, 2009, '21.c.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (151, '', 1, 2009, '21.c.3', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (152, '', 1, 2009, '21.c.4', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (153, '', 1, 2009, '21.c.5', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (154, '', 1, 2009, '21.c.6', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (155, '', 1, 2009, '21.d.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (156, '', 1, 2009, '21.d.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (157, '', 1, 2009, '', '21.e', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (158, '', 1, 2009, '21.f.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (159, '', 1, 2009, '21.f.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (160, '', 1, 2009, '21.f.3', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (161, '', 1, 2009, '21.f.4', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (162, '', 1, 2009, '21.f.5', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (163, '', 1, 2009, '21.f.6', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (164, '', 1, 2009, '21.f.7', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (165, '', 1, 2009, '', '22.a', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (166, '', 1, 2009, '22.b.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (167, '', 1, 2009, '22.b.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (168, '', 1, 2009, '', '22.c', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (169, '', 1, 2009, '22.d.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (170, '', 1, 2009, '22.d.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (171, '', 1, 2009, '22.d.3', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (172, '', 1, 2009, '22.d.4', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (173, '', 1, 2009, '22.d.5', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (174, '', 1, 2009, '22.d.6', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (175, '', 1, 2009, '22.e.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (176, '', 1, 2009, '22.e.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (177, '', 1, 2009, '22.e.3', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (178, '', 1, 2009, '22.e.4', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (179, '', 1, 2009, '22.e.5', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (180, '', 1, 2009, '22.e.6', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (181, '', 1, 2009, '22.e.7', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (182, '', 1, 2009, '22.e.8', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (183, '', 1, 2009, '22.f.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (184, '', 1, 2009, '22.f.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (185, '', 1, 2009, '22.f.3', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (186, '', 1, 2009, '22.f.4', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (187, '', 1, 2009, '22.f.5', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (188, '', 1, 2009, '22.f.6', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (189, '', 1, 2009, '22.f.7', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (190, '', 1, 2009, '22.f.8', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (191, '', 1, 2009, '22.f.9', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (192, '', 1, 2009, '22.f.10', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (193, '', 1, 2009, '22.f.11', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (194, '', 1, 2009, '22.f.12', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (195, '', 1, 2009, '22.g.1', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (196, '', 1, 2009, '22.g.2', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (197, '', 1, 2009, '22.g.3', '', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (198, '', 1, 2009, '', '23.a', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (199, '', 1, 2009, '', '23.b', 'H723B4');
INSERT INTO `tbl_fitur` VALUES (200, '', 1, 2009, '', '23.c', 'H723B4');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_hak`
-- 

CREATE TABLE `tbl_hak` (
  `idHak` int(11) NOT NULL auto_increment,
  `namaHak` text collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`idHak`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `tbl_hak`
-- 

INSERT INTO `tbl_hak` VALUES (1, 'adminkab');
INSERT INTO `tbl_hak` VALUES (2, 'adminkec');
INSERT INTO `tbl_hak` VALUES (3, 'admindes');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_katchild`
-- 

CREATE TABLE `tbl_katchild` (
  `idKatChild` int(11) NOT NULL auto_increment,
  `kdKatChild` varchar(10) collate latin1_general_ci NOT NULL,
  `namaKatChild` text collate latin1_general_ci NOT NULL,
  `kdKatParent` varchar(10) collate latin1_general_ci NOT NULL,
  `idStatusKat` int(11) NOT NULL,
  `idSatuan` int(11) NOT NULL,
  PRIMARY KEY  (`idKatChild`),
  UNIQUE KEY `kdKatChild` (`kdKatChild`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=148 ;

-- 
-- Dumping data for table `tbl_katchild`
-- 

INSERT INTO `tbl_katchild` VALUES (1, '1.d.1', 'Jumlah RT', '1.d', 1, 4);
INSERT INTO `tbl_katchild` VALUES (2, '1.d.2', 'Jumlah RW', '1.d', 1, 5);
INSERT INTO `tbl_katchild` VALUES (3, '2.a.1', 'Desa/Kelurahan ke Kecamatan', '2.a', 1, 6);
INSERT INTO `tbl_katchild` VALUES (4, '2.a.2', 'Desa/Kelurahan ke Kabupaten', '2.a', 1, 6);
INSERT INTO `tbl_katchild` VALUES (5, '2.a.3', 'Desa/Kelurahan ke Propinsi', '2.a', 1, 6);
INSERT INTO `tbl_katchild` VALUES (6, '3.a.1', 'TK', '3.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (7, '3.a.2', 'SD Negeri', '3.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (8, '3.a.3', 'SMP Negeri', '3.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (9, '3.a.4', 'SMA Negeri', '3.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (10, '3.a.5', 'Universitas Negeri', '3.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (11, '3.a.6', 'SD Swasta', '3.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (12, '3.a.7', 'SMP Swasta', '3.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (13, '3.a.8', 'SMA Swasta', '3.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (14, '3.a.9', 'Universitas Swasta', '3.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (15, '3.a.10', 'Madrasah Ibtidaiyah', '3.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (16, '3.a.11', 'Madrasah Tsanawiyah', '3.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (17, '3.a.12', 'Madrasah Aliyah', '3.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (18, '3.a.13', 'Pondok Pesantren', '3.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (19, '3.b.1', 'TK', '3.b', 1, 1);
INSERT INTO `tbl_katchild` VALUES (20, '3.b.2', 'SD Negeri', '3.b', 1, 1);
INSERT INTO `tbl_katchild` VALUES (21, '3.b.3', 'SMP Negeri', '3.b', 1, 1);
INSERT INTO `tbl_katchild` VALUES (22, '3.b.4', 'SMA Negeri', '3.b', 1, 1);
INSERT INTO `tbl_katchild` VALUES (23, '3.b.5', 'Universitas Negeri', '3.b', 1, 1);
INSERT INTO `tbl_katchild` VALUES (24, '3.b.6', 'SD Swasta', '3.b', 1, 1);
INSERT INTO `tbl_katchild` VALUES (25, '3.b.7', 'SMP Swasta', '3.b', 1, 1);
INSERT INTO `tbl_katchild` VALUES (26, '3.b.8', 'SMA Swasta', '3.b', 1, 1);
INSERT INTO `tbl_katchild` VALUES (27, '3.b.9', 'Universitas Swasta', '3.b', 1, 1);
INSERT INTO `tbl_katchild` VALUES (28, '3.b.10', 'Madrasah Ibtidaiyah', '3.b', 1, 1);
INSERT INTO `tbl_katchild` VALUES (29, '3.b.11', 'Madrasah Tsanawiyah', '3.b', 1, 1);
INSERT INTO `tbl_katchild` VALUES (30, '3.b.12', 'Madrasah Aliyah', '3.b', 1, 1);
INSERT INTO `tbl_katchild` VALUES (31, '3.b.13', 'Pondok Pesantren', '3.b', 1, 1);
INSERT INTO `tbl_katchild` VALUES (32, '3.g.1', 'Kursus Keterampilan', '3.g', 1, 7);
INSERT INTO `tbl_katchild` VALUES (33, '3.g.2', 'Kursus Komputer', '3.g', 1, 7);
INSERT INTO `tbl_katchild` VALUES (34, '3.g.3', 'Kursus Bahasa', '3.g', 1, 7);
INSERT INTO `tbl_katchild` VALUES (35, '3.g.4', 'Kursus Bimbingan Belajar', '3.g', 1, 7);
INSERT INTO `tbl_katchild` VALUES (36, '4.a.1', 'RSU Pemerintah', '4.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (37, '4.a.2', 'RSU Swasta', '4.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (38, '4.a.3', 'Rumah Bersalin', '4.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (39, '4.a.4', 'Poliklinik/Balai Pengobatan', '4.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (40, '4.a.5', 'Puskesmas', '4.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (41, '4.a.6', 'Puskesmas Pembantu', '4.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (42, '4.a.7', 'Praktek Dokter', '4.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (43, '4.a.8', 'Dokter Khitan/Sunat', '4.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (44, '4.a.9', 'Apotek/Depot Obat', '4.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (45, '4.a.10', 'Panti Pijat', '4.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (46, '4.b.1', 'Dokter', '4.b', 1, 1);
INSERT INTO `tbl_katchild` VALUES (47, '4.b.2', 'Perawat', '4.b', 1, 1);
INSERT INTO `tbl_katchild` VALUES (48, '4.b.3', 'Bidan', '4.b', 1, 1);
INSERT INTO `tbl_katchild` VALUES (49, '4.b.4', 'Apoteker', '4.b', 1, 1);
INSERT INTO `tbl_katchild` VALUES (50, '4.f.1', 'Tuna Netra', '4.f', 1, 1);
INSERT INTO `tbl_katchild` VALUES (51, '4.f.2', 'Tuna Wicara', '4.f', 1, 1);
INSERT INTO `tbl_katchild` VALUES (52, '4.f.3', 'Tuna Rungu', '4.f', 1, 1);
INSERT INTO `tbl_katchild` VALUES (53, '4.f.4', 'Cacat Fisik', '4.f', 1, 1);
INSERT INTO `tbl_katchild` VALUES (54, '7.a.1', 'Darat-Angkot', '7.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (55, '7.a.2', 'Darat-Becak', '7.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (56, '7.a.3', 'Darat-Ojek', '7.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (57, '7.a.4', 'Darat-Delman', '7.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (58, '7.a.5', 'Laut-Perahu Motor', '7.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (59, '7.a.6', 'Laut-Perahu Sampan', '7.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (60, '10.a.1', 'Pemula', '10.a', 1, 1);
INSERT INTO `tbl_katchild` VALUES (61, '10.a.2', 'Non Pemula', '10.a', 1, 1);
INSERT INTO `tbl_katchild` VALUES (62, '11.a.1', 'POS Polisi', '11.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (63, '11.a.2', 'POS Hansip', '11.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (64, '11.a.3', 'POS Ronda', '11.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (65, '11.c.1', 'Pencurian', '11.c', 1, 10);
INSERT INTO `tbl_katchild` VALUES (66, '11.c.2', 'Pembunuhan', '11.c', 1, 10);
INSERT INTO `tbl_katchild` VALUES (67, '11.c.3', 'Perampokan', '11.c', 1, 10);
INSERT INTO `tbl_katchild` VALUES (68, '11.c.4', 'Pemerkosaan', '11.c', 1, 10);
INSERT INTO `tbl_katchild` VALUES (69, '11.c.5', 'Pelanggaran Narkoba/Obat Terlarang', '11.c', 1, 10);
INSERT INTO `tbl_katchild` VALUES (70, '12.a.1', 'Padi', '12.a', 1, 3);
INSERT INTO `tbl_katchild` VALUES (71, '12.a.2', 'Kelapa', '12.a', 1, 3);
INSERT INTO `tbl_katchild` VALUES (72, '12.a.3', 'Jagung', '12.a', 1, 3);
INSERT INTO `tbl_katchild` VALUES (73, '12.a.4', 'Kedelai', '12.a', 1, 3);
INSERT INTO `tbl_katchild` VALUES (74, '12.a.5', 'Sayuran', '12.a', 1, 3);
INSERT INTO `tbl_katchild` VALUES (75, '12.a.6', 'Buah-Buahan', '12.a', 1, 3);
INSERT INTO `tbl_katchild` VALUES (76, '12.a.7', 'Umbi-Umbian', '12.a', 1, 3);
INSERT INTO `tbl_katchild` VALUES (77, '13.b.1', 'Perikanan Air Tawar', '13.b', 1, 9);
INSERT INTO `tbl_katchild` VALUES (78, '13.b.2', 'Perikanan Air Laut', '13.b', 1, 9);
INSERT INTO `tbl_katchild` VALUES (79, '14.a.1', 'Sapi', '14.a', 1, 11);
INSERT INTO `tbl_katchild` VALUES (80, '14.a.2', 'Babi', '14.a', 1, 11);
INSERT INTO `tbl_katchild` VALUES (81, '14.a.3', 'Kambing', '14.a', 1, 11);
INSERT INTO `tbl_katchild` VALUES (82, '14.a.4', 'Ayam', '14.a', 1, 11);
INSERT INTO `tbl_katchild` VALUES (83, '14.b.1', 'Kerbau', '14.b', 1, 11);
INSERT INTO `tbl_katchild` VALUES (84, '14.b.2', 'Bebek', '14.b', 1, 11);
INSERT INTO `tbl_katchild` VALUES (85, '14.b.3', 'Burung', '14.b', 1, 11);
INSERT INTO `tbl_katchild` VALUES (86, '16.a.1', 'Galian Golongan A', '16.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (87, '16.a.2', 'Galian Golongan B', '16.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (88, '16.a.3', 'Galian Golongan C', '16.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (89, '17.d.1', 'Perusahaan Besar', '17.d', 1, 7);
INSERT INTO `tbl_katchild` VALUES (90, '17.d.2', 'Perusahaan Sedang', '17.d', 1, 7);
INSERT INTO `tbl_katchild` VALUES (91, '17.d.3', 'Perusahaan Pertanian', '17.d', 1, 7);
INSERT INTO `tbl_katchild` VALUES (92, '19.a.1', 'Jumlah Pasar Tradisional', '19.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (93, '19.a.2', 'Jumlah Pasar Mini Market', '19.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (94, '19.a.3', 'Jumlah Pasar Super Market', '19.a', 1, 7);
INSERT INTO `tbl_katchild` VALUES (95, '21.a.1', 'Perbandingan Indeks PBB', '21.a', 1, 13);
INSERT INTO `tbl_katchild` VALUES (96, '21.a.2', 'Penrbandingan Indeks PADes', '21.a', 1, 13);
INSERT INTO `tbl_katchild` VALUES (97, '21.a.3', 'Perbandingan Indeks Pendapatan Desa Lainnya', '21.a', 1, 13);
INSERT INTO `tbl_katchild` VALUES (98, '21.b.1', 'Luas Tanah', '21.b', 1, 17);
INSERT INTO `tbl_katchild` VALUES (99, '21.b.2', 'Luas Bangunan', '21.b', 1, 17);
INSERT INTO `tbl_katchild` VALUES (100, '21.b.3', 'Kondisi Bangunan', '21.b', 1, 0);
INSERT INTO `tbl_katchild` VALUES (101, '21.b.4', 'Status Kepemilikan', '21.b', 1, 0);
INSERT INTO `tbl_katchild` VALUES (102, '21.c.1', 'Golongan IV', '21.c', 1, 1);
INSERT INTO `tbl_katchild` VALUES (103, '21.c.2', 'Golongan III', '21.c', 1, 1);
INSERT INTO `tbl_katchild` VALUES (104, '21.c.3', 'Golongan II', '21.c', 1, 1);
INSERT INTO `tbl_katchild` VALUES (105, '21.c.4', 'Golongan I', '21.c', 1, 1);
INSERT INTO `tbl_katchild` VALUES (106, '21.c.5', 'TKK/Honor', '21.c', 1, 1);
INSERT INTO `tbl_katchild` VALUES (107, '21.c.6', 'Magang', '21.c', 1, 1);
INSERT INTO `tbl_katchild` VALUES (108, '21.d.1', 'Jumlah Keputusan Desa', '21.d', 1, 7);
INSERT INTO `tbl_katchild` VALUES (109, '21.d.2', 'Jumlah Peraturan Desa', '21.d', 1, 7);
INSERT INTO `tbl_katchild` VALUES (110, '21.f.1', 'Telepon', '21.f', 1, 7);
INSERT INTO `tbl_katchild` VALUES (111, '21.f.2', 'Radio Komunikasi', '21.f', 1, 7);
INSERT INTO `tbl_katchild` VALUES (112, '21.f.3', 'Komputer', '21.f', 1, 7);
INSERT INTO `tbl_katchild` VALUES (113, '21.f.4', 'Mesin Tik', '21.f', 1, 7);
INSERT INTO `tbl_katchild` VALUES (114, '21.f.5', 'Meja', '21.f', 1, 7);
INSERT INTO `tbl_katchild` VALUES (115, '21.f.6', 'Kursi', '21.f', 1, 7);
INSERT INTO `tbl_katchild` VALUES (116, '21.f.7', 'Gedung Pertemuan', '21.f', 1, 7);
INSERT INTO `tbl_katchild` VALUES (117, '22.d.1', 'Islam', '22.d', 1, 1);
INSERT INTO `tbl_katchild` VALUES (118, '22.d.2', 'Kristen Protestan', '22.d', 1, 1);
INSERT INTO `tbl_katchild` VALUES (119, '22.d.3', 'Kristen Katolik', '22.d', 1, 1);
INSERT INTO `tbl_katchild` VALUES (120, '22.d.4', 'Hindhu', '22.d', 1, 1);
INSERT INTO `tbl_katchild` VALUES (121, '22.d.5', 'Budha', '22.d', 1, 1);
INSERT INTO `tbl_katchild` VALUES (122, '22.d.6', 'Kepercayaan', '22.d', 1, 1);
INSERT INTO `tbl_katchild` VALUES (123, '22.e.1', '0-5 Tahun', '22.e', 1, 1);
INSERT INTO `tbl_katchild` VALUES (124, '22.e.2', '6-12 Tahun', '22.e', 1, 1);
INSERT INTO `tbl_katchild` VALUES (125, '22.e.3', '13-19 Tahun', '22.e', 1, 1);
INSERT INTO `tbl_katchild` VALUES (126, '22.e.4', '20-25 Tahun', '22.e', 1, 1);
INSERT INTO `tbl_katchild` VALUES (127, '22.e.5', '26-35 Tahun', '22.e', 1, 1);
INSERT INTO `tbl_katchild` VALUES (128, '22.e.6', '36-55 Tahun', '22.e', 1, 1);
INSERT INTO `tbl_katchild` VALUES (129, '22.e.7', '56-70 Tahun', '22.e', 1, 1);
INSERT INTO `tbl_katchild` VALUES (130, '22.e.8', '>70 Tahun', '22.e', 1, 1);
INSERT INTO `tbl_katchild` VALUES (131, '22.f.1', 'PNS', '22.f', 1, 1);
INSERT INTO `tbl_katchild` VALUES (132, '22.f.2', 'TNI', '22.f', 1, 1);
INSERT INTO `tbl_katchild` VALUES (133, '22.f.3', 'Polisi', '22.f', 1, 1);
INSERT INTO `tbl_katchild` VALUES (134, '22.f.4', 'Pensiunan (PNS, TNI, POLRI)', '22.f', 1, 1);
INSERT INTO `tbl_katchild` VALUES (135, '22.f.5', 'Pegawai Swasta', '22.f', 1, 1);
INSERT INTO `tbl_katchild` VALUES (136, '22.f.6', 'Petani', '22.f', 1, 1);
INSERT INTO `tbl_katchild` VALUES (137, '22.f.7', 'Nelayan', '22.f', 1, 1);
INSERT INTO `tbl_katchild` VALUES (138, '22.f.8', 'Buruh', '22.f', 1, 1);
INSERT INTO `tbl_katchild` VALUES (139, '22.f.9', 'Pengrajin', '22.f', 1, 1);
INSERT INTO `tbl_katchild` VALUES (140, '22.f.10', 'Pedagang Besar', '22.f', 1, 1);
INSERT INTO `tbl_katchild` VALUES (141, '22.f.11', 'Pedagang Kecil', '22.f', 1, 1);
INSERT INTO `tbl_katchild` VALUES (142, '22.f.12', 'Pengangguran', '22.f', 1, 1);
INSERT INTO `tbl_katchild` VALUES (143, '22.g.1', 'Mampu', '22.g', 1, 14);
INSERT INTO `tbl_katchild` VALUES (144, '22.g.2', 'Sederhana', '22.g', 1, 14);
INSERT INTO `tbl_katchild` VALUES (145, '22.g.3', 'Miskin', '22.g', 1, 14);
INSERT INTO `tbl_katchild` VALUES (146, '22.b.1', 'Laki-Laki', '22.b', 1, 1);
INSERT INTO `tbl_katchild` VALUES (147, '22.b.2', 'Perempuan', '22.b', 1, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_katparent`
-- 

CREATE TABLE `tbl_katparent` (
  `kdKatParent` varchar(10) collate latin1_general_ci NOT NULL,
  `namaKatParent` text collate latin1_general_ci NOT NULL,
  `idStatusKat` int(11) NOT NULL,
  `kdKatRoot` int(11) NOT NULL,
  `idSatuan` int(11) NOT NULL default '1',
  PRIMARY KEY  (`kdKatParent`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- 
-- Dumping data for table `tbl_katparent`
-- 

INSERT INTO `tbl_katparent` VALUES ('1.a', 'Jumlah Penduduk', 1, 1, 1);
INSERT INTO `tbl_katparent` VALUES ('1.b', 'Luas Wilayah', 1, 1, 3);
INSERT INTO `tbl_katparent` VALUES ('1.c', 'Kepadatan Penduduk', 1, 1, 2);
INSERT INTO `tbl_katparent` VALUES ('1.d', 'Jumlah RT dan RW', 1, 1, 0);
INSERT INTO `tbl_katparent` VALUES ('2.a', 'Rata-Rata Jarak dan Waktu Tempuh', 1, 2, 0);
INSERT INTO `tbl_katparent` VALUES ('3.a', 'Jumlah Sarana Pendidikan', 1, 3, 0);
INSERT INTO `tbl_katparent` VALUES ('3.b', 'Jumlah Murid', 1, 3, 0);
INSERT INTO `tbl_katparent` VALUES ('3.c', 'Jumlah Guru/Dosen', 1, 3, 1);
INSERT INTO `tbl_katparent` VALUES ('3.d', 'Jumlah Penduduk yang Buta Huruf', 1, 3, 1);
INSERT INTO `tbl_katparent` VALUES ('3.e', 'Jumlah Penduduk yang Tamat Pendidikan Umum', 1, 3, 1);
INSERT INTO `tbl_katparent` VALUES ('3.f', 'Jumlah Penduduk yang Putus Sekolah', 1, 3, 1);
INSERT INTO `tbl_katparent` VALUES ('3.g', 'Jumlah Lembaga Kursus', 1, 3, 0);
INSERT INTO `tbl_katparent` VALUES ('4.a', 'Jumlah Sarana Kesehatan', 1, 4, 0);
INSERT INTO `tbl_katparent` VALUES ('4.b', 'Jumlah Tenaga Medis', 1, 4, 0);
INSERT INTO `tbl_katparent` VALUES ('4.c', 'Jumlah Angka Kematian Bayi dan Balita', 1, 4, 15);
INSERT INTO `tbl_katparent` VALUES ('4.d', 'Jumlah Peserta Immunisasi', 1, 4, 1);
INSERT INTO `tbl_katparent` VALUES ('4.e', 'Jumlah Status Gizi Balita Buruk', 1, 4, 1);
INSERT INTO `tbl_katparent` VALUES ('4.f', 'Penyandang Cacat', 1, 4, 0);
INSERT INTO `tbl_katparent` VALUES ('4.g', 'Jumlah MCK Umum', 1, 4, 7);
INSERT INTO `tbl_katparent` VALUES ('4.h', 'Jumlah Sarana Air Bersih PDAM', 1, 4, 7);
INSERT INTO `tbl_katparent` VALUES ('5.a', 'Masjid', 1, 5, 7);
INSERT INTO `tbl_katparent` VALUES ('5.b', 'Musholla/Surau', 1, 5, 7);
INSERT INTO `tbl_katparent` VALUES ('5.c', 'Gereja Katolik', 1, 5, 7);
INSERT INTO `tbl_katparent` VALUES ('5.d', 'Gereja Protestan', 1, 5, 7);
INSERT INTO `tbl_katparent` VALUES ('5.e', 'Wihara', 1, 5, 7);
INSERT INTO `tbl_katparent` VALUES ('5.f', 'Pura', 1, 5, 7);
INSERT INTO `tbl_katparent` VALUES ('6.a', 'Jumlah Fasilitas Olahraga', 1, 6, 7);
INSERT INTO `tbl_katparent` VALUES ('6.b', 'Jumlah Perkumpulan Olahraga', 1, 6, 7);
INSERT INTO `tbl_katparent` VALUES ('7.a', 'Jumlah Sarana Transportasi', 1, 7, 0);
INSERT INTO `tbl_katparent` VALUES ('7.b', 'Jumlah Paket Travel', 1, 7, 7);
INSERT INTO `tbl_katparent` VALUES ('8.a', 'Jumlah Wartel', 1, 8, 7);
INSERT INTO `tbl_katparent` VALUES ('8.b', 'Jumlah Warnet', 1, 8, 7);
INSERT INTO `tbl_katparent` VALUES ('8.c', 'Jumlah ORARI', 1, 8, 7);
INSERT INTO `tbl_katparent` VALUES ('8.d', 'Jumlah Kantor POS', 1, 8, 7);
INSERT INTO `tbl_katparent` VALUES ('9.a', 'Jumlah Pelanggan Listrik', 1, 9, 1);
INSERT INTO `tbl_katparent` VALUES ('9.b', 'Jumlah Penerangan Umum', 1, 9, 7);
INSERT INTO `tbl_katparent` VALUES ('10.a', 'Jumlah Hak Pilih', 1, 10, 0);
INSERT INTO `tbl_katparent` VALUES ('10.b', 'Jumlah Partai Politik', 1, 10, 16);
INSERT INTO `tbl_katparent` VALUES ('10.c', 'Jumlah Ormas/LSM', 1, 10, 7);
INSERT INTO `tbl_katparent` VALUES ('10.d', 'Jumlah Organisasi Kepemudaan', 1, 10, 7);
INSERT INTO `tbl_katparent` VALUES ('11.a', 'Jumlah Sarana Keamanan', 1, 11, 0);
INSERT INTO `tbl_katparent` VALUES ('11.b', 'Jumlah Personil Keamanan', 1, 11, 1);
INSERT INTO `tbl_katparent` VALUES ('11.c', 'Jumlah Kriminalitas', 1, 11, 0);
INSERT INTO `tbl_katparent` VALUES ('12.a', 'Luas Lahan Pertanian', 1, 12, 0);
INSERT INTO `tbl_katparent` VALUES ('12.b', 'Jumlah Kelompok Tani', 1, 12, 8);
INSERT INTO `tbl_katparent` VALUES ('13.a', 'Luas Areal Budidaya Perikanan', 1, 13, 3);
INSERT INTO `tbl_katparent` VALUES ('13.b', 'Jumlah Hasil Perikanan', 1, 13, 0);
INSERT INTO `tbl_katparent` VALUES ('13.c', 'Jumlah Kepemilikan Usaha Perikanan', 1, 13, 7);
INSERT INTO `tbl_katparent` VALUES ('13.d', 'Jumlah Tempat Pelelangan Ikan (TPI)', 1, 13, 7);
INSERT INTO `tbl_katparent` VALUES ('14.a', 'Jumlah Ternak Besar', 1, 14, 0);
INSERT INTO `tbl_katparent` VALUES ('14.b', 'Jumlah Ternak Sedang', 1, 14, 0);
INSERT INTO `tbl_katparent` VALUES ('15.a', 'Luas Hutan', 1, 15, 3);
INSERT INTO `tbl_katparent` VALUES ('15.b', 'Hasil Hutan yang Dimiliki', 1, 15, 0);
INSERT INTO `tbl_katparent` VALUES ('16.a', 'Jumlah Perusahaan Pertambangan', 1, 16, 0);
INSERT INTO `tbl_katparent` VALUES ('17.a', 'Jumlah Penduduk yang Bekerja', 1, 17, 1);
INSERT INTO `tbl_katparent` VALUES ('17.b', 'Jumlah Pencari Kerja', 1, 17, 1);
INSERT INTO `tbl_katparent` VALUES ('17.c', 'Jumlah Penduduk yang Tidak Bekerja', 1, 17, 1);
INSERT INTO `tbl_katparent` VALUES ('17.d', 'Jumlah Perusahaan', 1, 17, 0);
INSERT INTO `tbl_katparent` VALUES ('18.a', 'Jenis Kesenian Asli', 1, 18, 0);
INSERT INTO `tbl_katparent` VALUES ('18.b', 'Jumlah Sarana Kesenian', 1, 18, 7);
INSERT INTO `tbl_katparent` VALUES ('18.c', 'Jumlah Sarana Pariwisata', 1, 18, 7);
INSERT INTO `tbl_katparent` VALUES ('19.a', 'Jumlah Sarana Perekonomian', 1, 19, 0);
INSERT INTO `tbl_katparent` VALUES ('19.b', 'Jumlah Lembaga Keuangan Perbankan', 1, 19, 7);
INSERT INTO `tbl_katparent` VALUES ('19.c', 'Jumlah Lembaga Keuangan Non Perbankan', 1, 19, 7);
INSERT INTO `tbl_katparent` VALUES ('20.a', 'Jumlah Majelis Ta''lim', 1, 20, 7);
INSERT INTO `tbl_katparent` VALUES ('20.b', 'Jumlah Panti Asuhan', 1, 20, 1);
INSERT INTO `tbl_katparent` VALUES ('21.a', 'Perbandingan Indeks Pendapatan', 1, 21, 0);
INSERT INTO `tbl_katparent` VALUES ('21.b', 'Kantor Desa/Kelurahan', 1, 21, 0);
INSERT INTO `tbl_katparent` VALUES ('21.c', 'Jumlah Pegawai Desa/Kelurahan', 1, 21, 0);
INSERT INTO `tbl_katparent` VALUES ('21.d', 'Peraturan Desa', 1, 21, 0);
INSERT INTO `tbl_katparent` VALUES ('21.e', 'Jumlah BUMDes', 1, 21, 7);
INSERT INTO `tbl_katparent` VALUES ('21.f', 'Sarana Kerja Kantor', 1, 21, 0);
INSERT INTO `tbl_katparent` VALUES ('22.a', 'Jumlah Kepala Keluarga', 1, 22, 14);
INSERT INTO `tbl_katparent` VALUES ('22.b', 'Penduduk Menurut Jenis Kelamin', 1, 22, 0);
INSERT INTO `tbl_katparent` VALUES ('22.c', 'Jumlah Penduduk WNA', 1, 22, 1);
INSERT INTO `tbl_katparent` VALUES ('22.d', 'Jumlah Penduduk Menurut Agama', 1, 22, 0);
INSERT INTO `tbl_katparent` VALUES ('22.e', 'Jumlah Penduduk Menurut Usia', 1, 22, 0);
INSERT INTO `tbl_katparent` VALUES ('22.f', 'Jumlah Penduduk Menurut Mata Pencaharian', 1, 22, 0);
INSERT INTO `tbl_katparent` VALUES ('22.g', 'Jumlah Penduduk Menurut Tingkat Kesejahteraan', 1, 22, 0);
INSERT INTO `tbl_katparent` VALUES ('23.a', 'Industri Berat', 1, 23, 7);
INSERT INTO `tbl_katparent` VALUES ('23.b', 'Industri Ringan', 1, 23, 7);
INSERT INTO `tbl_katparent` VALUES ('23.c', 'Industri Rumah Tangga', 1, 23, 7);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_katroot`
-- 

CREATE TABLE `tbl_katroot` (
  `idKatRoot` int(11) NOT NULL auto_increment,
  `kdKatRoot` varchar(10) collate latin1_general_ci NOT NULL,
  `namaKatRoot` text collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`idKatRoot`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=24 ;

-- 
-- Dumping data for table `tbl_katroot`
-- 

INSERT INTO `tbl_katroot` VALUES (1, '1', 'Demografi');
INSERT INTO `tbl_katroot` VALUES (2, '2', 'Orbitasi');
INSERT INTO `tbl_katroot` VALUES (3, '3', 'Pendidikan');
INSERT INTO `tbl_katroot` VALUES (4, '4', 'Kesehatan');
INSERT INTO `tbl_katroot` VALUES (5, '5', 'Sarana Ibadah');
INSERT INTO `tbl_katroot` VALUES (6, '6', 'Fasilitas Olahraga');
INSERT INTO `tbl_katroot` VALUES (7, '7', 'Transportasi');
INSERT INTO `tbl_katroot` VALUES (8, '8', 'Sarana Komunikasi');
INSERT INTO `tbl_katroot` VALUES (9, '9', 'Penerangan Umum');
INSERT INTO `tbl_katroot` VALUES (10, '10', 'Kesadaran Politik');
INSERT INTO `tbl_katroot` VALUES (11, '11', 'Keamanan dan Ketertiban Masyarakat');
INSERT INTO `tbl_katroot` VALUES (12, '12', 'Pertanian');
INSERT INTO `tbl_katroot` VALUES (13, '13', 'Perikanan');
INSERT INTO `tbl_katroot` VALUES (14, '14', 'Peternakan');
INSERT INTO `tbl_katroot` VALUES (15, '15', 'Kehutanan');
INSERT INTO `tbl_katroot` VALUES (16, '16', 'Pertambangan');
INSERT INTO `tbl_katroot` VALUES (17, '17', 'Ketenagakerjaan');
INSERT INTO `tbl_katroot` VALUES (18, '18', 'Sosial Budaya');
INSERT INTO `tbl_katroot` VALUES (19, '19', 'Sarana Perekonomian');
INSERT INTO `tbl_katroot` VALUES (20, '20', 'Kondisi Sosial Masyarakat');
INSERT INTO `tbl_katroot` VALUES (21, '21', 'Aspek Pemerintahan');
INSERT INTO `tbl_katroot` VALUES (22, '22', 'Kependudukan');
INSERT INTO `tbl_katroot` VALUES (23, '23', 'Industri');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_kecamatan`
-- 

CREATE TABLE `tbl_kecamatan` (
  `idKec` int(11) NOT NULL auto_increment,
  `namaKec` text collate latin1_general_ci NOT NULL,
  `idUser` varchar(6) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`idKec`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `tbl_kecamatan`
-- 

INSERT INTO `tbl_kecamatan` VALUES (1, 'cisauk', 'H3UDAT');
INSERT INTO `tbl_kecamatan` VALUES (2, 'cisoka', 'TK45AJ');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_kelurahan`
-- 

CREATE TABLE `tbl_kelurahan` (
  `idKel` int(11) NOT NULL auto_increment,
  `namaKel` text collate latin1_general_ci NOT NULL,
  `idUser` varchar(6) collate latin1_general_ci NOT NULL,
  `idKec` int(11) NOT NULL,
  `lastUpdate` date NOT NULL,
  PRIMARY KEY  (`idKel`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `tbl_kelurahan`
-- 

INSERT INTO `tbl_kelurahan` VALUES (1, 'cisauk', 'H723B4', 1, '2010-03-21');
INSERT INTO `tbl_kelurahan` VALUES (2, 'karang asem', 'R16W04', 2, '2010-03-21');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_satuan`
-- 

CREATE TABLE `tbl_satuan` (
  `idSatuan` int(11) NOT NULL auto_increment,
  `namaSatuan` text collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`idSatuan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=20 ;

-- 
-- Dumping data for table `tbl_satuan`
-- 

INSERT INTO `tbl_satuan` VALUES (1, 'Orang');
INSERT INTO `tbl_satuan` VALUES (2, 'Orang/KM2');
INSERT INTO `tbl_satuan` VALUES (3, 'Ha');
INSERT INTO `tbl_satuan` VALUES (4, 'RT');
INSERT INTO `tbl_satuan` VALUES (5, 'RW');
INSERT INTO `tbl_satuan` VALUES (6, 'KM/Menit');
INSERT INTO `tbl_satuan` VALUES (7, 'Buah');
INSERT INTO `tbl_satuan` VALUES (8, 'Kelompok');
INSERT INTO `tbl_satuan` VALUES (9, 'Ton/Tahun');
INSERT INTO `tbl_satuan` VALUES (10, 'Kasus');
INSERT INTO `tbl_satuan` VALUES (11, 'Ekor/Tahun');
INSERT INTO `tbl_satuan` VALUES (12, 'M3');
INSERT INTO `tbl_satuan` VALUES (13, '/Tahun');
INSERT INTO `tbl_satuan` VALUES (14, 'KK');
INSERT INTO `tbl_satuan` VALUES (15, 'Jiwa/Tahun');
INSERT INTO `tbl_satuan` VALUES (16, 'Partai');
INSERT INTO `tbl_satuan` VALUES (17, 'M2');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_statuskategori`
-- 

CREATE TABLE `tbl_statuskategori` (
  `idStatusKat` int(11) NOT NULL auto_increment,
  `namaStatusKat` text collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`idStatusKat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `tbl_statuskategori`
-- 

INSERT INTO `tbl_statuskategori` VALUES (1, 'standard');
INSERT INTO `tbl_statuskategori` VALUES (2, 'additional');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_user`
-- 

CREATE TABLE `tbl_user` (
  `kdUser` int(11) NOT NULL auto_increment,
  `idUser` varchar(6) collate latin1_general_ci NOT NULL,
  `userName` varchar(25) collate latin1_general_ci NOT NULL,
  `password` varchar(255) collate latin1_general_ci NOT NULL,
  `pwd` varchar(255) collate latin1_general_ci NOT NULL default '',
  `userToken` varchar(255) collate latin1_general_ci NOT NULL,
  `idHak` int(11) NOT NULL,
  PRIMARY KEY  (`kdUser`),
  UNIQUE KEY `idUser` (`idUser`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=156 ;

-- 
-- Dumping data for table `tbl_user`
-- 

INSERT INTO `tbl_user` VALUES (1, 'xx', 'admin', 'f109reJiTOhak', 'fahmi', 'xDgFtc', 1);
INSERT INTO `tbl_user` VALUES (153, 'H723B4', 'c1dsbx', '7a8OWM3HvR55Y', 'axd32r', '', 3);
INSERT INTO `tbl_user` VALUES (152, 'H3UDAT', 'sz2bq3', '20MFRlVl8geX.', 'qkv8hf', '', 2);
INSERT INTO `tbl_user` VALUES (60, 'L23O1T', 'hocdv7', '381wOM/nBDOqM', '4avqfm', '', 2);
INSERT INTO `tbl_user` VALUES (59, 'FR7SAM', 'odufyt', '0995b9Tx9OYfk', '7wc5qa', '', 2);
INSERT INTO `tbl_user` VALUES (58, '73OPKJ', 'hpgz6o', '8ftoCpL/EqUrs', 'jag1ek', '', 2);
INSERT INTO `tbl_user` VALUES (57, '31TBLE', 'xn3yr4', 'd3FO802yTWvD6', '085w2v', '', 2);
INSERT INTO `tbl_user` VALUES (56, '7SK1AR', 'mu7ryv', '13ECEa5D30cHw', 'of9s5w', '', 2);
INSERT INTO `tbl_user` VALUES (55, '0R4DBO', 'g46xkh', 'a2dgEWMKEF..Y', 's9ork3', '', 2);
INSERT INTO `tbl_user` VALUES (54, 'VSD4N0', 'mdicyp', '03xDIm8FpI4.Y', '59t7eu', '', 2);
INSERT INTO `tbl_user` VALUES (53, 'LQP2E6', 'r7cxaf', 'a8vwRp9cHtCHc', 'duvbsh', '', 2);
INSERT INTO `tbl_user` VALUES (52, '2UV8QI', 'sh35u4', 'caUueN4GDQ2jU', 'u35812', '', 2);
INSERT INTO `tbl_user` VALUES (90, 'ASVUNI', '7nbg43', '00J90wLuw37UE', 'g1k3is', '', 3);
INSERT INTO `tbl_user` VALUES (91, 'MRCL6P', 'h2rgn7', '47ZQzbD7OzyV.', 'fj6vt7', '', 3);
INSERT INTO `tbl_user` VALUES (92, 'V83GH6', 'ahr5ex', '95FF52LUSMDXU', '3wv4on', '', 3);
INSERT INTO `tbl_user` VALUES (93, '51L0GI', '2eirym', 'f3O/jU2Ggseo6', '8269pr', '', 3);
INSERT INTO `tbl_user` VALUES (94, 'VRJIQL', 'u4016c', '90H9OqqYduc9M', 'nvpt8u', '', 3);
INSERT INTO `tbl_user` VALUES (95, '7W5H48', 'uqmczs', '657uJKo7TopDM', 't9jpcs', '', 3);
INSERT INTO `tbl_user` VALUES (96, 'VQ8NWH', 'x5swrb', '71S/tw0y9pBp2', '1rxw76', '', 3);
INSERT INTO `tbl_user` VALUES (97, 'VUI8M3', 'hag5ie', '4fCvRymkvWsJ2', '7nstoq', '', 3);
INSERT INTO `tbl_user` VALUES (98, '7CI8HT', 'wu6a71', '3cBehPDOtMkHk', 'vd6mk3', '', 3);
INSERT INTO `tbl_user` VALUES (99, 'VB830C', '1tzy75', '3czS.zMSk40UE', 'mcugi8', '', 3);
INSERT INTO `tbl_user` VALUES (100, '5HCP8U', 'itbx2u', '47nD4dS7g2ZB6', '2drmub', '', 3);
INSERT INTO `tbl_user` VALUES (101, '0UT42P', '2eh0xz', '163E6/ydv3llw', 'e368ak', '', 3);
INSERT INTO `tbl_user` VALUES (102, 'ACJ6KU', '4yu51h', 'c7e/tQJODOTLQ', 'skwc8d', '', 3);
INSERT INTO `tbl_user` VALUES (103, 'EO32JT', 'ryhbag', '27SAiAH12PkhQ', '12hiek', '', 3);
INSERT INTO `tbl_user` VALUES (104, 'HM7ISW', 'og60q2', '46effHdQhxEr2', 'kvmg1o', '', 3);
INSERT INTO `tbl_user` VALUES (105, 'P7N1OM', 'jfkxz2', '967XFE608X5Ms', 'hxiad3', '', 3);
INSERT INTO `tbl_user` VALUES (106, '4T2LU5', 'b6cdzp', '9cNgpq4d3leuE', 'u8tqbn', '', 3);
INSERT INTO `tbl_user` VALUES (107, 'MEF98T', 'nqgk3p', 'c9gw2JY.7Q/TE', '6aw9uj', '', 3);
INSERT INTO `tbl_user` VALUES (108, 'TBW6PQ', 'cnf3tk', 'a9TTUkugJeJ3Y', '93uk0h', '', 3);
INSERT INTO `tbl_user` VALUES (109, '5MBET9', 'd6zjfk', 'b1k3QPU8tXEvY', 'wq1hpm', '', 3);
INSERT INTO `tbl_user` VALUES (110, 'CLQMU7', 'w1u6dy', '50ZCq/DoR4E.o', 'ti9ojv', '', 3);
INSERT INTO `tbl_user` VALUES (111, 'CUEAJG', 'tja54e', '9emv.thcGtlN6', 'u698bp', '', 3);
INSERT INTO `tbl_user` VALUES (112, 'H836PS', '1o4q6n', 'e7FHQnd3QfieI', 'weda0o', '', 3);
INSERT INTO `tbl_user` VALUES (113, 'BD0V7W', 'uqimho', '759OAXpnfsCm2', 's9gxun', '', 3);
INSERT INTO `tbl_user` VALUES (114, '23EFGS', 'xdpju2', '515/yQkXtz5w2', 'xuthok', '', 3);
INSERT INTO `tbl_user` VALUES (115, 'GUL0WK', '1dpjfe', '1f92xGU7483uI', 'vq2bte', '', 3);
INSERT INTO `tbl_user` VALUES (116, 'WR5E89', 'h5p12x', 'afbqJ5pc8ju0E', 'jrp49u', '', 3);
INSERT INTO `tbl_user` VALUES (117, 'B69I30', 'ofptrv', '86Bitpa1zz766', 'h5wci7', '', 3);
INSERT INTO `tbl_user` VALUES (118, 'NWAK45', 'scdmye', 'c1eMrTO6UokCA', '13ij2o', '', 3);
INSERT INTO `tbl_user` VALUES (119, 'ML94JI', 'jv6qot', 'cbhO1W79MDJqA', '3sj8tc', '', 3);
INSERT INTO `tbl_user` VALUES (120, 'OJU9PH', 'e1ztjg', 'f1CguISLmLFBo', 'bif9pd', '', 3);
INSERT INTO `tbl_user` VALUES (121, 'KIJSUQ', 'sqdnt0', '7b3AqZ0358JBU', '659qkh', '', 3);
INSERT INTO `tbl_user` VALUES (122, 'RP8KFB', 'c3r7q0', '77JMZGAxo/XQc', 'piochk', '', 3);
INSERT INTO `tbl_user` VALUES (123, '0SIHGK', '04enzm', '74dF4q17UNHPs', 'xkt46i', '', 3);
INSERT INTO `tbl_user` VALUES (124, 'T2HSDR', 'taz71w', 'c9Sbwk30vdSF2', 'ushe2t', '', 3);
INSERT INTO `tbl_user` VALUES (125, '8POBGL', 'x5vh42', '57bdlNar6CFac', 'bkrxjt', '', 3);
INSERT INTO `tbl_user` VALUES (126, '8TNF2S', 'gyi3rq', '69QwaVBOsJgTA', 'dexkwn', '', 3);
INSERT INTO `tbl_user` VALUES (127, '0CDFGE', 'biuy7h', 'ddGKd/WPV9p/.', 'fcj98h', '', 3);
INSERT INTO `tbl_user` VALUES (128, 'E1V2AB', 'bavpeo', '32c2bAiA0reZg', '4kpj1d', '', 3);
INSERT INTO `tbl_user` VALUES (129, '1SK5QN', 'i3nv7g', '0dVqe0a9of9ts', 'vi1w23', '', 3);
INSERT INTO `tbl_user` VALUES (130, 'B5C6DW', 'tfdx7z', '634wcPloH86vU', 'qusefx', '', 3);
INSERT INTO `tbl_user` VALUES (131, 'HMT0AC', 'xyds4v', '63V/IeFdn/t.U', 'hrqcfj', '', 3);
INSERT INTO `tbl_user` VALUES (132, 'I9QUOB', 'xtmre3', 'bebYz/jILjCv2', 'p5gnk2', '', 3);
INSERT INTO `tbl_user` VALUES (133, '50UGKD', 'zrc56w', 'e1vrA8UB14NtE', 'g8a0rb', '', 3);
INSERT INTO `tbl_user` VALUES (134, 'UQJTIL', '7zy3oc', 'cdvSBjUBkFtuc', 'oef2m0', '', 3);
INSERT INTO `tbl_user` VALUES (135, 'DBUPSN', 'vmxhy5', 'acGpQ.Mvf6Sbk', 'f5x0ba', '', 3);
INSERT INTO `tbl_user` VALUES (136, 'SN6EKR', 'i3cjab', '19USoxjpCqH4A', '6djw3h', '', 3);
INSERT INTO `tbl_user` VALUES (137, 'FAV6T2', 'uifzgo', '7eovFxP4NFrdg', 'wnk5be', '', 3);
INSERT INTO `tbl_user` VALUES (138, 'FTI6EO', 'h5znoj', 'f0GF3XILBb7oM', 'emf3tg', '', 3);
INSERT INTO `tbl_user` VALUES (139, 'KCGDT9', 'gjw3sa', '50tUmyQwzXI6c', 's854q1', '', 3);
INSERT INTO `tbl_user` VALUES (140, 'PV2KF8', '57jx0w', '31u8KVq6Rarjo', '6oisq0', '', 3);
INSERT INTO `tbl_user` VALUES (141, 'SANW1F', 'fnsew0', '64Smjeovdb8zc', 'c37uxp', '', 3);
INSERT INTO `tbl_user` VALUES (142, 'S4G9O6', 'sdypfn', '3f6n5HWT7tRe6', 'cv06so', '', 3);
INSERT INTO `tbl_user` VALUES (143, 'BMO0R2', 'ntmebd', 'c64E0Pd7P8RaI', 'w6fsa7', '', 3);
INSERT INTO `tbl_user` VALUES (144, 'LFQH1W', 'hm6ebt', 'e1ZIk.9KmW3gk', 'ud05ks', '', 3);
INSERT INTO `tbl_user` VALUES (145, 'VB4SFC', 'c4a5qk', 'a2qOYJa2xZx7I', 'tx4rmq', '', 3);
INSERT INTO `tbl_user` VALUES (146, '1RUKAL', 'pu5xk2', '75qtlsEYULH4Y', '3a2djt', '', 3);
INSERT INTO `tbl_user` VALUES (147, 'KHPBJ5', 'tmk071', '93i/nGlgIPIMk', 'q21gf0', '', 3);
INSERT INTO `tbl_user` VALUES (148, '1AOD37', 'cgnrkz', '59CRcUSYr6Cqk', '9v37rw', '', 3);
INSERT INTO `tbl_user` VALUES (149, 'Q62EGW', 'ag25km', 'd1GH3a9p6cr1s', '3rx2jk', '', 3);
INSERT INTO `tbl_user` VALUES (150, 'SFMLRC', 'mkznr5', '79UxgBtJ58uQg', 'e8qbc6', '', 3);
INSERT INTO `tbl_user` VALUES (151, 'V41PJT', 'z57xur', '1cCcUIP9z.Mn2', '0k87ns', '', 3);
INSERT INTO `tbl_user` VALUES (154, 'TK45AJ', 'mz6rde', '02MlDjtSby9Pw', '8fxd1e', '', 2);
INSERT INTO `tbl_user` VALUES (155, 'R16W04', 'hx5rem', 'bfN3pM96J5arE', 'b8v2sj', 'nFefju', 3);
