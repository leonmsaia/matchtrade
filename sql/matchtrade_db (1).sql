-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-03-2018 a las 21:59:47
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `matchtrade_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions_admin`
--

CREATE TABLE `ci_sessions_admin` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'provider', 'Provider'),
(4, 'sales', 'Vendedor'),
(5, 'publisher', 'Blogero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list_advise`
--

CREATE TABLE `list_advise` (
  `advise_id` int(11) NOT NULL,
  `advise_code` varchar(50) NOT NULL DEFAULT '0',
  `advise_category` int(11) NOT NULL DEFAULT '0',
  `advise_author` int(11) DEFAULT NULL,
  `advise_publication_start` varchar(50) DEFAULT NULL,
  `advise_name` varchar(250) DEFAULT NULL,
  `advise_desc` varchar(250) DEFAULT NULL,
  `advise_baseprice` float DEFAULT NULL,
  `advise_qty_base` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `list_advise`
--

INSERT INTO `list_advise` (`advise_id`, `advise_code`, `advise_category`, `advise_author`, `advise_publication_start`, `advise_name`, `advise_desc`, `advise_baseprice`, `advise_qty_base`) VALUES
(9, 'owx9jfs4kiyhtzp', 2, 1, '30 January, 2018', 'test', 'test', 100, 1),
(10, '9k6zesrrv3577y9', 2, 1, '30 January, 2018', 'test', 'test', 100, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list_advise_base_commission`
--

CREATE TABLE `list_advise_base_commission` (
  `base_commission_id` int(11) NOT NULL,
  `advise_id` int(11) DEFAULT NULL,
  `qty_base` int(11) DEFAULT NULL,
  `commission_percent` int(11) DEFAULT NULL,
  `discount_percent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `list_advise_base_commission`
--

INSERT INTO `list_advise_base_commission` (`base_commission_id`, `advise_id`, `qty_base`, `commission_percent`, `discount_percent`) VALUES
(24, 10, 50, 1, 0),
(25, 10, 500, 2, 5),
(26, 10, 10000, 15, 12),
(27, 10, 20000, 17, 15),
(28, 10, 30000, 21, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list_advise_comment`
--

CREATE TABLE `list_advise_comment` (
  `advise_comment_id` int(11) NOT NULL,
  `advise_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_title` varchar(250) DEFAULT NULL,
  `comment_desc` varchar(250) DEFAULT NULL,
  `comment_status` int(11) DEFAULT NULL,
  `comment_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list_advise_img_slide_support`
--

CREATE TABLE `list_advise_img_slide_support` (
  `img_slide_support_id` int(11) NOT NULL,
  `advise_id` int(11) DEFAULT NULL,
  `img_path` varchar(50) DEFAULT NULL,
  `img_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list_advise_img_support`
--

CREATE TABLE `list_advise_img_support` (
  `img_support_id` int(11) NOT NULL,
  `advise_id` int(11) DEFAULT NULL,
  `main_pic` varchar(50) DEFAULT NULL,
  `second_pic` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list_advise_offer`
--

CREATE TABLE `list_advise_offer` (
  `offer_id` int(11) NOT NULL,
  `advise_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `offer_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list_advise_publication_status`
--

CREATE TABLE `list_advise_publication_status` (
  `publication_status_id` int(11) NOT NULL,
  `advise_id` int(11) DEFAULT NULL,
  `max_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `expired` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list_advise_tab_support`
--

CREATE TABLE `list_advise_tab_support` (
  `tab_support_id` int(11) NOT NULL,
  `advise_id` int(11) DEFAULT NULL,
  `tab_support_title` varchar(250) DEFAULT NULL,
  `tab_support_text` varchar(500) DEFAULT NULL,
  `tab_support_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list_advise_terms_support`
--

CREATE TABLE `list_advise_terms_support` (
  `list_advise_term_id` int(11) NOT NULL,
  `advise_id` int(11) DEFAULT NULL,
  `term_title` varchar(250) DEFAULT NULL,
  `term_text` text,
  `term_high` int(11) DEFAULT NULL,
  `term_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list_advise_txt_support`
--

CREATE TABLE `list_advise_txt_support` (
  `txt_support_id` int(11) NOT NULL,
  `advise_id` int(11) DEFAULT NULL,
  `txt_support_subtitle` varchar(250) DEFAULT NULL,
  `txt_support_maintext` varchar(500) DEFAULT NULL,
  `txt_support_secondimg_title` varchar(250) DEFAULT NULL,
  `txt_support_secondimg_txt` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `list_category`
--

CREATE TABLE `list_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  `category_desc` varchar(50) DEFAULT NULL,
  `category_high` int(11) DEFAULT NULL,
  `category_img` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `list_category`
--

INSERT INTO `list_category` (`category_id`, `category_name`, `category_desc`, `category_high`, `category_img`) VALUES
(1, 'Carpinteria', NULL, NULL, NULL),
(2, 'Ferreteria', NULL, NULL, NULL),
(3, 'Servicios Personales', NULL, NULL, NULL),
(4, 'Turismo', NULL, NULL, NULL),
(5, 'Electronica del Hogar', NULL, NULL, NULL),
(6, 'Componentes Electronicos', NULL, NULL, NULL),
(7, 'Textiles', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales_profile`
--

CREATE TABLE `sales_profile` (
  `sale_profile_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sale_profile_birthdate` timestamp NULL DEFAULT NULL,
  `sale_profile_civil` int(11) DEFAULT NULL,
  `sale_profile_pic` varchar(50) DEFAULT NULL,
  `sale_profile_tribute_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales_profile_education`
--

CREATE TABLE `sales_profile_education` (
  `sales_profile_education_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `profile_education_institution` varchar(250) DEFAULT NULL,
  `profile_education_title` varchar(250) DEFAULT NULL,
  `profile_education_status` int(11) DEFAULT NULL,
  `profile_education_date` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales_profile_pay_method`
--

CREATE TABLE `sales_profile_pay_method` (
  `profile_pay_method_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `profile_pay_method_type` int(11) DEFAULT NULL,
  `profile_pay_method_title` varchar(50) DEFAULT NULL,
  `profile_pay_method_desc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales_profile_sales`
--

CREATE TABLE `sales_profile_sales` (
  `profile_sales_particular_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `profile_sales_particular_title` varchar(50) DEFAULT NULL,
  `profile_sales_particular_date` timestamp NULL DEFAULT NULL,
  `profile_sales_particular_qty` int(11) DEFAULT NULL,
  `profile_sales_particular_price` float DEFAULT NULL,
  `profile_sales_particular_success` int(11) DEFAULT NULL,
  `profile_sales_particular_origin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales_profile_work`
--

CREATE TABLE `sales_profile_work` (
  `profile_work_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `profile_work_place` varchar(250) DEFAULT NULL,
  `profile_work_desc` varchar(250) DEFAULT NULL,
  `profile_work_position` varchar(250) DEFAULT NULL,
  `profile_work_date_in` timestamp NULL DEFAULT NULL,
  `profile_work_date_out` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `dni` varchar(50) DEFAULT NULL,
  `cuit` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `dni`, `cuit`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1520004845, 1, 'Admin', 'istrator', 'ADMIN', '0', NULL, NULL),
(3, '::1', 'leonmsaia@gmail.com', '$2y$08$J2q/dzWfHod2bgDueUG0DuiWe5pCUZc4NlFy5x7a70DQdklUE9uUy', NULL, 'leonmsaia@gmail.com', NULL, NULL, NULL, NULL, 1518952674, NULL, 1, 'Leonardo', 'Saia', 'FrikiCode', '+541123747372', '38097445', '20-38097445-3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(5, 1, 3),
(4, 3, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indices de la tabla `ci_sessions_admin`
--
ALTER TABLE `ci_sessions_admin`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `list_advise`
--
ALTER TABLE `list_advise`
  ADD PRIMARY KEY (`advise_id`);

--
-- Indices de la tabla `list_advise_base_commission`
--
ALTER TABLE `list_advise_base_commission`
  ADD PRIMARY KEY (`base_commission_id`);

--
-- Indices de la tabla `list_advise_comment`
--
ALTER TABLE `list_advise_comment`
  ADD PRIMARY KEY (`advise_comment_id`);

--
-- Indices de la tabla `list_advise_img_slide_support`
--
ALTER TABLE `list_advise_img_slide_support`
  ADD PRIMARY KEY (`img_slide_support_id`);

--
-- Indices de la tabla `list_advise_img_support`
--
ALTER TABLE `list_advise_img_support`
  ADD PRIMARY KEY (`img_support_id`);

--
-- Indices de la tabla `list_advise_offer`
--
ALTER TABLE `list_advise_offer`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indices de la tabla `list_advise_publication_status`
--
ALTER TABLE `list_advise_publication_status`
  ADD PRIMARY KEY (`publication_status_id`);

--
-- Indices de la tabla `list_advise_tab_support`
--
ALTER TABLE `list_advise_tab_support`
  ADD PRIMARY KEY (`tab_support_id`);

--
-- Indices de la tabla `list_advise_terms_support`
--
ALTER TABLE `list_advise_terms_support`
  ADD PRIMARY KEY (`list_advise_term_id`);

--
-- Indices de la tabla `list_advise_txt_support`
--
ALTER TABLE `list_advise_txt_support`
  ADD PRIMARY KEY (`txt_support_id`);

--
-- Indices de la tabla `list_category`
--
ALTER TABLE `list_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indices de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sales_profile`
--
ALTER TABLE `sales_profile`
  ADD PRIMARY KEY (`sale_profile_id`);

--
-- Indices de la tabla `sales_profile_education`
--
ALTER TABLE `sales_profile_education`
  ADD PRIMARY KEY (`sales_profile_education_id`);

--
-- Indices de la tabla `sales_profile_pay_method`
--
ALTER TABLE `sales_profile_pay_method`
  ADD PRIMARY KEY (`profile_pay_method_id`);

--
-- Indices de la tabla `sales_profile_work`
--
ALTER TABLE `sales_profile_work`
  ADD PRIMARY KEY (`profile_work_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `list_advise`
--
ALTER TABLE `list_advise`
  MODIFY `advise_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `list_advise_base_commission`
--
ALTER TABLE `list_advise_base_commission`
  MODIFY `base_commission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `list_advise_comment`
--
ALTER TABLE `list_advise_comment`
  MODIFY `advise_comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `list_advise_img_slide_support`
--
ALTER TABLE `list_advise_img_slide_support`
  MODIFY `img_slide_support_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `list_advise_img_support`
--
ALTER TABLE `list_advise_img_support`
  MODIFY `img_support_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `list_advise_offer`
--
ALTER TABLE `list_advise_offer`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `list_advise_publication_status`
--
ALTER TABLE `list_advise_publication_status`
  MODIFY `publication_status_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `list_advise_tab_support`
--
ALTER TABLE `list_advise_tab_support`
  MODIFY `tab_support_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `list_advise_terms_support`
--
ALTER TABLE `list_advise_terms_support`
  MODIFY `list_advise_term_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `list_advise_txt_support`
--
ALTER TABLE `list_advise_txt_support`
  MODIFY `txt_support_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `list_category`
--
ALTER TABLE `list_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sales_profile`
--
ALTER TABLE `sales_profile`
  MODIFY `sale_profile_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sales_profile_education`
--
ALTER TABLE `sales_profile_education`
  MODIFY `sales_profile_education_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sales_profile_pay_method`
--
ALTER TABLE `sales_profile_pay_method`
  MODIFY `profile_pay_method_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sales_profile_work`
--
ALTER TABLE `sales_profile_work`
  MODIFY `profile_work_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
