<?php

namespace backend\models\post;

use backend\models\Lang;
use Yii;

/**
 * This is the model class for table "post_tag_lang".
 *
 * @property int $post_tag_id
 * @property string $lang_id
 * @property string|null $name
 *
 * @property Lang $lang
 * @property PostTag $postTag
 */
class PostTagLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post_tag_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_tag_id', 'lang_id'], 'required'],
            [['post_tag_id'], 'integer'],
            [['lang_id'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 255],
            [['lang_id'], 'unique'],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['post_tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => PostTag::className(), 'targetAttribute' => ['post_tag_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'post_tag_id' => 'Post Tag ID',
            'lang_id' => 'Lang ID',
            'name' => 'Name',
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
     * Gets query for [[PostTag]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPostTag()
    {
        return $this->hasOne(PostTag::className(), ['id' => 'post_tag_id']);
    }
}
