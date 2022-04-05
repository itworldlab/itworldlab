<?php

use yii\db\Migration;

/**
 * Class m220404_130241_new_integrator_tables
 */
class m220404_130241_new_company_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable("integrator_contacts");
        $this->dropTable("integrators_props");
        $this->dropTable("integrators_products");
        $this->dropTable("integrator_lang");
        $this->dropTable("integrator_prop_lang");
        $this->dropTable("integrator_prop");
        $this->dropTable("integrator");
        $this->execute("
CREATE TABLE `companies_categories` (
  `company_id` int NOT NULL,
  `company_category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `companies_products` (
  `id` int NOT NULL,
  `props` text,
  `min_price` int DEFAULT NULL,
  `company_id` int NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `companies_products_items` (
  `id` int NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `companies_products_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `companies_products_items_lang` (
  `id` int NOT NULL,
  `companies_products_items_id` int NOT NULL,
  `lang_id` varchar(2) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `descr` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `companies_products_lang` (
  `id` int NOT NULL,
  `companies_products_id` int NOT NULL,
  `lang_id` varchar(2) NOT NULL,
  `partner_status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `companies_regions` (
  `region_id` int NOT NULL,
  `company_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `company` (
  `id` int NOT NULL,
  `projects_count` int DEFAULT NULL,
  `average_rate` int DEFAULT NULL,
  `open_date` smallint DEFAULT NULL,
  `status` int DEFAULT NULL,
  `logo_image` varchar(100) DEFAULT NULL,
  `wall_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `company_category` (
  `id` int NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `parent_lvl` int DEFAULT NULL,
  `sort` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `company_category_lang` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `company_category_id` int NOT NULL,
  `lang_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `company_contacts` (
  `id` int NOT NULL,
  `type` smallint DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `company_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

CREATE TABLE `company_lang` (
  `id` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `short_descr` varchar(255) DEFAULT NULL,
  `descr` text,
  `addr` varchar(100) DEFAULT NULL,
  `company_id` int NOT NULL,
  `lang_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


ALTER TABLE `companies_categories`
  ADD PRIMARY KEY (`company_id`,`company_category_id`),
  ADD KEY `fk_companies_categories_company_category1_idx` (`company_category_id`);

ALTER TABLE `companies_products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `companies_products_items`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `companies_products_items_lang`
  ADD PRIMARY KEY (`id`,`companies_products_items_id`,`lang_id`),
  ADD KEY `fk_companies_products_items_lang_companies_products_items1_idx` (`companies_products_items_id`),
  ADD KEY `fk_companies_products_items_lang_lang1_idx` (`lang_id`);

ALTER TABLE `companies_products_lang`
  ADD PRIMARY KEY (`id`,`companies_products_id`,`lang_id`),
  ADD KEY `fk_companies_products_lang_companies_products1_idx` (`companies_products_id`),
  ADD KEY `fk_companies_products_lang_lang1_idx` (`lang_id`);

ALTER TABLE `companies_regions`
  ADD PRIMARY KEY (`region_id`,`company_id`),
  ADD KEY `fk_companies_regions_company1_idx` (`company_id`);

ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `company_category`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `company_category_lang`
  ADD PRIMARY KEY (`id`,`company_category_id`,`lang_id`),
  ADD KEY `fk_company_category_lang_company_category1_idx` (`company_category_id`),
  ADD KEY `fk_company_category_lang_lang1_idx` (`lang_id`);

ALTER TABLE `company_contacts`
  ADD PRIMARY KEY (`id`,`company_id`),
  ADD KEY `fk_company_contacts_company1_idx` (`company_id`);

ALTER TABLE `company_lang`
  ADD PRIMARY KEY (`id`,`lang_id`),
  ADD KEY `fk_company_lang_company1_idx` (`company_id`),
  ADD KEY `fk_company_lang_lang1_idx` (`lang_id`);


ALTER TABLE `companies_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `companies_products_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `companies_products_items_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `companies_products_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `company`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `company_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `company_category_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `company_contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `company_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;


ALTER TABLE `companies_categories`
  ADD CONSTRAINT `fk_companies_categories_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `fk_companies_categories_company_category1` FOREIGN KEY (`company_category_id`) REFERENCES `company_category` (`id`);

ALTER TABLE `companies_products_items_lang`
  ADD CONSTRAINT `fk_companies_products_items_lang_companies_products_items1` FOREIGN KEY (`companies_products_items_id`) REFERENCES `companies_products_items` (`id`),
  ADD CONSTRAINT `fk_companies_products_items_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`);

ALTER TABLE `companies_products_lang`
  ADD CONSTRAINT `fk_companies_products_lang_companies_products1` FOREIGN KEY (`companies_products_id`) REFERENCES `companies_products` (`id`),
  ADD CONSTRAINT `fk_companies_products_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`);

ALTER TABLE `companies_regions`
  ADD CONSTRAINT `fk_companies_regions_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `fk_companies_regions_region1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`);

ALTER TABLE `company_category_lang`
  ADD CONSTRAINT `fk_company_category_lang_company_category1` FOREIGN KEY (`company_category_id`) REFERENCES `company_category` (`id`),
  ADD CONSTRAINT `fk_company_category_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`);

ALTER TABLE `company_contacts`
  ADD CONSTRAINT `fk_company_contacts_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

ALTER TABLE `company_lang`
  ADD CONSTRAINT `fk_company_lang_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`),
  ADD CONSTRAINT `fk_company_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`);
");

        $this->addColumn("company","category_id",$this->integer(11)->notNull());
        $this->addColumn("company","region_id",$this->integer(11)->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220404_130241_new_integrator_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220404_130241_new_integrator_tables cannot be reverted.\n";

        return false;
    }
    */
}
