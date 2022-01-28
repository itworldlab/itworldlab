<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%props_questions}}".
 *
 * @property int $question_id
 * @property int $product_id
 * @property int $prop_id
 * @property int|null $step

 *
 * @property Product $product
 * @property Prop $prop
 * @property Question $question
 */
class PropsQuestions extends \yii\db\ActiveRecord
{
    public $test = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%props_questions}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question_id', 'product_id', 'prop_id'], 'required'],
            [['question_id', 'product_id', 'prop_id', 'step'], 'integer'],
            [['question_id', 'product_id', 'prop_id'], 'unique', 'targetAttribute' => ['question_id', 'product_id', 'prop_id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['prop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Prop::className(), 'targetAttribute' => ['prop_id' => 'id']],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => Question::className(), 'targetAttribute' => ['question_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'question_id' => Yii::t('app', 'Question ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'prop_id' => Yii::t('app', 'Prop ID'),
            'step' => Yii::t('app', 'Step'),
        ];
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

    /**
     * Gets query for [[Prop]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProp()
    {
        return $this->hasOne(Prop::className(), ['id' => 'prop_id']);
    }

    /**
     * Gets query for [[Question]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['id' => 'question_id']);
    }
}
