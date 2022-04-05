<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "main_slides_lang".
 *
 * @property int $id
 * @property int $main_slides_id
 * @property string $lang_id
 * @property string|null $title
 * @property string|null $subtitle
 * @property string|null $descr
 * @property string|null $subdescr
 * @property string|null $link
 *
 * @property Lang $lang
 * @property MainSlides $mainSlides
 */
class MainSlideLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'main_slides_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['main_slides_id', 'lang_id'], 'required'],
            [['main_slides_id'], 'integer'],
            [['lang_id'], 'string', 'max' => 2],
            [['title', 'subtitle', 'link'], 'string', 'max' => 100],
            [['descr', 'subdescr'], 'string', 'max' => 255],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['main_slides_id'], 'exist', 'skipOnError' => true, 'targetClass' => MainSlides::className(), 'targetAttribute' => ['main_slides_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'main_slides_id' => 'Main Slides ID',
            'lang_id' => 'Lang ID',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'descr' => 'Descr',
            'subdescr' => 'Subdescr',
            'link' => 'Link',
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
     * Gets query for [[MainSlides]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMainSlides()
    {
        return $this->hasOne(MainSlides::className(), ['id' => 'main_slides_id']);
    }
}
