<?php

use yii\db\Migration;

/**
 * Class m220405_005317_create_main_tables
 */
class m220405_005317_create_main_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("CREATE TABLE `main_slides` (
  `id` int NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `sort` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `main_slides_lang`
--

CREATE TABLE `main_slides_lang` (
  `id` int NOT NULL,
  `main_slides_id` int NOT NULL,
  `lang_id` varchar(2) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `subtitle` varchar(100) DEFAULT NULL,
  `descr` varchar(255) DEFAULT NULL,
  `subdescr` varchar(255) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `main_tags`
--

CREATE TABLE `main_tags` (
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `main_tags_lang`
--

CREATE TABLE `main_tags_lang` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `main_tags_id` int NOT NULL,
  `lang_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `main_slides`
--
ALTER TABLE `main_slides`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `main_slides_lang`
--
ALTER TABLE `main_slides_lang`
  ADD PRIMARY KEY (`id`,`main_slides_id`,`lang_id`),
  ADD KEY `fk_main_slides_lang_main_slides1_idx` (`main_slides_id`),
  ADD KEY `fk_main_slides_lang_lang1_idx` (`lang_id`);

--
-- Индексы таблицы `main_tags`
--
ALTER TABLE `main_tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `main_tags_lang`
--
ALTER TABLE `main_tags_lang`
  ADD PRIMARY KEY (`id`,`main_tags_id`,`lang_id`),
  ADD KEY `fk_main_tags_lang_main_tags1_idx` (`main_tags_id`),
  ADD KEY `fk_main_tags_lang_lang1_idx` (`lang_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `main_slides`
--
ALTER TABLE `main_slides`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `main_slides_lang`
--
ALTER TABLE `main_slides_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `main_tags`
--
ALTER TABLE `main_tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `main_tags_lang`
--
ALTER TABLE `main_tags_lang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `main_slides_lang`
--
ALTER TABLE `main_slides_lang`
  ADD CONSTRAINT `fk_main_slides_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`),
  ADD CONSTRAINT `fk_main_slides_lang_main_slides1` FOREIGN KEY (`main_slides_id`) REFERENCES `main_slides` (`id`);

--
-- Ограничения внешнего ключа таблицы `main_tags_lang`
--
ALTER TABLE `main_tags_lang`
  ADD CONSTRAINT `fk_main_tags_lang_lang1` FOREIGN KEY (`lang_id`) REFERENCES `lang` (`id`),
  ADD CONSTRAINT `fk_main_tags_lang_main_tags1` FOREIGN KEY (`main_tags_id`) REFERENCES `main_tags` (`id`);
COMMIT;");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220405_005317_create_main_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220405_005317_create_main_tables cannot be reverted.\n";

        return false;
    }
    */
}
