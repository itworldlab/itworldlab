<?php

namespace backend\models\product;

use Yii;

/**
 * This is the model class for table "product_tarif_items".
 *
 * @property int $id
 * @property int $product_tarifs_id
 * @property int $product_tarifs_product_id
 * @property string|null $name
 *
 * @property ProductTarif $productTarifs
 */
class ProductTarifItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_tarif_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_tarifs_id', 'product_tarifs_product_id'], 'required'],
            [['product_tarifs_id', 'product_tarifs_product_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['product_tarifs_id', 'product_tarifs_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductTarif::className(), 'targetAttribute' => ['product_tarifs_id' => 'id', 'product_tarifs_product_id' => 'product_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_tarifs_id' => 'Product Tarifs ID',
            'product_tarifs_product_id' => 'Product Tarifs Product ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[ProductTarifs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductTarifs()
    {
        return $this->hasOne(ProductTarif::className(), ['id' => 'product_tarifs_id', 'product_id' => 'product_tarifs_product_id']);
    }
}
