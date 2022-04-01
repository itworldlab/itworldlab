<?php

namespace backend\models\post;

use Yii;

/**
 * This is the model class for table "post_category".
 *
 * @property int $id
 *
 * @property PostCategoryLang[] $postCategoryLangs
 * @property Post[] $posts
 */
class PostCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [];
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
     * Gets query for [[PostCategoryLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPostCategoryLangs()
    {
        return $this->hasMany(PostCategoryLang::className(), ['post_category_id' => 'id']);
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['post_category_id' => 'id']);
    }
}
