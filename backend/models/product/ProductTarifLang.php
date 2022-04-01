<?php

namespace backend\models\product;

use Yii;

/**
 * This is the model class for table "product_tarif_lang".
 *
 * @property int $id
 * @property int $product_tarif_id
 * @property int $lang_id
 * @property string|null $name
 * @property string|null $descr
 * @property string|null $price_descr
 *
 * @property ProductTarif $productTarif
 */
class ProductTarifLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_tarif_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_tarif_id', 'lang_id'], 'required'],
            [['product_tarif_id', 'lang_id'], 'integer'],
            [['name', 'price_descr'], 'string', 'max' => 100],
            [['descr'], 'string', 'max' => 255],
            [['product_tarif_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductTarif::className(), 'targetAttribute' => ['product_tarif_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_tarif_id' => 'Product Tarif ID',
            'lang_id' => 'Lang ID',
            'name' => 'Name',
            'descr' => 'Descr',
            'price_descr' => 'Price Descr',
        ];
    }

    /**
     * Gets query for [[ProductTarif]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductTarif()
    {
        return $this->hasOne(ProductTarif::className(), ['id' => 'product_tarif_id']);
    }
}
