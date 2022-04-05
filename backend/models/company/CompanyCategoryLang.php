<?php

namespace backend\models\company;

use Yii;

/**
 * This is the model class for table "company_category_lang".
 *
 * @property int $id
 * @property string|null $name
 * @property int $company_category_id
 * @property string $lang_id
 *
 * @property CompanyCategory $companyCategory
 * @property Lang $lang
 */
class CompanyCategoryLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_category_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_category_id', 'lang_id'], 'required'],
            [['company_category_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['lang_id'], 'string', 'max' => 2],
            [['company_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => CompanyCategory::className(), 'targetAttribute' => ['company_category_id' => 'id']],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'company_category_id' => 'Company Category ID',
            'lang_id' => 'Lang ID',
        ];
    }

    /**
     * Gets query for [[CompanyCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyCategory()
    {
        return $this->hasOne(CompanyCategory::className(), ['id' => 'company_category_id']);
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
}
