<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%integrators_products}}".
 *
 * @property int $integrator_id
 * @property int $product_id
 * @property string|null $props
 * @property int|null $min_price

 *
 * @property Integrator $integrator
 * @property Product $product
 */
class IntegratorsProducts extends \yii\db\ActiveRecord
{
    public $test = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%integrators_products}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['integrator_id', 'product_id'], 'required'],
            [['integrator_id', 'product_id', 'min_price'], 'integer'],
            [['props'], 'string'],
            [['integrator_id', 'product_id'], 'unique', 'targetAttribute' => ['integrator_id', 'product_id']],
            [['integrator_id'], 'exist', 'skipOnError' => true, 'targetClass' => Integrator::className(), 'targetAttribute' => ['integrator_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'integrator_id' => Yii::t('app', 'Integrator ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'props' => Yii::t('app', 'Props'),
            'min_price' => Yii::t('app', 'Min Price'),
        ];
    }

    /**
     * Gets query for [[Integrator]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIntegrator()
    {
        return $this->hasOne(Integrator::className(), ['id' => 'integrator_id']);
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
