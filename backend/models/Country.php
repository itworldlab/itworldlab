<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%country}}".
 *
 * @property int $id
 * @property string|null $code

 *
 * @property CountryLang[] $countryLangs
 * @property Integrator[] $integrators
 * @property Lang[] $langs
 */
class Country extends \yii\db\ActiveRecord
{
    public $test = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%country}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
        ];
    }

    /**
     * Gets query for [[CountryLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountryLangs()
    {
        return $this->hasMany(CountryLang::className(), ['country_id' => 'id']);
    }

    /**
     * Gets query for [[Integrators]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIntegrators()
    {
        return $this->hasMany(Integrator::className(), ['country_id' => 'id']);
    }

    /**
     * Gets query for [[Langs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLangs()
    {
        return $this->hasMany(Lang::className(), ['id' => 'lang_id'])->viaTable('{{%country_lang}}', ['country_id' => 'id']);
    }
}
