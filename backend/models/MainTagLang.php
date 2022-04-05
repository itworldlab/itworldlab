<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "main_tags_lang".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $link
 * @property int $main_tags_id
 * @property string $lang_id
 *
 * @property Lang $lang
 * @property MainTags $mainTags
 */
class MainTagLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'main_tags_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['main_tags_id', 'lang_id'], 'required'],
            [['main_tags_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['link'], 'string', 'max' => 100],
            [['lang_id'], 'string', 'max' => 2],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['main_tags_id'], 'exist', 'skipOnError' => true, 'targetClass' => MainTags::className(), 'targetAttribute' => ['main_tags_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'link' => 'Link',
            'main_tags_id' => 'Main Tags ID',
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
     * Gets query for [[MainTags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMainTags()
    {
        return $this->hasOne(MainTags::className(), ['id' => 'main_tags_id']);
    }
}
