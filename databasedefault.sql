/*
 Navicat MySQL Data Transfer

 Source Server         : docker-test
 Source Server Type    : MySQL
 Source Server Version : 50741 (5.7.41)
 Source Host           : localhost:3306
 Source Schema         : databasedefault

 Target Server Type    : MySQL
 Target Server Version : 50741 (5.7.41)
 File Encoding         : 65001

 Date: 20/02/2023 15:49:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for branches
-- ----------------------------
DROP TABLE IF EXISTS `branches`;
CREATE TABLE `branches`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `branch` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `host` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of branches
-- ----------------------------
INSERT INTO `branches` VALUES (1, '7000', '7000', '181.219.125.7', 'occupied', '2023-02-17 19:58:08', '2023-02-17 21:52:36');
INSERT INTO `branches` VALUES (2, '7001', '7001', '181.219.125.7', 'calling', '2023-02-17 19:58:08', '2023-02-17 21:52:36');
INSERT INTO `branches` VALUES (3, '7002', '7004', '181.219.125.7', 'offline', '2023-02-17 19:58:08', '2023-02-17 21:08:31');
INSERT INTO `branches` VALUES (4, '7003', '7003', '(Unspecified)', 'offline', '2023-02-17 19:58:08', '2023-02-17 21:08:31');
INSERT INTO `branches` VALUES (5, '7004', '7002', '(Unspecified)', 'paused', '2023-02-17 19:58:08', '2023-02-17 22:14:02');

SET FOREIGN_KEY_CHECKS = 1;
