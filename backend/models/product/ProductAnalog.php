<?php

namespace backend\models\product;

use Yii;

/**
 * This is the model class for table "product_analogs".
 *
 * @property int|null $product_id
 * @property int|null $analog_product_id
 *
 * @property Product $analogProduct
 * @property Product $product
 */
class ProductAnalog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_analogs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'analog_product_id'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['analog_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['analog_product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'analog_product_id' => 'Analog Product ID',
        ];
    }

    /**
     * Gets query for [[AnalogProduct]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnalogProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'analog_product_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
