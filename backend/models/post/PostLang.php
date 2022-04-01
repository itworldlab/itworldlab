<?php

namespace backend\models\post;

use backend\models\Lang;
use Yii;

/**
 * This is the model class for table "post_lang".
 *
 * @property int $id
 * @property int $post_id
 * @property string $lang_id
 * @property string|null $title
 * @property string|null $descr
 *
 * @property Lang $lang
 * @property Post $post
 */
class PostLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_id', 'lang_id'], 'required'],
            [['post_id'], 'integer'],
            [['descr'], 'string'],
            [['lang_id'], 'string', 'max' => 2],
            [['title'], 'string', 'max' => 255],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_id' => 'Post ID',
            'lang_id' => 'Lang ID',
            'title' => 'Title',
            'descr' => 'Descr',
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
     * Gets query for [[Post]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }
}
