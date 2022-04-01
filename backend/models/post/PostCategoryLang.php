<?php

namespace backend\models\post;

use backend\models\Lang;
use Yii;

/**
 * This is the model class for table "post_category_lang".
 *
 * @property int $id
 * @property int $post_category_id
 * @property string $lang_id
 * @property string|null $name
 *
 * @property Lang $lang
 * @property PostCategory $postCategory
 */
class PostCategoryLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post_category_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_category_id', 'lang_id'], 'required'],
            [['post_category_id'], 'integer'],
            [['lang_id'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 255],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['post_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => PostCategory::className(), 'targetAttribute' => ['post_category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_category_id' => 'Post Category ID',
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
     * Gets query for [[PostCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPostCategory()
    {
        return $this->hasOne(PostCategory::className(), ['id' => 'post_category_id']);
    }
}
