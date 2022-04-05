<?php

namespace backend\models\company;

use lav45\translate\TranslatedBehavior;
use lav45\translate\TranslatedTrait;
use Yii;

/**
 * This is the model class for table "companies_products_items".
 *
 * @property int $id
 * @property int $companies_products_id
 * @property float|null $price
 *
 * @property CompaniesProducts $companiesProducts
 * @property CompaniesProductsItemsLang[] $companiesProductsItemsLangs
 */
class CompaniesProductsItems extends \yii\db\ActiveRecord
{
    use TranslatedTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companies_products_items';
    }
    public function behaviors()
    {
        return [
            [
                'class' => TranslatedBehavior::className(),
                'translateRelation' => 'companiesProductsItemsLangs', // Specify the name of the connection that will store transfers
                'languageAttribute' => 'lang_id', // post_lang field from the table that will store the target language
                'translateAttributes' => [
                    'name',
                    'descr',
                    'link',
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
            [['companies_products_id'], 'required'],
            [['companies_products_id'], 'integer'],
            [['price'], 'number'],
            [['name','descr','link'],'string'],
            [['companies_products_id'], 'exist', 'skipOnError' => true, 'targetClass' => CompaniesProducts::className(), 'targetAttribute' => ['companies_products_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'companies_products_id' => 'Companies Products ID',
            'price' => 'Цена',
            'name' => 'Название',
            'descr' => 'Описание',
            'link' => 'Ссылка',
        ];
    }

    /**
     * Gets query for [[CompaniesProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompaniesProducts()
    {
        return $this->hasOne(CompaniesProducts::className(), ['id' => 'companies_products_id']);
    }

    /**
     * Gets query for [[CompaniesProductsItemsLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompaniesProductsItemsLangs()
    {
        return $this->hasMany(CompaniesProductsItemsLang::className(), ['companies_products_items_id' => 'id']);
    }
}
