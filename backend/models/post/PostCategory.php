<?php

namespace backend\models\post;

use lav45\translate\TranslatedBehavior;
use lav45\translate\TranslatedTrait;
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
    use TranslatedTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post_category';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TranslatedBehavior::className(),
                'translateRelation' => 'postCategoryLangs', // Specify the name of the connection that will store transfers
                'languageAttribute' => 'lang_id', // post_lang field from the table that will store the target language
                'translateAttributes' => [
                    'name',
                ]
            ]
        ];
    }

    public static function GetAll(){
        return PostCategory::find()->all();
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name','string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
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
