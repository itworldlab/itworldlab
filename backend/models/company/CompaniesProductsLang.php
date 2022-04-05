<?php

namespace backend\models\company;

use Yii;

/**
 * This is the model class for table "companies_products_lang".
 *
 * @property int $id
 * @property int $companies_products_id
 * @property string $lang_id
 * @property string|null $partner_status
 *
 * @property CompaniesProducts $companiesProducts
 * @property Lang $lang
 */
class CompaniesProductsLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companies_products_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['companies_products_id', 'lang_id'], 'required'],
            [['companies_products_id'], 'integer'],
            [['lang_id'], 'string', 'max' => 2],
            [['partner_status'], 'string', 'max' => 45],
            [['companies_products_id'], 'exist', 'skipOnError' => true, 'targetClass' => CompaniesProducts::className(), 'targetAttribute' => ['companies_products_id' => 'id']],
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
            'companies_products_id' => 'Companies Products ID',
            'lang_id' => 'Lang ID',
            'partner_status' => 'Partner Status',
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
     * Gets query for [[Lang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Lang::className(), ['id' => 'lang_id']);
    }
}
