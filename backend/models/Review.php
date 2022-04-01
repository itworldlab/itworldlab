<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%review}}".
 *
 * @property int $id
 * @property int|null $created_at
 * @property string|null $title
 * @property string|null $plus
 * @property string|null $minus
 * @property string|null $total
 * @property float|null $rate_average
 * @property float|null $rate_boon
 * @property float|null $rate_func
 * @property float|null $rate_support
 * @property float|null $rate_price
 * @property int $product_id
 * @property int $user_id
 * @property int|null $status

 *
 * @property User $user
 */
class Review extends \yii\db\ActiveRecord
{
    public $test = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%review}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'product_id', 'user_id', 'status'], 'integer'],
            [['rate_average', 'rate_boon', 'rate_func', 'rate_support', 'rate_price'], 'number'],
            [['product_id', 'user_id'], 'required'],
            [['title'], 'string', 'max' => 100],
            [['plus', 'minus', 'total'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'title' => Yii::t('app', 'Title'),
            'plus' => Yii::t('app', 'Plus'),
            'minus' => Yii::t('app', 'Minus'),
            'total' => Yii::t('app', 'Total'),
            'rate_average' => Yii::t('app', 'Rate Average'),
            'rate_boon' => Yii::t('app', 'Rate Boon'),
            'rate_func' => Yii::t('app', 'Rate Func'),
            'rate_support' => Yii::t('app', 'Rate Support'),
            'rate_price' => Yii::t('app', 'Rate Price'),
            'product_id' => Yii::t('app', 'Product ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
