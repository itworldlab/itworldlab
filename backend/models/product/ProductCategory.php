<?php

namespace backend\models\product;

use lav45\translate\TranslatedBehavior;
use lav45\translate\TranslatedTrait;
use Yii;
use backend\models\Lang;

/**
 * This is the model class for table "product_category".
 *
 * @property int $id
 * @property string|null $icon
 * @property int|null $parent_id
 * @property int|null $parent_lvl
 * @property int|null $status

 *
 * @property Lang $lang
 * @property ProductCategoryLang[] $productCategoryLangs
 * @property Product[] $products
 */
class ProductCategory extends \yii\db\ActiveRecord
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
        return 'product_category';
    }

    public static function GetAll(){
        return ProductCategory::find()->all();
    }


    public function behaviors()
    {
        return [
            [
                'class' => TranslatedBehavior::className(),
                'translateRelation' => 'productCategoryLangs', // Specify the name of the connection that will store transfers
                'languageAttribute' => 'lang_id', // post_lang field from the table that will store the target language
                'translateAttributes' => [
                    'name',
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
            [['parent_id', 'parent_lvl', 'status'], 'integer'],
            [['icon'], 'string', 'max' => 100],
            ['name','string'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'svg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $file = Yii::$app->security->generateRandomString(10).".".$this->imageFile->extension;
//            $img = $this->imageFile;
//            $img->saveAs('uploads/' .$file);
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
            'icon' => 'Icon',
            'parent_id' => 'Parent ID',
            'parent_lvl' => 'Parent Lvl',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[ProductCategoryLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategoryLangs()
    {
        return $this->hasMany(ProductCategoryLang::className(), ['product_category_id' => 'id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['product_category_id' => 'id']);
    }
}
