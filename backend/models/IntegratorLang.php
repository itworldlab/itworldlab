<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%integrator_lang}}".
 *
 * @property int $integrator_id
 * @property int $lang_id
 * @property string|null $name
 * @property string|null $short_descr
 * @property string|null $descr
 * @property string|null $addr

 *
 * @property Integrator $integrator
 * @property Lang $lang
 */
class IntegratorLang extends \yii\db\ActiveRecord
{
    public $test = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%integrator_lang}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['integrator_id', 'lang_id'], 'required'],
            [['integrator_id', 'lang_id'], 'integer'],
            [['descr'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['short_descr', 'addr'], 'string', 'max' => 255],
            [['integrator_id', 'lang_id'], 'unique', 'targetAttribute' => ['integrator_id', 'lang_id']],
            [['integrator_id'], 'exist', 'skipOnError' => true, 'targetClass' => Integrator::className(), 'targetAttribute' => ['integrator_id' => 'id']],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'integrator_id' => Yii::t('app', 'Integrator ID'),
            'lang_id' => Yii::t('app', 'Lang ID'),
            'name' => Yii::t('app', 'Name'),
            'short_descr' => Yii::t('app', 'Short Descr'),
            'descr' => Yii::t('app', 'Descr'),
            'addr' => Yii::t('app', 'Addr'),
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
     * Gets query for [[Lang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Lang::className(), ['id' => 'lang_id']);
    }
}
