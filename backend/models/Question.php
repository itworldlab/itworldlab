<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%question}}".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $step

 *
 * @property PropsQuestions[] $propsQuestions
 */
class Question extends \yii\db\ActiveRecord
{
    public $test = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%question}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'step'], 'integer'],
            [['name'], 'string', 'max' => 45],
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
            'name' => Yii::t('app', 'Name'),
            'step' => Yii::t('app', 'Step'),
        ];
    }

    /**
     * Gets query for [[PropsQuestions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPropsQuestions()
    {
        return $this->hasMany(PropsQuestions::className(), ['question_id' => 'id']);
    }
}
