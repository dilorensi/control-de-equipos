/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50537
Source Host           : localhost:3306
Source Database       : equipos

Target Server Type    : MYSQL
Target Server Version : 50537
File Encoding         : 65001

Date: 2014-09-22 14:39:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `acl_menu`
-- ----------------------------
DROP TABLE IF EXISTS `acl_menu`;
CREATE TABLE `acl_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `boton` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of acl_menu
-- ----------------------------

-- ----------------------------
-- Table structure for `acl_recurso`
-- ----------------------------
DROP TABLE IF EXISTS `acl_recurso`;
CREATE TABLE `acl_recurso` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `metodo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `variables` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ruta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `controlador` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `accion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of acl_recurso
-- ----------------------------
INSERT INTO `acl_recurso` VALUES ('1', 'GET', '', '/registrar-usuario', 'User', 'registrar', 'Registrar', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `acl_recurso` VALUES ('2', 'POST', '', '/usuario-guardar', 'User', 'store', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `acl_recurso` VALUES ('3', 'POST', '', '/usuario-editar', 'User', 'edit', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `acl_recurso` VALUES ('4', 'GET', '', '/usuario-listar', 'User', 'listar', 'Consultar', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `acl_recurso` VALUES ('5', 'GET', '', '/json-usuarios', 'User', 'jsonListar', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `acl_recurso_copy`
-- ----------------------------
DROP TABLE IF EXISTS `acl_recurso_copy`;
CREATE TABLE `acl_recurso_copy` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `metodo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `variables` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ruta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `controlador` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `accion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of acl_recurso_copy
-- ----------------------------
INSERT INTO `acl_recurso_copy` VALUES ('1', 'GET', '', '/registrar-usuario', 'User', 'registrar', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `acl_recurso_copy` VALUES ('2', 'POST', '', '/usuario-guardar', 'User', 'store', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `acl_recurso_copy` VALUES ('3', 'POST', '', '/usuario-editar', 'User', 'edit', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `acl_recurso_copy` VALUES ('4', 'GET', '', 'usuario-listar', 'User', 'listar', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `acl_recurso_copy` VALUES ('5', 'GET', '', '/json-usuarios', 'User', 'jsonListar', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `acl_recurso_menu`
-- ----------------------------
DROP TABLE IF EXISTS `acl_recurso_menu`;
CREATE TABLE `acl_recurso_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned NOT NULL,
  `recurso_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acl_recurso_menu_menu_id_foreign` (`menu_id`),
  KEY `acl_recurso_menu_recurso_id_foreign` (`recurso_id`),
  CONSTRAINT `acl_recurso_menu_recurso_id_foreign` FOREIGN KEY (`recurso_id`) REFERENCES `acl_recurso` (`id`) ON DELETE CASCADE,
  CONSTRAINT `acl_recurso_menu_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `acl_menu` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of acl_recurso_menu
-- ----------------------------

-- ----------------------------
-- Table structure for `acl_rol`
-- ----------------------------
DROP TABLE IF EXISTS `acl_rol`;
CREATE TABLE `acl_rol` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of acl_rol
-- ----------------------------
INSERT INTO `acl_rol` VALUES ('1', 'Administrador', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `acl_rol` VALUES ('2', 'Sistemas', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `acl_rol_recurso`
-- ----------------------------
DROP TABLE IF EXISTS `acl_rol_recurso`;
CREATE TABLE `acl_rol_recurso` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rol_id` int(10) unsigned NOT NULL,
  `recurso_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acl_rol_recurso_rol_id_foreign` (`rol_id`),
  KEY `acl_rol_recurso_recurso_id_foreign` (`recurso_id`),
  CONSTRAINT `acl_rol_recurso_recurso_id_foreign` FOREIGN KEY (`recurso_id`) REFERENCES `acl_recurso` (`id`) ON DELETE CASCADE,
  CONSTRAINT `acl_rol_recurso_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `acl_rol` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of acl_rol_recurso
-- ----------------------------

-- ----------------------------
-- Table structure for `categoria`
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of categoria
-- ----------------------------

-- ----------------------------
-- Table structure for `complemento`
-- ----------------------------
DROP TABLE IF EXISTS `complemento`;
CREATE TABLE `complemento` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `complemento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estatus` enum('activo','baja') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of complemento
-- ----------------------------

-- ----------------------------
-- Table structure for `equipo_complemento`
-- ----------------------------
DROP TABLE IF EXISTS `equipo_complemento`;
CREATE TABLE `equipo_complemento` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `equipo_id` int(10) unsigned NOT NULL,
  `complemento_id` int(10) unsigned NOT NULL,
  `estatus` enum('equipado','baja') COLLATE utf8_unicode_ci NOT NULL,
  `responsable_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `equipo_complemento_equipo_id_foreign` (`equipo_id`),
  KEY `equipo_complemento_complemento_id_foreign` (`complemento_id`),
  KEY `equipo_complemento_responsable_id_foreign` (`responsable_id`),
  CONSTRAINT `equipo_complemento_responsable_id_foreign` FOREIGN KEY (`responsable_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `equipo_complemento_complemento_id_foreign` FOREIGN KEY (`complemento_id`) REFERENCES `complemento` (`id`) ON DELETE CASCADE,
  CONSTRAINT `equipo_complemento_equipo_id_foreign` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of equipo_complemento
-- ----------------------------

-- ----------------------------
-- Table structure for `equipos`
-- ----------------------------
DROP TABLE IF EXISTS `equipos`;
CREATE TABLE `equipos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `equipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categoria_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `equipos_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `equipos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of equipos
-- ----------------------------

-- ----------------------------
-- Table structure for `mantenimiento`
-- ----------------------------
DROP TABLE IF EXISTS `mantenimiento`;
CREATE TABLE `mantenimiento` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `equipo_id` int(10) unsigned NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `fecha_mantenimiento` datetime NOT NULL,
  `tipo` enum('preventivo','correctivo') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `mantenimiento_equipo_id_foreign` (`equipo_id`),
  KEY `mantenimiento_user_id_foreign` (`user_id`),
  CONSTRAINT `mantenimiento_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `mantenimiento_equipo_id_foreign` FOREIGN KEY (`equipo_id`) REFERENCES `equipos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mantenimiento
-- ----------------------------

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_08_30_125246_crearTablaRoles', '1');
INSERT INTO `migrations` VALUES ('2014_08_30_133126_create_user_table', '1');
INSERT INTO `migrations` VALUES ('2014_08_30_143446_create_categoria_table', '1');
INSERT INTO `migrations` VALUES ('2014_08_30_164633_equipos', '1');
INSERT INTO `migrations` VALUES ('2014_08_30_165454_crearTablaComplemento', '1');
INSERT INTO `migrations` VALUES ('2014_08_30_165819_crearEquipoComplemento', '1');
INSERT INTO `migrations` VALUES ('2014_08_30_170552_crearTablaMantenimiento', '1');
INSERT INTO `migrations` VALUES ('2014_09_08_185005_crearTablaAclRecurso', '1');
INSERT INTO `migrations` VALUES ('2014_09_08_185027_crearTablaRolRecurso', '1');
INSERT INTO `migrations` VALUES ('2014_09_09_142026_crearTablaRolMenu', '1');
INSERT INTO `migrations` VALUES ('2014_09_09_142040_crearTablaMenuRecurso', '2');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rol_id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `users_rol_id_foreign` (`rol_id`),
  CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `acl_rol` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1', 'zelgaki@zelgaki.com', '$2y$10$O7I8Bvjf4IFz6xtnwUVTgOUrMnZKV/sy82tNPD6GG0YvvBMvmuGii', 'zelgaki', 'Roberto Gadiel Priego Arias', 'zelgaki.jpg', '2014-09-09 15:48:54', '2014-09-09 15:49:09');
