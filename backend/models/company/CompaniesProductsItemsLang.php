<?php

namespace backend\models\company;

use lav45\translate\models\Lang;
use Yii;

/**
 * This is the model class for table "companies_products_items_lang".
 *
 * @property int $id
 * @property int $companies_products_items_id
 * @property string $lang_id
 * @property string|null $name
 * @property string|null $descr
 * @property string|null $link
 *
 * @property CompaniesProductsItems $companiesProductsItems
 * @property Lang $lang
 */
class CompaniesProductsItemsLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companies_products_items_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['companies_products_items_id', 'lang_id'], 'required'],
            [['companies_products_items_id'], 'integer'],
            [['lang_id'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 100],
            [['descr', 'link'], 'string', 'max' => 255],
            [['companies_products_items_id'], 'exist', 'skipOnError' => true, 'targetClass' => CompaniesProductsItems::className(), 'targetAttribute' => ['companies_products_items_id' => 'id']],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'companies_products_items_id' => 'Companies Products Items ID',
            'lang_id' => 'Lang ID',
            'name' => 'Name',
            'descr' => 'Descr',
            'link' => 'Link',
        ];
    }

    /**
     * Gets query for [[CompaniesProductsItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompaniesProductsItems()
    {
        return $this->hasOne(CompaniesProductsItems::className(), ['id' => 'companies_products_items_id']);
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
}
