<?php

namespace backend\models\company;

use backend\models\product\Product;
use lav45\translate\TranslatedBehavior;
use lav45\translate\TranslatedTrait;
use Yii;

/**
 * This is the model class for table "companies_products".
 *
 * @property int $id
 * @property int $company_id
 * @property int $product_id
 * @property string|null $props
 * @property int|null $min_price
 *
 * @property CompaniesProductsItems[] $companiesProductsItems
 * @property CompaniesProductsLang[] $companiesProductsLangs
 * @property Company $company
 * @property Product $product
 */
class CompaniesProducts extends \yii\db\ActiveRecord
{
    use TranslatedTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companies_products';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TranslatedBehavior::className(),
                'translateRelation' => 'companiesProductsLangs', // Specify the name of the connection that will store transfers
                'languageAttribute' => 'lang_id', // post_lang field from the table that will store the target language
                'translateAttributes' => [
                    'partner_status',
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
            [['company_id', 'product_id'], 'required'],
            [['company_id', 'product_id', 'min_price'], 'integer'],
            [['partner_status'], 'string'],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
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
            'partner_status' => 'Статус партнера',
            'region.name' => 'Регион',
            'company_id' => 'Компания',
            'company.name' => 'Компания',
            'product_id' => 'Продукт',
            'product.name' => 'Продукт',
            'props' => 'Свойства',
            'min_price' => 'Мин цена',
            'price' => 'Цена',
        ];
    }

    public function getItems(){
        return $this->hasMany(CompaniesProductsItems::className(),['companies_products_id'=>'id']);
    }

    /**
     * Gets query for [[CompaniesProductsItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompaniesProductsItems()
    {
        return $this->hasMany(CompaniesProductsItems::className(), ['companies_products_id' => 'id']);
    }

    /**
     * Gets query for [[CompaniesProductsLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompaniesProductsLangs()
    {
        return $this->hasMany(CompaniesProductsLang::className(), ['companies_products_id' => 'id']);
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
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
