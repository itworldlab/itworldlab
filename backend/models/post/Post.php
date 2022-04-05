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
 * @property int $category_id
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
    public $imageFile;
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

    public function upload()
    {
        if(!$this->imageFile)
            return false;

        if ($this->validate()) {
            $file = Yii::$app->security->generateRandomString(10).".".$this->imageFile->extension;
//            $this->imageFile->saveAs('uploads/' .$file);
            $this->imageFile->saveAs(Yii::getAlias("@frontend").'/web/uploads/' .$file);
            $this->imageFile = null;
            $this->image = $file;
            return true;
        } else {
            $this->addError("imageFile","Ошибка картинки");
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['views', 'created_at', 'created_id', 'updated_at', 'updated_id', 'status', 'category_id', 'region_id'], 'integer'],
            [['category_id'], 'required'],
            [['image','title'], 'string', 'max' => 255],
            ['descr','string'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => PostCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,jpeg'],
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
            'category_id' => 'Post Category ID',
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
        return $this->hasOne(PostCategory::className(), ['id' => 'category_id']);
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
