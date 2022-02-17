<?php

namespace backend\models\product;

use lav45\translate\TranslatedBehavior;
use lav45\translate\TranslatedTrait;
use Yii;

/**
 * This is the model class for table "prop_type".
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property int $category_id

 *
 * @property PropTypeLang[] $propTypeLangs
 * @property Prop[] $props
 */
class PropType extends \yii\db\ActiveRecord
{
    use TranslatedTrait;
    const STATUS_ACTIVE = 10;
    const STATUS_DISABLED = 9;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prop_type';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TranslatedBehavior::className(),
                'translateRelation' => 'propTypeLangs', // Specify the name of the connection that will store transfers
                'languageAttribute' => 'lang_id', // post_lang field from the table that will store the target language
                'translateAttributes' => [
                    'name',
                ]
            ]
        ];
    }

    public static function GetAll(){
        return PropType::find()->all();
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','type'], 'string', 'max' => 255],
            [['lang_id'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
        ];
    }

    /**
     * Gets query for [[PropTypeLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPropTypeLangs()
    {
        return $this->hasMany(PropTypeLang::className(), ['prop_type_id' => 'id']);
    }

    /**
     * Gets query for [[Props]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProps()
    {
        return $this->hasMany(Prop::className(), ['prop_type_id' => 'id']);
    }
}
