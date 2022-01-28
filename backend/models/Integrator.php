<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%integrator}}".
 *
 * @property int $id
 * @property int|null $projects_count Кол-во готовых проектов
 * @property int|null $average_rate Средняя оценка
 * @property int|null $open_date Дата открытия компании
 * @property int|null $created_at Дата регистрации
 * @property int|null $created_id Зарегистрировал
 * @property int|null $updated_at Дата обновления
 * @property int|null $updated_id Обновил
 * @property int|null $blocked_at Дата блокировки
 * @property int|null $blocked_id Заблокировал
 * @property int|null $last_activity Последняя активность
 * @property string|null $logo_image Лого|img_crop
 * @property int $country_id
 * @property int $admin_id

 *
 * @property Admin $admin
 * @property Country $country
 * @property IntegratorLang[] $integratorLangs
 * @property IntegratorsProducts[] $integratorsProducts
 * @property Lang[] $langs
 * @property Product[] $products
 * @property Product[] $products0
 * @property ProductsCountries[] $productsCountries
 */
class Integrator extends \yii\db\ActiveRecord
{
    public $test = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%integrator}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'country_id', 'admin_id'], 'required'],
            [['id', 'projects_count', 'average_rate', 'open_date', 'created_at', 'created_id', 'updated_at', 'updated_id', 'blocked_at', 'blocked_id', 'last_activity', 'country_id', 'admin_id'], 'integer'],
            [['logo_image'], 'string', 'max' => 255],
            [['id', 'country_id', 'admin_id'], 'unique', 'targetAttribute' => ['id', 'country_id', 'admin_id']],
            [['admin_id'], 'exist', 'skipOnError' => true, 'targetClass' => Admin::className(), 'targetAttribute' => ['admin_id' => 'id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'projects_count' => Yii::t('app', 'Кол-во готовых проектов'),
            'average_rate' => Yii::t('app', 'Средняя оценка'),
            'open_date' => Yii::t('app', 'Дата открытия компании'),
            'created_at' => Yii::t('app', 'Дата регистрации'),
            'created_id' => Yii::t('app', 'Зарегистрировал'),
            'updated_at' => Yii::t('app', 'Дата обновления'),
            'updated_id' => Yii::t('app', 'Обновил'),
            'blocked_at' => Yii::t('app', 'Дата блокировки'),
            'blocked_id' => Yii::t('app', 'Заблокировал'),
            'last_activity' => Yii::t('app', 'Последняя активность'),
            'logo_image' => Yii::t('app', 'Лого|img_crop'),
            'country_id' => Yii::t('app', 'Country ID'),
            'admin_id' => Yii::t('app', 'Admin ID'),
        ];
    }

    /**
     * Gets query for [[Admin]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(Admin::className(), ['id' => 'admin_id']);
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /**
     * Gets query for [[IntegratorLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIntegratorLangs()
    {
        return $this->hasMany(IntegratorLang::className(), ['integrator_id' => 'id']);
    }

    /**
     * Gets query for [[IntegratorsProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIntegratorsProducts()
    {
        return $this->hasMany(IntegratorsProducts::className(), ['integrator_id' => 'id']);
    }

    /**
     * Gets query for [[Langs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLangs()
    {
        return $this->hasMany(Lang::className(), ['id' => 'lang_id'])->viaTable('{{%integrator_lang}}', ['integrator_id' => 'id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])->viaTable('{{%integrators_products}}', ['integrator_id' => 'id']);
    }

    /**
     * Gets query for [[Products0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts0()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])->viaTable('{{%products_countries}}', ['integrator_id' => 'id', 'integrator_country_id' => 'country_id']);
    }

    /**
     * Gets query for [[ProductsCountries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsCountries()
    {
        return $this->hasMany(ProductsCountries::className(), ['integrator_id' => 'id', 'integrator_country_id' => 'country_id']);
    }
}
