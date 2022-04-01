<?php

namespace backend\models\product;

use lav45\translate\TranslatedBehavior;
use lav45\translate\TranslatedTrait;
use Yii;

/**
 * This is the model class for table "product_tarif".
 *
 * @property int $id
 * @property int $product_id
 * @property float|null $price
 * @property string|null $users_count
 * @property string|null $demo_link
 *
 * @property Product $product
 * @property ProductTarifItem[] $productTarifItems
 * @property ProductTarifLang[] $productTarifLangs
 */
class ProductTarif extends \yii\db\ActiveRecord
{
    use TranslatedTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_tarif';
    }

    public function behaviors(){
        return [
            [
                'class' => TranslatedBehavior::className(),
                'translateRelation' => 'productTarifLangs',
                'languageAttribute' => 'lang_id',
                'translateAttributes' => [
                    'name',
                    'descr',
                    'price_descr'
                ]
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id'], 'required'],
            [['product_id'], 'integer'],
            [['price'], 'number'],
            [['users_count'], 'string', 'max' => 100],
            [['demo_link'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'price' => 'Price',
            'users_count' => 'Users Count',
            'demo_link' => 'Demo Link',
        ];
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

    /**
     * Gets query for [[ProductTarifItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductTarifItems()
    {
        return $this->hasMany(ProductTarifItem::className(), ['product_tarifs_id' => 'id', 'product_tarifs_product_id' => 'product_id']);
    }

    /**
     * Gets query for [[ProductTarifLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductTarifLangs()
    {
        return $this->hasMany(ProductTarifLang::className(), ['product_tarif_id' => 'id']);
    }
}
