SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `cat` int DEFAULT '1',
  `avatar_image` varchar(255) DEFAULT NULL,
  `status` smallint DEFAULT '9',
  `created_at` int NOT NULL,
  `updated_at` int DEFAULT NULL,
  `blocked_at` int DEFAULT NULL,
  `blocked_id` int DEFAULT NULL,
  `login_at` int DEFAULT NULL,
  `login_ip` varchar(255) DEFAULT NULL,
  `access_token` varchar(255) NOT NULL,
  `created_ip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `industry` (
  `id` int NOT NULL,
  `status` smallint DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `industry_lang` (
  `id` int NOT NULL,
  `industry_id` int NOT NULL,
  `lang_id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `integrator` (
  `id` int NOT NULL,
  `projects_count` int DEFAULT NULL COMMENT 'Кол-во готовых проектов',
  `average_rate` int DEFAULT NULL COMMENT 'Средняя оценка',
  `open_date` smallint DEFAULT NULL COMMENT 'Дата открытия компании',
  `created_at` int DEFAULT NULL COMMENT 'Дата регистрации',
  `created_id` int DEFAULT NULL COMMENT 'Зарегистрировал',
  `updated_at` int DEFAULT NULL COMMENT 'Дата обновления',
  `updated_id` int DEFAULT NULL COMMENT 'Обновил',
  `blocked_at` int DEFAULT NULL COMMENT 'Дата блокировки',
  `blocked_id` int DEFAULT NULL COMMENT 'Заблокировал',
  `last_activity` int DEFAULT NULL COMMENT 'Последняя активность',
  `logo_image` varchar(255) DEFAULT NULL COMMENT 'Лого|img_crop',
  `wall_image` varchar(255) DEFAULT NULL,
  `region_id` int NOT NULL,
  `status` smallint DEFAULT '9',
  `integrator_category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `integrators_categories` (
  `integrator_id` int NOT NULL,
  `integrator_category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `integrators_products` (
  `id` int NOT NULL,
  `integrator_id` int NOT NULL,
  `product_id` int NOT NULL,
  `props` text,
  `min_price` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `partner_status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `integrators_products_items` (
  `id` int NOT NULL,
  `integrators_products_id` int NOT NULL,
  `integrators_products_integrator_id` int NOT NULL,
  `integrators_products_product_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` int DEFAULT NULL,
  `created_id` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  `updated_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `integrators_products_items_lang` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `price` int DEFAULT NULL,
  `link` varchar(255) NOT NULL,
  `lang_id` varchar(2) NOT NULL,
  `integrators_products_item_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `integrators_props` (
  `integrator_id` int NOT NULL,
  `integrator_prop_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `integrators_regions` (
  `integrator_id` int NOT NULL,
  `integrator_region_id` int NOT NULL,
  `integrator_integrator_category_id` int NOT NULL,
  `region_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `integrator_category` (
  `id` int NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `parent_lvl` smallint DEFAULT NULL,
  `sort` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `integrator_category_lang` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `integrator_category_id` int NOT NULL,
  `lang_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `integrator_contacts` (
  `id` int NOT NULL,
  `integrator_id` int NOT NULL,
  `type` int DEFAULT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `integrator_lang` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `short_descr` varchar(255) DEFAULT NULL,
  `descr` text,
  `addr` varchar(255) DEFAULT NULL,
  `integrator_id` int NOT NULL,
  `lang_id` varchar(2) NOT NULL
) ;

CREATE TABLE `integrator_langs` (
  `id` int NOT NULL,
  `name` varchar(45) NOT NULL,
  `integrator_id` int NOT NULL,
  `lang_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `integrator_prop` (
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `integrator_prop_lang` (
  `int(11)` int NOT NULL,
  `integrator_prop_id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lang_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `lang` (
  `id` varchar(2) NOT NULL,
  `locale` varchar(8) NOT NULL,
  `name` varchar(32) NOT NULL,
  `status` smallint DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `post` (
  `id` int NOT NULL,
  `views` int DEFAULT '0',
  `created_at` int DEFAULT NULL,
  `created_id` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  `updated_id` int DEFAULT NULL,
  `status` smallint DEFAULT '9',
  `image` varchar(255) DEFAULT NULL,
  `post_category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `post_category` (
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `post_category_lang` (
  `id` int NOT NULL,
  `post_category_id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lang_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `post_lang` (
  `id` int NOT NULL,
  `post_id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `descr` text,
  `lang_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `post_tag` (
  `id` int NOT NULL,
  `post_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `post_tag_lang` (
  `post_tag_id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lang_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `product` (
  `id` int NOT NULL,
  `rating` decimal(10,2) DEFAULT NULL COMMENT 'Рейтинг',
  `install_count` int DEFAULT NULL COMMENT 'Кол-во использований',
  `logo` varchar(100) NOT NULL COMMENT 'Лого продукта|img_crop',
  `rate_average` decimal(10,2) DEFAULT NULL,
  `rate_boon` decimal(10,2) DEFAULT NULL,
  `rate_func` decimal(10,2) DEFAULT NULL,
  `rate_support` decimal(10,2) DEFAULT NULL,
  `rate_price` decimal(10,2) DEFAULT NULL,
  `rate_count` int DEFAULT NULL,
  `admin_id` int DEFAULT NULL,
  `status` smallint DEFAULT '9',
  `category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `products_categories` (
  `product_id` int NOT NULL,
  `product_category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `products_industries` (
  `industry_id` int NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `products_props` (
  `prop_id` int NOT NULL,
  `product_id` int NOT NULL,
  `prop_type_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `products_regions` (
  `product_id` int NOT NULL,
  `region_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `product_category` (
  `id` int NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `parent_lvl` int DEFAULT NULL,
  `status` smallint DEFAULT '9',
  `sort` smallint DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `product_category_lang` (
  `id` int NOT NULL,
  `product_category_id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `lang_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `product_compatibility` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `comp_product_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `product_lang` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `short_descr` varchar(255) DEFAULT NULL,
  `descr` text,
  `product_id` int NOT NULL,
  `lang_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `product_tarif` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `users_count` varchar(100) DEFAULT NULL,
  `demo_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `product_tarif_items` (
  `id` int NOT NULL,
  `product_tarifs_id` int NOT NULL,
  `product_tarifs_product_id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `product_tarif_lang` (
  `id` int NOT NULL,
  `product_tarif_id` int NOT NULL,
  `lang_id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `descr` varchar(255) DEFAULT NULL,
  `price_descr` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `prop` (
  `id` int NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `prop_type_id` int NOT NULL,
  `status` smallint DEFAULT '9',
  `icon` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `props_questions` (
  `question_id` int NOT NULL,
  `product_id` int NOT NULL,
  `prop_id` int NOT NULL,
  `step` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `prop_lang` (
  `id` int NOT NULL,
  `prop_id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `lang_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `prop_type` (
  `id` int NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `prop_type_lang` (
  `id` int NOT NULL,
  `prop_type_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `lang_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `question` (
  `id` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `step` int DEFAULT NULL,
  `status` smallint DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `region` (
  `id` int NOT NULL,
  `parent_id` int DEFAULT NULL,
  `parent_lvl` smallint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `region_lang` (
  `id` int NOT NULL,
  `region_id` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `parent_lvl` int DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `lang_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `review` (
  `id` int NOT NULL,
  `created_at` int DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `plus` varchar(255) DEFAULT NULL,
  `minus` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `rate_average` decimal(10,2) DEFAULT NULL,
  `rate_boon` decimal(10,2) DEFAULT NULL,
  `rate_func` decimal(10,2) DEFAULT NULL,
  `rate_support` decimal(10,2) DEFAULT NULL,
  `rate_price` decimal(10,2) DEFAULT NULL,
  `user_id` int NOT NULL,
  `status` smallint DEFAULT '9',
  `product_id` int DEFAULT NULL,
  `integrator_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `cat` int DEFAULT '1',
  `avatar_image` varchar(255) DEFAULT NULL,
  `status` smallint DEFAULT '9',
  `created_at` int NOT NULL,
  `updated_at` int DEFAULT NULL,
  `blocked_at` int DEFAULT NULL,
  `blocked_id` int DEFAULT NULL,
  `login_at` int DEFAULT NULL,
  `login_ip` varchar(255) DEFAULT NULL,
  `access_token` varchar(255) NOT NULL,
  `created_ip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `industry`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `industry_lang`
  ADD PRIMARY KEY (`id`,`industry_id`,`lang_id`),
  ADD KEY `fk_industry_lang_industry1` (`industry_id`);

ALTER TABLE `integrator`
  ADD PRIMARY KEY (`id`,`region_id`,`integrator_category_id`),
  ADD KEY `fk_integrator_country1_idx` (`region_id`),
  ADD KEY `fk_integrator_integrator_category1_idx` (`integrator_category_id`);

ALTER TABLE `integrators_categories`
  ADD PRIMARY KEY (`integrator_id`,`integrator_category_id`),
  ADD KEY `fk_integrators_categories_integrator_category1_idx` (`integrator_category_id`);

ALTER TABLE `integrators_products`
  ADD PRIMARY KEY (`id`,`integrator_id`,`product_id`),
  ADD KEY `fk_integrators_products_product1_idx` (`product_id`),
  ADD KEY `fk_integrators_products_integrator1` (`integrator_id`);

ALTER TABLE `integrators_products_items`
  ADD PRIMARY KEY (`id`,`integrators_products_id`,`integrators_products_integrator_id`,`integrators_products_product_id`),
  ADD KEY `fk_integrators_products_items_integrators_products1_idx` (`integrators_products_id`,`integrators_products_integrator_id`,`integrators_products_product_id`);

ALTER TABLE `integrators_products_items_lang`
  ADD PRIMARY KEY (`id`,`lang_id`,`integrators_products_item_id`),
  ADD KEY `fk_integrators_products_items_lang_lang1_idx` (`lang_id`),
  ADD KEY `fk_integrators_products_items_lang_integrators_products_ite_idx` (`integrators_products_item_id`);

ALTER TABLE `integrators_props`
  ADD KEY `fk_integrators_props_integrator1_idx` (`integrator_id`),
  ADD KEY `fk_integrators_props_integrator_prop1_idx` (`integrator_prop_id`);

ALTER TABLE `integrators_regions`
  ADD PRIMARY KEY (`integrator_id`,`integrator_region_id`,`integrator_integrator_category_id`,`region_id`),
  ADD KEY `fk_integrators_regions_region1_idx` (`region_id`);

ALTER TABLE `integrator_category`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `integrator_category_lang`
  ADD PRIMARY KEY (`id`,`lang_id`),
  ADD KEY `fk_integrator_category_lang_integrator_category1_idx` (`integrator_category_id`),
  ADD KEY `fk_integrator_category_lang_lang1_idx` (`lang_id`);

ALTER TABLE `integrator_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_integrator_contacts_integrator1_idx` (`integrator_id`);

ALTER TABLE `integrator_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_integrator_lang_integrator1_idx` (`integrator_id`);

ALTER TABLE `integrator_langs`
  ADD PRIMARY KEY (`id`,`integrator_id`,`lang_id`),
  ADD KEY `fk_integrator_langs_integrator1_idx` (`integrator_id`),
  ADD KEY `fk_integrator_langs_lang1_idx` (`lang_id`);

ALTER TABLE `integrator_prop`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `integrator_prop_lang`
  ADD PRIMARY KEY (`int(11)`,`lang_id`),
  ADD KEY `fk_integrator_prop_lang_integrator_prop1_idx` (`integrator_prop_id`),
  ADD KEY `fk_integrator_prop_lang_lang1_idx` (`lang_id`);

ALTER TABLE `lang`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_post_category1_idx` (`post_category_id`);

ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `post_category_lang`
  ADD PRIMARY KEY (`id`,`lang_id`),
  ADD KEY `fk_post_category_lang_post_category1_idx` (`post_category_id`),
  ADD KEY `fk_post_category_lang_lang1_idx` (`lang_id`);

ALTER TABLE `post_lang`
  ADD PRIMARY KEY (`id`,`lang_id`),
  ADD KEY `fk_post_lang_post1_idx` (`post_id`),
  ADD KEY `fk_post_lang_lang1_idx` (`lang_id`);

ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_tag_post1_idx` (`post_id`);

ALTER TABLE `post_tag_lang`
  ADD PRIMARY KEY (`lang_id`),
  ADD KEY `fk_post_tag_lang_post_tag1_idx` (`post_tag_id`);

ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `products_categories`
  ADD KEY `fk_products_categories_product1_idx` (`product_id`),
  ADD KEY `fk_products_categories_product_category1_idx` (`product_category_id`);

ALTER TABLE `products_industries`
  ADD PRIMARY KEY (`industry_id`,`product_id`),
  ADD KEY `fk_products_industries_product1_idx` (`product_id`);

ALTER TABLE `products_props`
  ADD KEY `fk_products_props_product1_idx` (`product_id`),
  ADD KEY `fk_products_props_prop` (`prop_id`);

ALTER TABLE `products_regions`
  ADD PRIMARY KEY (`product_id`,`region_id`),
  ADD KEY `fk_products_countries_country1_idx` (`region_id`);

ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `product_category_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category_lang_product_category1_idx` (`product_category_id`),
  ADD KEY `fk_product_category_lang_lang1_idx` (`lang_id`);

ALTER TABLE `product_compatibility`
  ADD PRIMARY KEY (`id`,`product_id`),
  ADD KEY `fk_product_compatibility_product1_idx` (`product_id`);

ALTER TABLE `product_lang`
  ADD PRIMARY KEY (`id`,`product_id`,`lang_id`),
  ADD KEY `fk_product_lang_product1_idx` (`product_id`),
  ADD KEY `fk_product_lang_lang1_idx` (`lang_id`);

ALTER TABLE `product_tarif`
  ADD PRIMARY KEY (`id`,`product_id`),
  ADD KEY `fk_product_tarifs_product1_idx` (`product_id`);

ALTER TABLE `product_tarif_items`
  ADD PRIMARY KEY (`id`,`product_tarifs_id`,`product_tarifs_product_id`),
  ADD KEY `fk_product_tarif_items_product_tarifs1_idx` (`product_tarifs_id`,`product_tarifs_product_id`);

ALTER TABLE `product_tarif_lang`
  ADD PRIMARY KEY (`id`,`product_tarif_id`,`lang_id`),
  ADD KEY `fk_product_tarif_lang_product_tarif1` (`product_tarif_id`);

ALTER TABLE `prop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prop_prop_type1_idx` (`prop_type_id`);

ALTER TABLE `props_questions`
  ADD PRIMARY KEY (`question_id`,`product_id`,`prop_id`),
  ADD KEY `fk_props_questions_product1_idx` (`product_id`),
  ADD KEY `fk_props_questions_prop1_idx` (`prop_id`);

ALTER TABLE `prop_lang`
  ADD PRIMARY KEY (`id`,`prop_id`),
  ADD KEY `fk_prop_lang_lang1_idx` (`lang_id`),
  ADD KEY `fk_prop_lang_prop1` (`prop_id`);

ALTER TABLE `prop_type`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `prop_type_lang`
  ADD PRIMARY KEY (`id`,`prop_type_id`),
  ADD KEY `fk_prop_type_lang_prop_type1_idx` (`prop_type_id`),
  ADD KEY `fk_prop_type_lang_lang1_idx` (`lang_id`);

ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `region_lang`
  ADD PRIMARY KEY (`id`,`region_id`,`lang_id`),
  ADD KEY `fk_region_lang_lang1_idx` (`lang_id`),
  ADD KEY `fk_country_lang_country1` (`region_id`);

ALTER TABLE `review`
  ADD PRIMARY KEY (`id`,`user_id`),
  ADD KEY `fk_review_user1_idx` (`user_id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);


ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `industry`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `industry_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `integrator`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `integrators_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `integrators_products_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `integrators_products_items_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `integrator_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `integrator_category_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `integrator_contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `integrator_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `integrator_langs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `integrator_prop`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `integrator_prop_lang`
  MODIFY `int(11)` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `post`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `post_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `post_category_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `post_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `post_tag`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `product_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `product_category_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `product_compatibility`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `product_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `product_tarif`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `product_tarif_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `product_tarif_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `prop`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `prop_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `prop_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `prop_type_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `question`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `region`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `region_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `review`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;


ALTER TABLE `industry_lang`
  ADD CONSTRAINT `fk_industry_lang_industry1` FOREIGN KEY (`industry_id`) REFERENCES `industry` (`id`);

ALTER TABLE `integrator`
  ADD CONSTRAINT `fk_integrator_country1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`),
  ADD CONSTRAINT `fk_integrator_integrator_category1` FOREIGN KEY (`integrator_category_id`) REFERENCES `integrator_category` (`id`);

ALTER TABLE `integrators_categories`
  ADD CONSTRAINT `fk_integrators_categories_integrator1` FOREIGN KEY (`integrator_id`) REFERENCES `integrator` (`id`),
  ADD CONSTRAINT `fk_integrators_categories_integrator_category1` FOREIGN KEY (`integrator_category_id`) REFERENCES `integrator_category` (`id`);

ALTER TABLE `integrators_products`
  ADD CONSTRAINT `fk_integrators_products_integrator1` FOREIGN KEY (`integrator_id`) REFERENCES `integrator` (`id`),
  ADD CONSTRAINT `fk_integrators_products_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

ALTER TABLE `integrators_products_items`
  ADD CONSTRAINT `fk_integrators_products_items_integrators_products1` FOREIGN KEY (`integrators_products_id`,`integrators_products_integrator_id`,`integrators_products_product_id`) REFERENCES `integrators_products` (`id`, `integrator_id`, `product_id`);

ALTER TABLE `integrators_products_items_lang`
  ADD CONSTRAINT `fk_integrators_products_items_lang_integrators_products_items1` FOREIGN KEY (`integrators_products_item_id`) REFERENCES `integrators_products_items` (`id`),
  ADD CONSTRAINT `fk_integrators_products_items_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`);

ALTER TABLE `integrators_props`
  ADD CONSTRAINT `fk_integrators_props_integrator1` FOREIGN KEY (`integrator_id`) REFERENCES `integrator` (`id`),
  ADD CONSTRAINT `fk_integrators_props_integrator_prop1` FOREIGN KEY (`integrator_prop_id`) REFERENCES `integrator_prop` (`id`);

ALTER TABLE `integrators_regions`
  ADD CONSTRAINT `fk_integrators_regions_integrator1` FOREIGN KEY (`integrator_id`,`integrator_region_id`,`integrator_integrator_category_id`) REFERENCES `integrator` (`id`, `region_id`, `integrator_category_id`),
  ADD CONSTRAINT `fk_integrators_regions_region1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`);

ALTER TABLE `integrator_category_lang`
  ADD CONSTRAINT `fk_integrator_category_lang_integrator_category1` FOREIGN KEY (`integrator_category_id`) REFERENCES `integrator_category` (`id`),
  ADD CONSTRAINT `fk_integrator_category_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`);

ALTER TABLE `integrator_contacts`
  ADD CONSTRAINT `fk_integrator_contacts_integrator1` FOREIGN KEY (`integrator_id`) REFERENCES `integrator` (`id`);

ALTER TABLE `integrator_langs`
  ADD CONSTRAINT `fk_integrator_langs_integrator1` FOREIGN KEY (`integrator_id`) REFERENCES `integrator` (`id`),
  ADD CONSTRAINT `fk_integrator_langs_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`);

ALTER TABLE `integrator_prop_lang`
  ADD CONSTRAINT `fk_integrator_prop_lang_integrator_prop1` FOREIGN KEY (`integrator_prop_id`) REFERENCES `integrator_prop` (`id`),
  ADD CONSTRAINT `fk_integrator_prop_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`);

ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_post_category1` FOREIGN KEY (`post_category_id`) REFERENCES `post_category` (`id`);

ALTER TABLE `post_category_lang`
  ADD CONSTRAINT `fk_post_category_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`),
  ADD CONSTRAINT `fk_post_category_lang_post_category1` FOREIGN KEY (`post_category_id`) REFERENCES `post_category` (`id`);

ALTER TABLE `post_lang`
  ADD CONSTRAINT `fk_post_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`),
  ADD CONSTRAINT `fk_post_lang_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);

ALTER TABLE `post_tag`
  ADD CONSTRAINT `fk_post_tag_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);

ALTER TABLE `post_tag_lang`
  ADD CONSTRAINT `fk_post_tag_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`),
  ADD CONSTRAINT `fk_post_tag_lang_post_tag1` FOREIGN KEY (`post_tag_id`) REFERENCES `post_tag` (`id`);

ALTER TABLE `products_categories`
  ADD CONSTRAINT `fk_products_categories_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `fk_products_categories_product_category1` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`id`);

ALTER TABLE `products_industries`
  ADD CONSTRAINT `fk_products_industries_industry1` FOREIGN KEY (`industry_id`) REFERENCES `industry` (`id`),
  ADD CONSTRAINT `fk_products_industries_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

ALTER TABLE `products_props`
  ADD CONSTRAINT `fk_products_props_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `fk_products_props_prop` FOREIGN KEY (`prop_id`) REFERENCES `prop` (`id`);

ALTER TABLE `products_regions`
  ADD CONSTRAINT `fk_products_countries_country1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`),
  ADD CONSTRAINT `fk_products_countries_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

ALTER TABLE `product_category_lang`
  ADD CONSTRAINT `fk_product_category_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`),
  ADD CONSTRAINT `fk_product_category_lang_product_category1` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`id`);

ALTER TABLE `product_compatibility`
  ADD CONSTRAINT `fk_product_compatibility_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

ALTER TABLE `product_lang`
  ADD CONSTRAINT `fk_product_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`),
  ADD CONSTRAINT `fk_product_lang_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

ALTER TABLE `product_tarif`
  ADD CONSTRAINT `fk_product_tarifs_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

ALTER TABLE `product_tarif_items`
  ADD CONSTRAINT `fk_product_tarif_items_product_tarifs1` FOREIGN KEY (`product_tarifs_id`,`product_tarifs_product_id`) REFERENCES `product_tarif` (`id`, `product_id`);

ALTER TABLE `product_tarif_lang`
  ADD CONSTRAINT `fk_product_tarif_lang_product_tarif1` FOREIGN KEY (`product_tarif_id`) REFERENCES `product_tarif` (`id`);

ALTER TABLE `prop`
  ADD CONSTRAINT `fk_prop_prop_type1` FOREIGN KEY (`prop_type_id`) REFERENCES `prop_type` (`id`);

ALTER TABLE `props_questions`
  ADD CONSTRAINT `fk_props_questions_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `fk_props_questions_prop1` FOREIGN KEY (`prop_id`) REFERENCES `prop` (`id`),
  ADD CONSTRAINT `fk_props_questions_question1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`);

ALTER TABLE `prop_lang`
  ADD CONSTRAINT `fk_prop_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`),
  ADD CONSTRAINT `fk_prop_lang_prop1` FOREIGN KEY (`prop_id`) REFERENCES `prop` (`id`);

ALTER TABLE `prop_type_lang`
  ADD CONSTRAINT `fk_prop_type_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`),
  ADD CONSTRAINT `fk_prop_type_lang_prop_type1` FOREIGN KEY (`prop_type_id`) REFERENCES `prop_type` (`id`);

ALTER TABLE `region_lang`
  ADD CONSTRAINT `fk_country_lang_country1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`),
  ADD CONSTRAINT `fk_region_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`);

ALTER TABLE `review`
  ADD CONSTRAINT `fk_review_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
