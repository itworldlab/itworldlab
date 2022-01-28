<?php

namespace backend\models\product;

use Yii;

/**
 * This is the model class for table "product_category_lang".
 *
 * @property int $product_category_id
 * @property string|null $name

 *
 * @property ProductCategory $productCategory
 */
class ProductCategoryLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_category_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_category_id'], 'required'],
            [['product_category_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['product_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategory::className(), 'targetAttribute' => ['product_category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_category_id' => 'Product Category ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[ProductCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategory()
    {
        return $this->hasOne(ProductCategory::className(), ['id' => 'product_category_id']);
    }
}
