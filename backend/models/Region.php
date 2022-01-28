<?php

namespace backend\models;

use lav45\translate\TranslatedBehavior;
use lav45\translate\TranslatedTrait;
use Yii;

/**
 * This is the model class for table "region".
 *
 * @property int $id
 * @property int|null $parent_id
 * @property int|null $parent_lvl

 *
 * @property Integrator[] $integrators
 * @property Product[] $products
 * @property ProductsRegions[] $productsRegions
 * @property RegionLang[] $regionLangs
 */
class Region extends \yii\db\ActiveRecord
{
    use TranslatedTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region';
    }



    public function behaviors()
    {
        return [
            [
                'class' => TranslatedBehavior::className(),
                'translateRelation' => 'regionLangs', // Specify the name of the connection that will store transfers
                'languageAttribute' => 'lang_id', // post_lang field from the table that will store the target language
                'translateAttributes' => [
                    'name',
                    'code'
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
            [['parent_id', 'parent_lvl'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'parent_lvl' => 'Parent Lvl',
        ];
    }

    /**
     * Gets query for [[Integrators]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIntegrators()
    {
        return $this->hasMany(Integrator::className(), ['region_id' => 'id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])->viaTable('products_regions', ['region_id' => 'id']);
    }

    /**
     * Gets query for [[ProductsRegions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsRegions()
    {
        return $this->hasMany(ProductsRegions::className(), ['region_id' => 'id']);
    }

    /**
     * Gets query for [[RegionLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegionLangs()
    {
        return $this->hasMany(RegionLang::className(), ['region_id' => 'id']);
    }
}
