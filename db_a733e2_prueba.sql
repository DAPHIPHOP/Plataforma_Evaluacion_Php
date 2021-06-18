

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



DELIMITER $$

CREATE DEFINER=`a733e2_prueba`@`%` PROCEDURE `INSERTAR_DIRECCIONES` (IN `idDirecciones` INT(10), IN `direccionIP` VARCHAR(45), IN `direccionMAC` VARCHAR(45), IN `id_quizz_alumno` INT(10))  INSERT INTO direcciones (idDirecciones,direccionIP,direccionMAC,id_quizz_alumno) VALUES (idDirecciones, direccionIP, direccionMAC,id_quizz_alumno)$$

CREATE DEFINER=`a733e2_prueba`@`%` PROCEDURE `INSERTAR_LISTAAPPS` (IN `IdList` INT(10), IN `NombreAppList` VARCHAR(45), IN `IdAppList` VARCHAR(45), IN `id_quizz_alumno` INT(10))  INSERT INTO lista_apps (IdList ,NombreAppList,IdAppList, id_quizz_alumno) VALUES (IdList ,NombreAppList,IdAppList, id_quizz_alumno)$$

CREATE DEFINER=`a733e2_prueba`@`%` PROCEDURE `VER_DNI` (IN `dniP` CHAR(8))  SELECT dni FROM users WHERE dni=dniP$$

CREATE DEFINER=`a733e2_prueba`@`%` PROCEDURE `VER_ESTADO` (IN `dniP` INT(1))  SELECT estado FROM users WHERE dni=dniP$$

CREATE DEFINER=`a733e2_prueba`@`%` PROCEDURE `VER_ID_QUIZZ_STUDENT` (IN `dni2` CHAR(8))  SELECT id FROM quizz_student WHERE student_id =(SELECT id FROM student WHERE user_id =(SELECT id FROM users WHERE dni=dni2))ORDER BY id DESC$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `idDirecciones` int(10) UNSIGNED NOT NULL,
  `direccionIP` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccionMAC` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_quizz_alumno` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=16384 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `direcciones`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ipPublica` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_apps`
--

CREATE TABLE `lista_apps` (
  `idList` int(10) UNSIGNED NOT NULL,
  `nombreAppList` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idAppList` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_quizz_alumno` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=8192 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lista_apps`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM AVG_ROW_LENGTH=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `options`
--

CREATE TABLE `options` (
  `id` int(10) UNSIGNED NOT NULL,
  `option_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_answer` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `question_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `options`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `quizz_id` int(10) UNSIGNED NOT NULL,
  `points` int(11) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `questions`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `question_result`
--

CREATE TABLE `question_result` (
  `quizz_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `option_id` int(10) UNSIGNED NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `question_result`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quizz`
--

CREATE TABLE `quizz` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `deleted_At` varchar(255) DEFAULT NULL,
  `disp_from` datetime DEFAULT NULL,
  `disp_to` datetime DEFAULT NULL,
  `duration` tinyint(4) DEFAULT NULL,
  `teacher_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=1365 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `quizz`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quizz_student`
--

CREATE TABLE `quizz_student` (
  `id` int(10) UNSIGNED NOT NULL,
  `quizz_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=16384 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `quizz_student`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recognitions`
--

CREATE TABLE `recognitions` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `attempt` int(11) NOT NULL,
  `similarity` int(11) NOT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_evaluacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `recognitions`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `results`
--

CREATE TABLE `results` (
  `id` int(10) UNSIGNED NOT NULL,
  `total_points` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=8192 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `name`) VALUES
(1, 'Docente'),
(2, 'Alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student`
--

CREATE TABLE `student` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `student`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teacher`
--

CREATE TABLE `teacher` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `teacher`
--

INSERT INTO `teacher` (`id`, `user_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `rol_id` int(10) UNSIGNED DEFAULT NULL,
  `intentos` int(11) DEFAULT '3',
  `image` longtext COLLATE utf8mb4_unicode_ci,
  `dni` char(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AVG_ROW_LENGTH=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `apellidos`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `rol_id`, `intentos`, `image`, `dni`, `estado`) VALUES
(1, 'Admin', NULL, 'admin@admin.com', NULL, '$2y$10$GuEZ22bDayU6ubtlCOQ9M.WA/hcaTgcVsBSnCMLgxX/I6ysnC5UXW', '1mRKyeAp4mMJfCFSz4G44Oo47BoV0Tur150ymWV6LqOe4k6XaYqhTqxuspcJ', NULL, NULL, NULL, 1, NULL, NULL, '99999999', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`idDirecciones`),
  ADD KEY `FK_direcciones_quizz_student_id` (`id_quizz_alumno`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lista_apps`
--
ALTER TABLE `lista_apps`
  ADD PRIMARY KEY (`idList`),
  ADD KEY `FK_lista_apps_quizz_student_id` (`id_quizz_alumno`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_fk_773758` (`question_id`);

--
-- Indices de la tabla `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_fk_773713` (`quizz_id`);

--
-- Indices de la tabla `question_result`
--
ALTER TABLE `question_result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `option_id_fk_773767` (`option_id`),
  ADD KEY `question_id_fk_773767` (`question_id`),
  ADD KEY `result_id_fk_773767` (`quizz_id`);

--
-- Indices de la tabla `quizz`
--
ALTER TABLE `quizz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_quizz` (`teacher_id`);

--
-- Indices de la tabla `quizz_student`
--
ALTER TABLE `quizz_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_quizz_student_quizz_id` (`quizz_id`),
  ADD KEY `FK_quizz_student_student_id` (`student_id`);

--
-- Indices de la tabla `recognitions`
--
ALTER TABLE `recognitions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recognitions_id_usuario_foreign` (`id_usuario`);

--
-- Indices de la tabla `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk_773765` (`quiz_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_student_users_id` (`user_id`);

--
-- Indices de la tabla `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_docente` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `FK_users` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `idDirecciones` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT de la tabla `lista_apps`
--
ALTER TABLE `lista_apps`
  MODIFY `idList` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT de la tabla `options`
--
ALTER TABLE `options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT de la tabla `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT de la tabla `question_result`
--
ALTER TABLE `question_result`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT de la tabla `quizz`
--
ALTER TABLE `quizz`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT de la tabla `quizz_student`
--
ALTER TABLE `quizz_student`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT de la tabla `recognitions`
--
ALTER TABLE `recognitions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT de la tabla `results`
--
ALTER TABLE `results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT de la tabla `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT de la tabla `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `FK_direcciones_quizz_student_id` FOREIGN KEY (`id_quizz_alumno`) REFERENCES `quizz_student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `lista_apps`
--
ALTER TABLE `lista_apps`
  ADD CONSTRAINT `FK_lista_apps_quizz_student_id` FOREIGN KEY (`id_quizz_alumno`) REFERENCES `quizz_student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `FK_options_questions_id` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `FK_questions_quizz_id` FOREIGN KEY (`quizz_id`) REFERENCES `quizz` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `question_result`
--
ALTER TABLE `question_result`
  ADD CONSTRAINT `FK_question_result_options_id` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_question_result_questions_id` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_question_result_quizz_student_id` FOREIGN KEY (`quizz_id`) REFERENCES `quizz_student` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `quizz`
--
ALTER TABLE `quizz`
  ADD CONSTRAINT `FK_quizz` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `quizz_student`
--
ALTER TABLE `quizz_student`
  ADD CONSTRAINT `FK_quizz_student_quizz_id` FOREIGN KEY (`quizz_id`) REFERENCES `quizz` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_quizz_student_student_id` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `recognitions`
--
ALTER TABLE `recognitions`
  ADD CONSTRAINT `recognitions_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `FK_results_quizz_student_id` FOREIGN KEY (`quiz_id`) REFERENCES `quizz_student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `FK_student_users_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `FK_docente` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;
