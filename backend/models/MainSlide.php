<?php

namespace backend\models;

use lav45\translate\TranslatedBehavior;
use lav45\translate\TranslatedTrait;
use Yii;

/**
 * This is the model class for table "main_slides".
 *
 * @property int $id
 * @property string|null $image
 * @property int|null $status
 * @property int|null $sort
 *
 * @property MainSlideLang[] $mainSlidesLangs
 */
class MainSlide extends \yii\db\ActiveRecord
{
    use TranslatedTrait;
    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'main_slides';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TranslatedBehavior::className(),
                'translateRelation' => 'mainSlidesLangs', // Specify the name of the connection that will store transfers
                'languageAttribute' => 'lang_id', // post_lang field from the table that will store the target language
                'translateAttributes' => [
                    'title',
                    'subtitle',
                    'descr',
                    'subdescr',
                    'link',
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
            [['status', 'sort'], 'integer'],
            [['image'], 'string', 'max' => 100],
            [['title','subtitle','descr','subdescr'],'string'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg,jpeg,png'],
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
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'status' => 'Status',
            'sort' => 'Sort',
        ];
    }

    /**
     * Gets query for [[MainSlidesLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMainSlidesLangs()
    {
        return $this->hasMany(MainSlideLang::className(), ['main_slides_id' => 'id']);
    }
}
