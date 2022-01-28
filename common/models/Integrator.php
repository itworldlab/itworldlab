<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%integrator}}".
 *
 * @property int $id
 * @property string|null $name Название компании интегратора
 * @property int|null $projects_count Кол-во готовых проектов
 * @property int|null $average_rate Средняя оценка
 * @property int|null $open_date Дата открытия компании
 * @property string|null $short_descr
 * @property string|null $descr Описание
 * @property string|null $addr Адрес офиса
 * @property int|null $created_at Дата регистрации
 * @property int|null $created_id Зарегистрировал
 * @property int|null $updated_at Дата обновления
 * @property int|null $updated_id Обновил
 * @property int|null $blocked_at Дата блокировки
 * @property int|null $blocked_id Заблокировал
 * @property int|null $last_activity Последняя активность
 * @property string|null $logo_image Лого|img_crop

 *
 * @property IntegratorsProducts[] $integratorsProducts
 * @property Product[] $products
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
            [['id'], 'required'],
            [['id', 'projects_count', 'average_rate', 'open_date', 'created_at', 'created_id', 'updated_at', 'updated_id', 'blocked_at', 'blocked_id', 'last_activity'], 'integer'],
            [['descr'], 'string'],
            [['name'], 'string', 'max' => 45],
            [['short_descr', 'addr', 'logo_image'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Название компании интегратора'),
            'projects_count' => Yii::t('app', 'Кол-во готовых проектов'),
            'average_rate' => Yii::t('app', 'Средняя оценка'),
            'open_date' => Yii::t('app', 'Дата открытия компании'),
            'short_descr' => Yii::t('app', 'Short Descr'),
            'descr' => Yii::t('app', 'Описание'),
            'addr' => Yii::t('app', 'Адрес офиса'),
            'created_at' => Yii::t('app', 'Дата регистрации'),
            'created_id' => Yii::t('app', 'Зарегистрировал'),
            'updated_at' => Yii::t('app', 'Дата обновления'),
            'updated_id' => Yii::t('app', 'Обновил'),
            'blocked_at' => Yii::t('app', 'Дата блокировки'),
            'blocked_id' => Yii::t('app', 'Заблокировал'),
            'last_activity' => Yii::t('app', 'Последняя активность'),
            'logo_image' => Yii::t('app', 'Лого|img_crop'),
        ];
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
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])->viaTable('{{%integrators_products}}', ['integrator_id' => 'id']);
    }
}
