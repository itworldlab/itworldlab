<?php

namespace backend\models\company;

use lav45\translate\TranslatedBehavior;
use lav45\translate\TranslatedTrait;
use Yii;

/**
 * This is the model class for table "company_category".
 *
 * @property int $id
 * @property string|null $icon
 * @property int|null $parent_id
 * @property int|null $parent_lvl
 * @property int|null $sort
 *
 * @property Company[] $companies
 * @property Company[] $companies0
 * @property CompaniesCategories[] $companiesCategories
 * @property CompanyCategoryLang[] $companyCategoryLangs
 */
class CompanyCategory extends \yii\db\ActiveRecord
{
    use TranslatedTrait;
    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_category';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TranslatedBehavior::className(),
                'translateRelation' => 'companyCategoryLangs', // Specify the name of the connection that will store transfers
                'languageAttribute' => 'lang_id', // post_lang field from the table that will store the target language
                'translateAttributes' => [
                    'name',
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
            $this->icon = $file;
            return true;
        } else {
            $this->addError("imageFile","Ошибка картинки");
            return false;
        }
    }

    public static function GetAll(){
        return CompanyCategory::find()->all();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'parent_lvl', 'sort'], 'integer'],
            [['icon','name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'imageFile' => "Значок категории",
            'icon' => 'Значок категории',
            'parent_id' => 'Родительская категория',
            'parent_lvl' => 'Уровень вложенности',
            'sort' => 'Сортировка',
            'name' => 'Название категории',
        ];
    }

    /**
     * Gets query for [[Companies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::className(), ['company_category_id' => 'id']);
    }

    /**
     * Gets query for [[Companies0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies0()
    {
        return $this->hasMany(Company::className(), ['id' => 'company_id'])->viaTable('companies_categories', ['company_category_id' => 'id']);
    }

    /**
     * Gets query for [[CompaniesCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompaniesCategories()
    {
        return $this->hasMany(CompaniesCategories::className(), ['company_category_id' => 'id']);
    }

    /**
     * Gets query for [[CompanyCategoryLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyCategoryLangs()
    {
        return $this->hasMany(CompanyCategoryLang::className(), ['company_category_id' => 'id']);
    }
}
