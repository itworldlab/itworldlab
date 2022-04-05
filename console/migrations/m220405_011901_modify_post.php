<?php

use yii\db\Migration;

/**
 * Class m220405_011901_modify_post
 */
class m220405_011901_modify_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable("post_category_lang");
        $this->dropTable("post_lang");
        $this->dropTable("post_tag_lang");
        $this->dropTable("post_tag");
        $this->dropTable("post");
        $this->dropTable("post_category");

        $this->execute("
CREATE TABLE `post` (
  `id` int NOT NULL,
  `views` int DEFAULT '0',
  `created_at` int DEFAULT NULL,
  `created_id` int DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  `updated_id` int DEFAULT NULL,
  `status` smallint DEFAULT '9',
  `image` varchar(255) DEFAULT NULL,
  `category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `post_category`
--

CREATE TABLE `post_category` (
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `post_category_lang`
--

CREATE TABLE `post_category_lang` (
  `id` int NOT NULL,
  `post_category_id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lang_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `post_lang`
--

CREATE TABLE `post_lang` (
  `id` int NOT NULL,
  `post_id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `descr` text,
  `lang_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int NOT NULL,
  `post_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `post_tag_lang`
--

CREATE TABLE `post_tag_lang` (
  `post_tag_id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lang_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post_category_lang`
--
ALTER TABLE `post_category_lang`
  ADD PRIMARY KEY (`id`,`lang_id`),
  ADD KEY `fk_post_category_lang_post_category1_idx` (`post_category_id`),
  ADD KEY `fk_post_category_lang_lang1_idx` (`lang_id`);

--
-- Индексы таблицы `post_lang`
--
ALTER TABLE `post_lang`
  ADD PRIMARY KEY (`id`,`lang_id`),
  ADD KEY `fk_post_lang_post1_idx` (`post_id`),
  ADD KEY `fk_post_lang_lang1_idx` (`lang_id`);

--
-- Индексы таблицы `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_tag_post1_idx` (`post_id`);

--
-- Индексы таблицы `post_tag_lang`
--
ALTER TABLE `post_tag_lang`
  ADD PRIMARY KEY (`lang_id`),
  ADD KEY `fk_post_tag_lang_post_tag1_idx` (`post_tag_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `post_category_lang`
--
ALTER TABLE `post_category_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `post_lang`
--
ALTER TABLE `post_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `post_category_lang`
--
ALTER TABLE `post_category_lang`
  ADD CONSTRAINT `fk_post_category_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`),
  ADD CONSTRAINT `fk_post_category_lang_post_category1` FOREIGN KEY (`post_category_id`) REFERENCES `post_category` (`id`);

--
-- Ограничения внешнего ключа таблицы `post_lang`
--
ALTER TABLE `post_lang`
  ADD CONSTRAINT `fk_post_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`),
  ADD CONSTRAINT `fk_post_lang_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);

--
-- Ограничения внешнего ключа таблицы `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `fk_post_tag_post1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);

--
-- Ограничения внешнего ключа таблицы `post_tag_lang`
--
ALTER TABLE `post_tag_lang`
  ADD CONSTRAINT `fk_post_tag_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`),
  ADD CONSTRAINT `fk_post_tag_lang_post_tag1` FOREIGN KEY (`post_tag_id`) REFERENCES `post_tag` (`id`);
COMMIT;
");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220405_011901_modify_post cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220405_011901_modify_post cannot be reverted.\n";

        return false;
    }
    */
}
