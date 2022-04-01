<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_analogs}}`.
 */
class m220401_171739_create_product_analogs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_analogs}}', [
            'product_id' => $this->integer(),
            'analog_product_id' => $this->integer(),

        ]);

        $this->addForeignKey(
            'productAnalogsFK',  // это "условное имя" ключа
            'product_analogs', // это название текущей таблицы
            'product_id', // это имя поля в текущей таблице, которое будет ключом
            'product', // это имя таблицы, с которой хотим связаться
            'id', // это поле таблицы, с которым хотим связаться
            'CASCADE'
        );

        $this->addForeignKey(
            'productAnalogsFK2',  // это "условное имя" ключа
            'product_analogs', // это название текущей таблицы
            'analog_product_id', // это имя поля в текущей таблице, которое будет ключом
            'product', // это имя таблицы, с которой хотим связаться
            'id', // это поле таблицы, с которым хотим связаться
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_analogs}}');
    }
}
