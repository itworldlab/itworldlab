<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%lang}}".
 *
 * @property int $id
 * @property string|null $locale
 * @property string|null $name
 * @property int|null $status

 *
 * @property Country[] $countries
 * @property CountryLang[] $countryLangs
 * @property Industry[] $industries
 * @property IndustryLang[] $industryLangs
 * @property IntegratorLang[] $integratorLangs
 * @property Integrator[] $integrators
 * @property ProductLang[] $productLangs
 * @property ProductTarifLang[] $productTarifLangs
 * @property ProductTarif[] $productTarifs
 * @property Product[] $products
 * @property PropLang[] $propLangs
 * @property Prop[] $props
 */
class Lang extends \yii\db\ActiveRecord
{
    public $test = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%lang}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['locale'], 'string', 'max' => 8],
            [['name'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'locale' => Yii::t('app', 'Locale'),
            'name' => Yii::t('app', 'Name'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * Gets query for [[Countries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountries()
    {
        return $this->hasMany(Country::className(), ['id' => 'country_id'])->viaTable('{{%country_lang}}', ['lang_id' => 'id']);
    }

    /**
     * Gets query for [[CountryLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountryLangs()
    {
        return $this->hasMany(CountryLang::className(), ['lang_id' => 'id']);
    }

    /**
     * Gets query for [[Industries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndustries()
    {
        return $this->hasMany(Industry::className(), ['id' => 'industry_id'])->viaTable('{{%industry_lang}}', ['lang_id' => 'id']);
    }

    /**
     * Gets query for [[IndustryLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndustryLangs()
    {
        return $this->hasMany(IndustryLang::className(), ['lang_id' => 'id']);
    }

    /**
     * Gets query for [[IntegratorLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIntegratorLangs()
    {
        return $this->hasMany(IntegratorLang::className(), ['lang_id' => 'id']);
    }

    /**
     * Gets query for [[Integrators]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIntegrators()
    {
        return $this->hasMany(Integrator::className(), ['id' => 'integrator_id'])->viaTable('{{%integrator_lang}}', ['lang_id' => 'id']);
    }

    /**
     * Gets query for [[ProductLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductLangs()
    {
        return $this->hasMany(ProductLang::className(), ['lang_id' => 'id']);
    }

    /**
     * Gets query for [[ProductTarifLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductTarifLangs()
    {
        return $this->hasMany(ProductTarifLang::className(), ['lang_id' => 'id']);
    }

    /**
     * Gets query for [[ProductTarifs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductTarifs()
    {
        return $this->hasMany(ProductTarif::className(), ['id' => 'product_tarif_id'])->viaTable('{{%product_tarif_lang}}', ['lang_id' => 'id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id', 'admin_id' => 'product_admin_id'])->viaTable('{{%product_lang}}', ['lang_id' => 'id']);
    }

    /**
     * Gets query for [[PropLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPropLangs()
    {
        return $this->hasMany(PropLang::className(), ['lang_id' => 'id']);
    }

    /**
     * Gets query for [[Props]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProps()
    {
        return $this->hasMany(Prop::className(), ['id' => 'prop_id'])->viaTable('{{%prop_lang}}', ['lang_id' => 'id']);
    }
}
