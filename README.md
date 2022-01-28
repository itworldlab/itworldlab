INSERT INTO `admin` (`id`, `username`, `name`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `verification_token`, `phone`, `cat`, `avatar_image`, `status`, `created_at`, `updated_at`, `blocked_at`, `blocked_id`, `login_at`, `login_ip`, `access_token`, `created_ip`) VALUES
(5, 'admin', 'Администратор', '', '$2y$13$IH6EYjmRCACh.7QYAWGf0.o9TsBnY7HLkkDs.fFsSPQTOdBgnGpKS', NULL, 'admin@iwl.com', NULL, NULL, 1, NULL, 10, 1640627705, NULL, NULL, NULL, NULL, NULL, '', NULL);

--
-- Дамп данных таблицы `lang`
--

INSERT INTO `lang` (`id`, `locale`, `name`, `status`) VALUES
('1', 'en-EN', 'EN', 10),
('2', 'ru-RU', 'RU', 10);