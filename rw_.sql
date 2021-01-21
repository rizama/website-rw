/*
 Navicat Premium Data Transfer

 Source Server         : local_sql
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : rw_

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 20/01/2021 00:18:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for economics
-- ----------------------------
DROP TABLE IF EXISTS `economics`;
CREATE TABLE `economics`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of economics
-- ----------------------------
INSERT INTO `economics` VALUES (1, 'Cukup', '-', '2021-01-15 22:11:10', '2021-01-15 22:11:10');
INSERT INTO `economics` VALUES (2, 'Lebih dari cukup', '-', '2021-01-15 22:11:40', '2021-01-15 22:11:40');
INSERT INTO `economics` VALUES (3, 'Kurang', '-', '2021-01-15 22:11:51', '2021-01-15 22:11:51');

-- ----------------------------
-- Table structure for educations
-- ----------------------------
DROP TABLE IF EXISTS `educations`;
CREATE TABLE `educations`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of educations
-- ----------------------------
INSERT INTO `educations` VALUES (1, 'SD', 'Sekolah Dasar', '2021-01-15 22:12:44', '2021-01-15 22:12:44');
INSERT INTO `educations` VALUES (2, 'SMP', 'Sekolah Menengah Pertama', '2021-01-15 22:12:57', '2021-01-15 22:12:57');
INSERT INTO `educations` VALUES (3, 'SMK', 'Sekolah Menengah Kejuruan', '2021-01-15 22:13:15', '2021-01-15 22:13:15');
INSERT INTO `educations` VALUES (4, 'SMA', 'Sekolah Menengah Atas', '2021-01-15 22:13:27', '2021-01-15 22:13:27');
INSERT INTO `educations` VALUES (5, 'S1', 'Strata 1', '2021-01-15 22:15:44', '2021-01-15 22:15:44');
INSERT INTO `educations` VALUES (6, 'S2', 'Strata 2', '2021-01-15 22:15:51', '2021-01-15 22:15:51');
INSERT INTO `educations` VALUES (7, 'Belum/Tidak ada', 'Belum/Tidak ada Pendidikan Terakhir', '2021-01-15 23:19:19', '2021-01-15 23:19:19');

-- ----------------------------
-- Table structure for evidens
-- ----------------------------
DROP TABLE IF EXISTS `evidens`;
CREATE TABLE `evidens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `person_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of evidens
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jobs
-- ----------------------------
INSERT INTO `jobs` VALUES (1, 'PNS', 'Pekerja Negeri Sipil', '2021-01-15 22:12:12', '2021-01-15 22:12:12');
INSERT INTO `jobs` VALUES (2, 'KARYAWAN SWASTA', '-', '2021-01-15 22:12:24', '2021-01-15 22:12:29');
INSERT INTO `jobs` VALUES (3, 'Pelajar', 'Belum Bekerja', '2021-01-15 23:07:51', '2021-01-15 23:07:51');
INSERT INTO `jobs` VALUES (4, 'Belum/Tidak Bekerja', 'Belum Bekerja', '2021-01-15 23:08:09', '2021-01-15 23:08:09');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2020_11_24_162130_create_persons_table', 1);
INSERT INTO `migrations` VALUES (5, '2020_11_24_164658_create_educations_table', 1);
INSERT INTO `migrations` VALUES (6, '2020_11_24_164709_create_jobs_table', 1);
INSERT INTO `migrations` VALUES (7, '2020_11_24_164728_create_economics_table', 1);
INSERT INTO `migrations` VALUES (8, '2020_11_24_164753_create_status_citizens_table', 1);
INSERT INTO `migrations` VALUES (9, '2020_11_24_164804_create_evidens_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for persons
-- ----------------------------
DROP TABLE IF EXISTS `persons`;
CREATE TABLE `persons`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `education_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `job_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `economic_conditions_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `citizens_status_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `evidens_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `rt_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `date_of_birth` date NULL DEFAULT NULL,
  `place_of_birth` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `religion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of persons
-- ----------------------------
INSERT INTO `persons` VALUES (3, 5, 1, 1, 1, NULL, 'Megan', 'Garut', '1', 'P', '1990-12-31', 'Bandung', 'islam', '2021-01-15 22:57:23', '2021-01-15 23:06:15');
INSERT INTO `persons` VALUES (4, 2, 2, 1, 2, NULL, 'Lucas', '-', '2', 'L', '2000-09-26', 'Bali', 'islam', '2021-01-15 22:59:01', '2021-01-15 22:59:01');
INSERT INTO `persons` VALUES (5, 5, 2, 1, 1, NULL, 'Luke', NULL, '3', 'L', '1995-10-25', 'Bandung', 'islam', '2021-01-15 23:00:11', '2021-01-15 23:00:11');
INSERT INTO `persons` VALUES (6, 3, 2, 1, 1, NULL, 'Emily', NULL, '4', 'P', '2004-01-31', 'Bandung', 'islam', '2021-01-15 23:05:59', '2021-01-15 23:05:59');
INSERT INTO `persons` VALUES (7, 1, 3, 3, 1, NULL, 'Emma', 'Jl. A.H. Nasution No.105, Cipadung, Kec. Cibiru, Kota Bandung, Jawa Barat 40614', '5', 'P', '2004-01-26', 'Bandung', 'islam', '2021-01-15 23:10:01', '2021-01-15 23:10:01');
INSERT INTO `persons` VALUES (8, 4, 2, 1, 2, NULL, 'Matt', '-', '3', 'L', '1999-07-27', 'Bali', 'islam', '2021-01-15 23:16:00', '2021-01-15 23:16:00');
INSERT INTO `persons` VALUES (9, 7, 4, 1, 1, NULL, 'Gabrielle', NULL, '2', 'P', '2020-01-26', 'Bandung', 'katolik', '2021-01-15 23:20:02', '2021-01-15 23:20:02');

-- ----------------------------
-- Table structure for status_citizens
-- ----------------------------
DROP TABLE IF EXISTS `status_citizens`;
CREATE TABLE `status_citizens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of status_citizens
-- ----------------------------
INSERT INTO `status_citizens` VALUES (1, 'Tetap', 'Warga Tetap', '2021-01-12 21:34:46', '2021-01-12 21:34:56');
INSERT INTO `status_citizens` VALUES (2, 'Sementara', 'Warga Pendatang', '2021-01-12 21:35:47', '2021-01-12 21:35:47');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Rizky Sam Pratama', 'admin@mail.com', NULL, '$2y$10$sr0T.cJevrITxtKcdY/nfOK62.hOucnLT0eKQcXgTFAB49HzSDy7K', NULL, '2020-12-16 18:04:49', '2020-12-16 18:04:49');

SET FOREIGN_KEY_CHECKS = 1;
