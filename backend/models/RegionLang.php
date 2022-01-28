<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "region_lang".
 *
 * @property int $id
 * @property int $region_id
 * @property int $lang_id
 * @property string|null $name
 * @property string|null $code
 * @property int|null $parent_lvl
 * @property int|null $parent_id

 *
 * @property Region $region
 */
class RegionLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region_id', 'lang_id'], 'required'],
            [['region_id', 'lang_id', 'parent_lvl', 'parent_id'], 'integer'],
            [['name', 'code'], 'string', 'max' => 45],
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
            'region_id' => 'Region ID',
            'lang_id' => 'Lang ID',
            'name' => 'Name',
            'code' => 'Code',
            'parent_lvl' => 'Parent Lvl',
            'parent_id' => 'Parent ID',
        ];
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
