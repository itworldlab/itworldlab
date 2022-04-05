<?php

namespace backend\models\company;

use Yii;

/**
 * This is the model class for table "companies_categories".
 *
 * @property int $company_id
 * @property int $company_category_id
 *
 * @property Company $company
 * @property CompanyCategory $companyCategory
 */
class CompaniesCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companies_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'company_category_id'], 'required'],
            [['company_id', 'company_category_id'], 'integer'],
            [['company_id', 'company_category_id'], 'unique', 'targetAttribute' => ['company_id', 'company_category_id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['company_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => CompanyCategory::className(), 'targetAttribute' => ['company_category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'company_category_id' => 'Company Category ID',
        ];
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
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
}
