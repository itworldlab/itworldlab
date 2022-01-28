<?php

namespace backend\models\product;

use Yii;
use backend\models\Lang;

/**
 * This is the model class for table "prop_type_lang".
 *
 * @property int $prop_type_id
 * @property string $name
 * @property string $lang_id

 *
 * @property Lang $lang
 * @property PropType $propType
 */
class PropTypeLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prop_type_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prop_type_id', 'name', 'lang_id'], 'required'],
            [['prop_type_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['lang_id'], 'string', 'max' => 2],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['prop_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PropType::className(), 'targetAttribute' => ['prop_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'prop_type_id' => 'Prop Type ID',
            'name' => 'Name',
            'lang_id' => 'Lang ID',
        ];
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

    /**
     * Gets query for [[PropType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPropType()
    {
        return $this->hasOne(PropType::className(), ['id' => 'prop_type_id']);
    }
}
