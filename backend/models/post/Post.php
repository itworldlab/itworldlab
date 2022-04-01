<?php

namespace backend\models\post;

use backend\models\Region;
use lav45\translate\TranslatedBehavior;
use lav45\translate\TranslatedTrait;
use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property int|null $views
 * @property int|null $created_at
 * @property int|null $created_id
 * @property int|null $updated_at
 * @property int|null $updated_id
 * @property int|null $status
 * @property string|null $image
 * @property int $post_category_id
 * @property int|null $region_id
 *
 * @property PostCategory $postCategory
 * @property PostLang[] $postLangs
 * @property PostTag[] $postTags
 * @property Region $region
 */
class Post extends \yii\db\ActiveRecord
{
    use TranslatedTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TranslatedBehavior::className(),
                'translateRelation' => 'postLangs', // Specify the name of the connection that will store transfers
                'languageAttribute' => 'lang_id', // post_lang field from the table that will store the target language
                'translateAttributes' => [
                    'title',
                    'descr',
                ]
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['views', 'created_at', 'created_id', 'updated_at', 'updated_id', 'status', 'post_category_id', 'region_id'], 'integer'],
            [['post_category_id'], 'required'],
            [['image'], 'string', 'max' => 255],
            [['post_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => PostCategory::className(), 'targetAttribute' => ['post_category_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'views' => 'Views',
            'created_at' => 'Created At',
            'created_id' => 'Created ID',
            'updated_at' => 'Updated At',
            'updated_id' => 'Updated ID',
            'status' => 'Status',
            'image' => 'Image',
            'post_category_id' => 'Post Category ID',
            'region_id' => 'Region ID',
        ];
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

    /**
     * Gets query for [[PostLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPostLangs()
    {
        return $this->hasMany(PostLang::className(), ['post_id' => 'id']);
    }

    /**
     * Gets query for [[PostTags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPostTags()
    {
        return $this->hasMany(PostTag::className(), ['post_id' => 'id']);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }
}
