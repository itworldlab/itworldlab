<?php

use yii\db\Migration;

/**
 * Class m220404_143531_modify_langs
 */
class m220404_143531_modify_langs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable("region_lang");
        $this->execute("CREATE TABLE `region_lang` (
  `id` int NOT NULL,
  `region_id` int NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `parent_lvl` int DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `lang_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `region_lang`
--
ALTER TABLE `region_lang`
  ADD PRIMARY KEY (`id`,`region_id`,`lang_id`),
  ADD KEY `fk_region_lang_lang1_idx` (`lang_id`),
  ADD KEY `fk_country_lang_country1` (`region_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `region_lang`
--
ALTER TABLE `region_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `region_lang`
--
ALTER TABLE `region_lang`
  ADD CONSTRAINT `fk_country_lang_country1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`),
  ADD CONSTRAINT `fk_region_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`);
COMMIT;
");
        $this->dropTable("post_tag_lang");
        $this->dropTable("post_category_lang");
        $this->dropTable("post_lang");

        $this->execute("CREATE TABLE `post_category_lang` (
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

CREATE TABLE `post_tag_lang` (
  `post_tag_id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lang_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;


ALTER TABLE `post_category_lang`
  ADD PRIMARY KEY (`id`,`lang_id`),
  ADD KEY `fk_post_category_lang_post_category1_idx` (`post_category_id`),
  ADD KEY `fk_post_category_lang_lang1_idx` (`lang_id`);

ALTER TABLE `post_lang`
  ADD PRIMARY KEY (`id`,`lang_id`),
  ADD KEY `fk_post_lang_post1_idx` (`post_id`),
  ADD KEY `fk_post_lang_lang1_idx` (`lang_id`);

ALTER TABLE `post_tag_lang`
  ADD PRIMARY KEY (`lang_id`),
  ADD KEY `fk_post_tag_lang_post_tag1_idx` (`post_tag_id`);


ALTER TABLE `post_category_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `post_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;


ALTER TABLE `post_category_lang`
  ADD CONSTRAINT `fk_post_category_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`),
  ADD CONSTRAINT `fk_post_category_lang_post_category1` FOREIGN KEY (`post_category_id`) REFERENCES `post_category` (`id`);

ALTER TABLE `post_lang`
  ADD CONSTRAINT `fk_post_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`),
  ADD CONSTRAINT `fk_post_lang_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);

ALTER TABLE `post_tag_lang`
  ADD CONSTRAINT `fk_post_tag_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`),
  ADD CONSTRAINT `fk_post_tag_lang_post_tag1` FOREIGN KEY (`post_tag_id`) REFERENCES `post_tag` (`id`);
");



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220404_143531_modify_langs cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220404_143531_modify_langs cannot be reverted.\n";

        return false;
    }
    */
}
