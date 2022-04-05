<?php

namespace backend\models\company;

use Yii;

/**
 * This is the model class for table "company_lang".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $short_descr
 * @property string|null $descr
 * @property string|null $addr
 * @property int $company_id
 * @property string $lang_id
 *
 * @property Company $company
 * @property Lang $lang
 */
class CompanyLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descr'], 'string'],
            [['company_id', 'lang_id'], 'required'],
            [['company_id'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['short_descr'], 'string', 'max' => 255],
            [['addr'], 'string', 'max' => 100],
            [['lang_id'], 'string', 'max' => 2],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
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
            'short_descr' => 'Short Descr',
            'descr' => 'Descr',
            'addr' => 'Addr',
            'company_id' => 'Company ID',
            'lang_id' => 'Lang ID',
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
     * Gets query for [[Lang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Lang::className(), ['id' => 'lang_id']);
    }
}
