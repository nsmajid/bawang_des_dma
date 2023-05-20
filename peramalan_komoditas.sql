/*
 Navicat Premium Data Transfer

 Source Server         : MAMP
 Source Server Type    : MySQL
 Source Server Version : 50734
 Source Host           : localhost:3306
 Source Schema         : peramalan_komoditas

 Target Server Type    : MySQL
 Target Server Version : 50734
 File Encoding         : 65001

 Date: 11/05/2023 19:37:15
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for agama
-- ----------------------------
DROP TABLE IF EXISTS `agama`;
CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL AUTO_INCREMENT,
  `nama_agama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_agama`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of agama
-- ----------------------------
BEGIN;
INSERT INTO `agama` (`id_agama`, `nama_agama`) VALUES (2, 'Islam');
INSERT INTO `agama` (`id_agama`, `nama_agama`) VALUES (3, 'Kristen (Protestan)');
INSERT INTO `agama` (`id_agama`, `nama_agama`) VALUES (4, 'Katolik');
INSERT INTO `agama` (`id_agama`, `nama_agama`) VALUES (5, 'Hindu');
INSERT INTO `agama` (`id_agama`, `nama_agama`) VALUES (6, 'Budha');
COMMIT;

-- ----------------------------
-- Table structure for harga_komoditas
-- ----------------------------
DROP TABLE IF EXISTS `harga_komoditas`;
CREATE TABLE `harga_komoditas` (
  `id_harga_komoditas` int(11) NOT NULL AUTO_INCREMENT,
  `id_provinsi` int(11) DEFAULT NULL,
  `id_komoditas` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `harga` double DEFAULT NULL,
  PRIMARY KEY (`id_harga_komoditas`),
  KEY `id_komoditas` (`id_komoditas`),
  KEY `id_provinsi` (`id_provinsi`),
  CONSTRAINT `harga_komoditas_ibfk_1` FOREIGN KEY (`id_komoditas`) REFERENCES `komoditas` (`id_komoditas`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `harga_komoditas_ibfk_2` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id_provinsi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=282 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of harga_komoditas
-- ----------------------------
BEGIN;
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (25, 33, 1, '2022-05-04', 0);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (26, 33, 1, '2022-05-05', 0);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (27, 33, 1, '2022-05-06', 0);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (28, 33, 1, '2022-05-09', 36750);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (29, 33, 1, '2022-05-10', 37150);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (30, 33, 1, '2022-05-11', 37450);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (31, 33, 1, '2022-05-12', 37500);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (32, 33, 1, '2022-05-13', 37650);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (33, 33, 1, '2022-05-16', 0);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (34, 33, 1, '2022-05-17', 39250);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (35, 33, 1, '2022-05-18', 39900);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (36, 33, 1, '2022-05-19', 39750);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (37, 33, 1, '2022-05-20', 40100);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (38, 33, 1, '2022-05-23', 40850);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (39, 33, 1, '2022-05-24', 41300);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (40, 33, 1, '2022-05-25', 40900);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (41, 33, 1, '2022-05-27', 41300);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (42, 33, 1, '2022-05-30', 41750);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (43, 33, 1, '2022-05-31', 41950);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (44, 33, 1, '2022-06-02', 42250);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (45, 33, 1, '2022-06-03', 42200);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (46, 33, 1, '2022-06-06', 42300);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (47, 33, 1, '2022-06-07', 44400);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (48, 33, 1, '2022-06-08', 46400);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (49, 33, 1, '2022-06-09', 46200);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (50, 33, 1, '2022-06-10', 48400);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (51, 33, 1, '2022-06-13', 51100);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (52, 33, 1, '2022-06-14', 51700);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (53, 33, 1, '2022-06-15', 51700);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (54, 33, 1, '2022-06-16', 51500);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (55, 33, 1, '2022-06-17', 52150);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (56, 33, 1, '2022-06-20', 52250);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (57, 33, 1, '2022-06-21', 52550);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (58, 33, 1, '2022-06-22', 52650);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (59, 33, 1, '2022-06-23', 52400);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (60, 33, 1, '2022-06-24', 52600);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (61, 33, 1, '2022-06-27', 52800);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (62, 33, 1, '2022-06-28', 52650);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (63, 33, 1, '2022-06-29', 53850);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (64, 33, 1, '2022-06-30', 54300);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (65, 33, 1, '2022-07-01', 55950);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (66, 33, 1, '2022-07-04', 61400);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (67, 33, 1, '2022-07-05', 61800);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (68, 33, 1, '2022-07-06', 66050);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (69, 33, 1, '2022-07-07', 67700);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (70, 33, 1, '2022-07-08', 68400);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (71, 33, 1, '2022-07-11', 69000);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (72, 33, 1, '2022-07-12', 68300);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (73, 33, 1, '2022-07-13', 67200);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (74, 33, 1, '2022-07-14', 65300);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (75, 33, 1, '2022-07-15', 64100);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (76, 33, 1, '2022-07-18', 62100);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (77, 33, 1, '2022-07-19', 61450);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (78, 33, 1, '2022-07-20', 58400);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (79, 33, 1, '2022-07-21', 55450);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (80, 33, 1, '2022-07-22', 52600);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (81, 33, 1, '2022-07-25', 45250);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (82, 33, 1, '2022-07-26', 44800);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (83, 33, 1, '2022-07-27', 43400);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (84, 33, 1, '2022-07-28', 43000);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (85, 33, 1, '2022-07-29', 42850);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (86, 33, 1, '2022-08-01', 39450);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (87, 33, 1, '2022-08-02', 38400);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (88, 33, 1, '2022-08-03', 37750);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (89, 33, 1, '2022-08-04', 37050);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (90, 33, 1, '2022-08-05', 36750);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (91, 33, 1, '2022-08-08', 36450);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (92, 33, 1, '2022-08-09', 36350);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (93, 33, 1, '2022-08-10', 36000);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (94, 33, 1, '2022-08-11', 35600);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (95, 33, 1, '2022-08-12', 35350);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (96, 33, 1, '2022-08-15', 34050);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (97, 33, 1, '2022-08-16', 32900);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (98, 33, 1, '2022-08-17', 0);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (99, 33, 1, '2022-08-18', 32600);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (100, 33, 1, '2022-08-19', 32250);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (101, 33, 1, '2022-08-22', 31800);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (102, 33, 1, '2022-08-23', 31450);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (103, 33, 1, '2022-08-24', 31300);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (104, 33, 1, '2022-08-25', 31150);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (105, 33, 1, '2022-08-26', 30550);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (106, 33, 1, '2022-08-29', 29600);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (107, 33, 1, '2022-08-30', 29600);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (108, 33, 1, '2022-08-31', 29550);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (109, 33, 1, '2022-09-01', 29600);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (110, 33, 1, '2022-09-02', 29650);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (111, 33, 1, '2022-09-05', 30000);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (112, 33, 1, '2022-09-06', 30650);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (113, 33, 1, '2022-09-07', 31100);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (114, 33, 1, '2022-09-08', 31150);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (115, 33, 1, '2022-09-09', 31400);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (116, 33, 1, '2022-09-12', 31600);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (117, 33, 1, '2022-09-13', 31550);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (118, 33, 1, '2022-09-14', 31250);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (119, 33, 1, '2022-09-15', 31550);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (120, 33, 1, '2022-09-16', 31500);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (121, 33, 1, '2022-09-19', 31050);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (122, 33, 1, '2022-09-20', 30150);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (123, 33, 1, '2022-09-21', 29800);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (124, 33, 1, '2022-09-22', 29700);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (125, 33, 1, '2022-09-23', 29600);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (126, 33, 1, '2022-09-26', 29250);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (127, 33, 1, '2022-09-27', 29200);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (128, 33, 1, '2022-09-28', 29350);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (129, 33, 1, '2022-09-29', 29250);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (130, 33, 1, '2022-09-30', 29250);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (131, 33, 1, '2022-10-03', 29400);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (132, 33, 1, '2022-10-04', 29500);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (133, 33, 1, '2022-10-05', 29650);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (134, 33, 1, '2022-10-06', 29950);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (135, 33, 1, '2022-10-07', 30150);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (136, 33, 1, '2022-10-10', 29950);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (137, 33, 1, '2022-10-11', 30300);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (138, 33, 1, '2022-10-12', 30650);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (139, 33, 1, '2022-10-13', 30650);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (140, 33, 1, '2022-10-14', 30650);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (141, 33, 1, '2022-10-17', 30700);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (142, 33, 1, '2022-10-18', 30750);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (143, 33, 1, '2022-10-19', 30750);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (144, 33, 1, '2022-10-20', 30800);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (145, 33, 1, '2022-10-21', 30750);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (146, 33, 1, '2022-10-24', 30600);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (147, 33, 1, '2022-10-25', 30700);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (148, 33, 1, '2022-10-26', 30850);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (149, 33, 1, '2022-10-27', 30900);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (150, 33, 1, '2022-10-28', 32150);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (151, 33, 1, '2022-10-31', 33450);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (152, 33, 1, '2022-11-01', 33750);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (153, 33, 1, '2022-11-02', 33750);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (154, 33, 1, '2022-11-03', 33900);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (155, 33, 1, '2022-11-04', 33900);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (156, 33, 1, '2022-11-07', 33000);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (157, 33, 1, '2022-11-08', 33450);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (158, 33, 1, '2022-11-09', 33500);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (159, 33, 1, '2022-11-10', 32800);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (160, 33, 1, '2022-11-11', 32750);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (161, 33, 1, '2022-11-14', 32350);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (162, 33, 1, '2022-11-15', 32100);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (163, 33, 1, '2022-11-16', 32000);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (164, 33, 1, '2022-11-17', 31900);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (165, 33, 1, '2022-11-18', 31700);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (166, 33, 1, '2022-11-21', 31350);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (167, 33, 1, '2022-11-22', 31250);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (168, 33, 1, '2022-11-23', 31050);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (169, 33, 1, '2022-11-24', 30850);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (170, 33, 1, '2022-11-25', 30600);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (171, 33, 1, '2022-11-28', 30150);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (172, 33, 1, '2022-11-29', 30250);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (173, 33, 1, '2022-11-30', 30650);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (174, 33, 1, '2022-12-01', 31650);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (175, 33, 1, '2022-12-02', 32050);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (176, 33, 1, '2022-12-05', 32550);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (177, 33, 1, '2022-12-06', 32650);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (178, 33, 1, '2022-12-07', 32750);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (179, 33, 1, '2022-12-08', 32800);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (180, 33, 1, '2022-12-09', 32850);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (181, 33, 1, '2022-12-12', 32700);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (182, 33, 1, '2022-12-13', 32600);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (183, 33, 1, '2022-12-14', 33050);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (184, 33, 1, '2022-12-15', 33050);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (185, 33, 1, '2022-12-16', 33150);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (186, 33, 1, '2022-12-19', 33250);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (187, 33, 1, '2022-12-20', 33200);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (188, 33, 1, '2022-12-21', 33450);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (189, 33, 1, '2022-12-22', 33500);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (190, 33, 1, '2022-12-23', 33550);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (191, 33, 1, '2022-12-26', 33550);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (192, 33, 1, '2022-12-27', 33600);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (193, 33, 1, '2022-12-28', 33600);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (194, 33, 1, '2022-12-29', 33950);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (195, 33, 1, '2022-12-30', 33900);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (196, 33, 1, '2023-01-02', 34000);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (197, 33, 1, '2023-01-03', 34050);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (198, 33, 1, '2023-01-04', 34150);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (199, 33, 1, '2023-01-05', 34350);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (200, 33, 1, '2023-01-06', 34500);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (201, 33, 1, '2023-01-09', 34800);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (202, 33, 1, '2023-01-10', 34900);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (203, 33, 1, '2023-01-11', 35050);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (204, 33, 1, '2023-01-12', 35150);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (205, 33, 1, '2023-01-13', 35300);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (206, 33, 1, '2023-01-16', 36400);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (207, 33, 1, '2023-01-17', 36600);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (208, 33, 1, '2023-01-18', 37250);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (209, 33, 1, '2023-01-19', 37600);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (210, 33, 1, '2023-01-20', 38300);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (211, 33, 1, '2023-01-23', 37450);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (212, 33, 1, '2023-01-24', 40550);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (213, 33, 1, '2023-01-25', 40900);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (214, 33, 1, '2023-01-26', 40900);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (215, 33, 1, '2023-01-27', 41600);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (216, 33, 1, '2023-01-30', 42800);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (217, 33, 1, '2023-01-31', 43750);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (218, 33, 1, '2023-02-01', 44000);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (219, 33, 1, '2023-02-02', 44150);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (220, 33, 1, '2023-02-03', 44750);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (221, 33, 1, '2023-02-06', 45050);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (222, 33, 1, '2023-02-07', 45150);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (223, 33, 1, '2023-02-08', 45000);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (224, 33, 1, '2023-02-09', 45300);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (225, 33, 1, '2023-02-10', 44750);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (226, 33, 1, '2023-02-13', 42650);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (227, 33, 1, '2023-02-14', 41400);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (228, 33, 1, '2023-02-15', 40250);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (229, 33, 1, '2023-02-16', 39350);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (230, 33, 1, '2023-02-17', 38750);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (231, 33, 1, '2023-02-20', 36900);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (232, 33, 1, '2023-02-21', 35750);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (233, 33, 1, '2023-02-22', 35050);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (234, 33, 1, '2023-02-23', 34400);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (235, 33, 1, '2023-02-24', 34200);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (236, 33, 1, '2023-02-27', 33350);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (237, 33, 1, '2023-02-28', 32900);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (238, 33, 1, '2023-03-01', 32750);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (239, 33, 1, '2023-03-02', 32600);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (240, 33, 1, '2023-03-03', 32950);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (241, 33, 1, '2023-03-06', 34050);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (242, 33, 1, '2023-03-07', 34400);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (243, 33, 1, '2023-03-08', 34400);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (244, 33, 1, '2023-03-09', 34700);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (245, 33, 1, '2023-03-10', 34550);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (246, 33, 1, '2023-03-13', 34350);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (247, 33, 1, '2023-03-14', 34200);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (248, 33, 1, '2023-03-15', 34400);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (249, 33, 1, '2023-03-16', 34450);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (250, 33, 1, '2023-03-17', 33850);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (251, 33, 1, '2023-03-20', 33600);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (252, 33, 1, '2023-03-21', 33700);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (253, 33, 1, '2023-03-22', 33200);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (254, 33, 1, '2023-03-23', 33200);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (255, 33, 1, '2023-03-24', 33900);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (256, 33, 1, '2023-03-27', 33800);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (257, 33, 1, '2023-03-28', 33450);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (258, 33, 1, '2023-03-29', 33350);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (259, 33, 1, '2023-03-30', 33200);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (260, 33, 1, '2023-03-31', 33100);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (261, 33, 1, '2023-04-03', 32800);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (262, 33, 1, '2023-04-04', 32800);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (263, 33, 1, '2023-04-05', 32550);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (264, 33, 1, '2023-04-06', 32400);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (265, 33, 1, '2023-04-07', 31050);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (266, 33, 1, '2023-04-10', 32650);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (267, 33, 1, '2023-04-11', 32600);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (268, 33, 1, '2023-04-12', 32450);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (269, 33, 1, '2023-04-13', 32500);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (270, 33, 1, '2023-04-14', 32550);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (271, 33, 1, '2023-04-17', 34450);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (272, 33, 1, '2023-04-18', 36100);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (273, 33, 1, '2023-04-19', 35200);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (274, 33, 1, '2023-04-20', 35700);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (275, 33, 1, '2023-04-21', 33650);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (276, 33, 1, '2023-04-24', 33650);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (277, 33, 1, '2023-04-25', 33650);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (278, 33, 1, '2023-04-26', 41250);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (279, 33, 1, '2023-04-27', 42100);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (280, 33, 1, '2023-04-28', 42100);
INSERT INTO `harga_komoditas` (`id_harga_komoditas`, `id_provinsi`, `id_komoditas`, `tanggal`, `harga`) VALUES (281, 33, 1, '2023-05-01', 40200);
COMMIT;

-- ----------------------------
-- Table structure for komoditas
-- ----------------------------
DROP TABLE IF EXISTS `komoditas`;
CREATE TABLE `komoditas` (
  `id_komoditas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_komoditas` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_komoditas`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of komoditas
-- ----------------------------
BEGIN;
INSERT INTO `komoditas` (`id_komoditas`, `nama_komoditas`) VALUES (1, 'Bawang Merah');
INSERT INTO `komoditas` (`id_komoditas`, `nama_komoditas`) VALUES (2, 'Bawang Putih');
COMMIT;

-- ----------------------------
-- Table structure for provinsi
-- ----------------------------
DROP TABLE IF EXISTS `provinsi`;
CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(100) NOT NULL,
  KEY `id_provinsi` (`id_provinsi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of provinsi
-- ----------------------------
BEGIN;
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (11, 'ACEH');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (12, 'SUMATERA UTARA');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (13, 'SUMATERA BARAT');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (14, 'RIAU');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (15, 'JAMBI');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (16, 'SUMATERA SELATAN');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (17, 'BENGKULU');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (18, 'LAMPUNG');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (19, 'KEPULAUAN BANGKA BELITUNG');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (21, 'KEPULAUAN RIAU');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (31, 'DKI JAKARTA');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (32, 'JAWA BARAT');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (33, 'JAWA TENGAH');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (34, 'DI YOGYAKARTA');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (35, 'JAWA TIMUR');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (36, 'BANTEN');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (51, 'BALI');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (52, 'NUSA TENGGARA BARAT');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (53, 'NUSA TENGGARA TIMUR');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (61, 'KALIMANTAN BARAT');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (62, 'KALIMANTAN TENGAH');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (63, 'KALIMANTAN SELATAN');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (64, 'KALIMANTAN TIMUR');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (65, 'KALIMANTAN UTARA');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (71, 'SULAWESI UTARA');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (72, 'SULAWESI TENGAH');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (73, 'SULAWESI SELATAN');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (74, 'SULAWESI TENGGARA');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (75, 'GORONTALO');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (76, 'SULAWESI BARAT');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (81, 'MALUKU');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (82, 'MALUKU UTARA');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (91, 'PAPUA BARAT');
INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES (94, 'PAPUA');
COMMIT;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(200) NOT NULL COMMENT '123123=>$2y$10$ZSLyim9T40ziPli4RwE1heq4sINM28yHMwsOxdVKmr75tAN6bOfde',
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE,
  UNIQUE KEY `username` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
INSERT INTO `user` (`id_user`, `username`, `password`, `name`) VALUES (1, 'admin', '$2y$10$ZSLyim9T40ziPli4RwE1heq4sINM28yHMwsOxdVKmr75tAN6bOfde', NULL);
INSERT INTO `user` (`id_user`, `username`, `password`, `name`) VALUES (2, 'dosen', '$2y$10$ZSLyim9T40ziPli4RwE1heq4sINM28yHMwsOxdVKmr75tAN6bOfde', NULL);
INSERT INTO `user` (`id_user`, `username`, `password`, `name`) VALUES (3, 'tendik', '$2y$10$ZSLyim9T40ziPli4RwE1heq4sINM28yHMwsOxdVKmr75tAN6bOfde', NULL);
INSERT INTO `user` (`id_user`, `username`, `password`, `name`) VALUES (4, 'mahasiswa', '$2y$10$ZSLyim9T40ziPli4RwE1heq4sINM28yHMwsOxdVKmr75tAN6bOfde', NULL);
INSERT INTO `user` (`id_user`, `username`, `password`, `name`) VALUES (5, 'mahasiswa1', '$2y$10$ZSLyim9T40ziPli4RwE1heq4sINM28yHMwsOxdVKmr75tAN6bOfde', NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
