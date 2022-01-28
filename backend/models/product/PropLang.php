<?php

namespace backend\models\product;

use backend\models\Lang;
use Yii;

/**
 * This is the model class for table "prop_lang".
 *
 * @property int $id
 * @property int $prop_id
 * @property int $lang_id
 * @property string|null $name

 *
 * @property Prop $prop
 */
class PropLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prop_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prop_id', 'lang_id'], 'required'],
            [['prop_id', 'lang_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['prop_id'], 'exist', 'skipOnError' => false, 'targetClass' => Prop::className(), 'targetAttribute' => ['prop_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prop_id' => 'Prop ID',
            'lang_id' => 'Lang ID',
            'name' => 'Name',
        ];
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
     * Gets query for [[Lang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Lang::className(), ['id' => 'lang_id']);
    }
}
