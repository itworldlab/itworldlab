<?php

namespace backend\models\product;

use lav45\translate\TranslatedBehavior;
use lav45\translate\TranslatedTrait;
use Yii;

/**
 * This is the model class for table "prop".
 *
 * @property int $id
 * @property string|null $type
 * @property int $prop_type_id
 * @property int|null $status
 * @property string|null $icon

 *
 * @property ProductsProps[] $productsProps
 * @property PropLang[] $propLangs
 * @property PropType $propType
 * @property PropsQuestions[] $propsQuestions
 */
class Prop extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 10;
    const STATUS_DISABLED = 9;
    use TranslatedTrait;

    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prop_type_id'], 'required'],
            [['prop_type_id', 'status'], 'integer'],
            [['type','lang_id'], 'string', 'max' => 45],
            [['name'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'svg'],
            [['prop_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PropType::className(), 'targetAttribute' => ['prop_type_id' => 'id']],
        ];
    }
    public function behaviors()
    {
        return [
            [
                'class' => TranslatedBehavior::className(),
                'translateRelation' => 'propLangs', // Specify the name of the connection that will store transfers
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

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'prop_type_id' => 'Prop Type ID',
            'status' => 'Status',
            'icon' => 'Icon',
        ];
    }

    /**
     * Gets query for [[ProductsProps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsProps()
    {
        return $this->hasMany(ProductsProps::className(), ['prop_id' => 'id']);
    }

    /**
     * Gets query for [[PropLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPropLangs()
    {
        return $this->hasMany(PropLang::className(), ['prop_id' => 'id']);
    }

    /**
     * Gets query for [[PropType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPropType()
    {
        return $this->hasOne(PropType::className(), ['id' => 'prop_type_id']);
    }

    /**
     * Gets query for [[PropsQuestions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPropsQuestions()
    {
        return $this->hasMany(PropsQuestions::className(), ['prop_id' => 'id']);
    }
}
