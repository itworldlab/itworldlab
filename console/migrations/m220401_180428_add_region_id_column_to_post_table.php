<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%post}}`.
 */
class m220401_180428_add_region_id_column_to_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("post","region_id",$this->integer());
        $this->addForeignKey(
            'postFK',  // это "условное имя" ключа
            'post', // это название текущей таблицы
            'region_id', // это имя поля в текущей таблице, которое будет ключом
            'region', // это имя таблицы, с которой хотим связаться
            'id', // это поле таблицы, с которым хотим связаться
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
