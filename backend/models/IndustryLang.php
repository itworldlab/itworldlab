<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%industry_lang}}".
 *
 * @property int $industry_id
 * @property int $lang_id
 * @property string|null $name

 *
 * @property Industry $industry
 * @property Lang $lang
 */
class IndustryLang extends \yii\db\ActiveRecord
{
    public $test = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%industry_lang}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['industry_id', 'lang_id'], 'required'],
            [['industry_id', 'lang_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['industry_id', 'lang_id'], 'unique', 'targetAttribute' => ['industry_id', 'lang_id']],
            [['industry_id'], 'exist', 'skipOnError' => true, 'targetClass' => Industry::className(), 'targetAttribute' => ['industry_id' => 'id']],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'industry_id' => Yii::t('app', 'Industry ID'),
            'lang_id' => Yii::t('app', 'Lang ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * Gets query for [[Industry]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndustry()
    {
        return $this->hasOne(Industry::className(), ['id' => 'industry_id']);
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
