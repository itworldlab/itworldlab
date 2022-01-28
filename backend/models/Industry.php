<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%industry}}".
 *
 * @property int $id

 *
 * @property IndustryLang[] $industryLangs
 * @property Lang[] $langs
 * @property Product[] $products
 * @property ProductsIndustries[] $productsIndustries
 */
class Industry extends \yii\db\ActiveRecord
{
    public $test = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%industry}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
        ];
    }

    /**
     * Gets query for [[IndustryLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndustryLangs()
    {
        return $this->hasMany(IndustryLang::className(), ['industry_id' => 'id']);
    }

    /**
     * Gets query for [[Langs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLangs()
    {
        return $this->hasMany(Lang::className(), ['id' => 'lang_id'])->viaTable('{{%industry_lang}}', ['industry_id' => 'id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])->viaTable('{{%products_industries}}', ['industry_id' => 'id']);
    }

    /**
     * Gets query for [[ProductsIndustries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsIndustries()
    {
        return $this->hasMany(ProductsIndustries::className(), ['industry_id' => 'id']);
    }
}
