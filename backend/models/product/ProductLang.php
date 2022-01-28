<?php

namespace backend\models\product;

use Yii;

/**
 * This is the model class for table "product_lang".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $short_descr
 * @property string|null $descr
 * @property int $product_id
 * @property string $lang_id

 *
 * @property Lang $lang
 * @property Product $product
 */
class ProductLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descr'], 'string'],
            [['product_id', 'lang_id'], 'required'],
            [['product_id'], 'integer'],
            [['name', 'short_descr'], 'string', 'max' => 255],
            [['lang_id'], 'string', 'max' => 2],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang_id' => 'id']],
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
            'name' => 'Name',
            'short_descr' => 'Short Descr',
            'descr' => 'Descr',
            'product_id' => 'Product ID',
            'lang_id' => 'Lang ID',
        ];
    }

    /**
     * Gets query for [[Lang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Lang::className(), ['id' => 'lang_id']);
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
