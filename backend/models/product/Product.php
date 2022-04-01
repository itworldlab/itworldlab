<?php

namespace backend\models\product;

use lav45\translate\TranslatedBehavior;
use lav45\translate\TranslatedTrait;
use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property float|null $rating Рейтинг
 * @property int|null $install_count Кол-во использований
 * @property string $logo Лого продукта
 * @property float|null $rate_average
 * @property float|null $rate_boon
 * @property float|null $rate_func
 * @property float|null $rate_support
 * @property float|null $rate_price
 * @property int|null $rate_count
 * @property int|null $admin_id
 * @property int|null $status
 * @property int|null $category_id
 * @property string $link

 *
 * @property Industry[] $industries
 * @property Integrator[] $integrators
 * @property IntegratorsProducts[] $integratorsProducts
 * @property ProductCompatibility[] $productCompatibilities
 * @property ProductLang[] $productLangs
 * @property ProductTarif[] $productTarifs
 * @property ProductsCategories[] $productsCategories
 * @property ProductsIndustries[] $productsIndustries
 * @property ProductsProps[] $productsProps
 * @property ProductsRegions[] $productsRegions
 * @property PropsQuestions[] $propsQuestions
 * @property Region[] $regions
 */
class Product extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 10;
    const STATUS_DISABLED = 9;
    use TranslatedTrait;

    public $imageFile;
    public $cats;
    public $compatibility;
    public $analogs;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    public static function GetAll(){
        return Product::find()->all();
    }

    public function behaviors()
    {
        return [
            [
                'class' => TranslatedBehavior::className(),
                'translateRelation' => 'productLangs', // Specify the name of the connection that will store transfers
                'languageAttribute' => 'lang_id', // post_lang field from the table that will store the target language
                'translateAttributes' => [
                    'name',
                    'short_descr',
                    'descr',
                ]
            ]
        ];
    }

    public function upload()
    {
        if(!$this->imageFile)
            return true;
        if ($this->validate()) {
            $file = Yii::$app->security->generateRandomString(10).".".$this->imageFile->extension;
//            $this->imageFile->saveAs('uploads/' .$file);
            $this->imageFile->saveAs(Yii::getAlias("@frontend").'/web/uploads/' .$file);
            $this->imageFile = null;
            $this->logo = $file;
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
            [['rating', 'rate_average', 'rate_boon', 'rate_func', 'rate_support', 'rate_price'], 'number'],
            [['install_count', 'rate_count', 'admin_id'], 'integer'],
//            [['logo', 'admin_id'], 'required'],
            [['logo'], 'string', 'max' => 100],
            [['descr','link'], 'string'],
            [['cats','compatibility','analogs'],'safe'],
            [['name', 'short_descr'], 'string', 'max' => 255],
            [['lang_id'], 'string', 'max' => 2],
            [['category_id'], 'exist', 'skipOnError' => false, 'targetClass' => ProductCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @return bool
     * @throws \yii\db\Exception
     */
    public function SetCats(){
        $result = true;
        if(!empty($this->cats)){
            \Yii::$app->db->createCommand("DELETE FROM products_categories WHERE product_id=".intval($this->id))->execute();
            foreach($this->cats as $cat_id){
                $product_cat = new ProductsCategories();
                $product_cat->product_id = $this->id;
                $product_cat->product_category_id = $cat_id;
                if(!$product_cat->save()){
                    $this->addErrors($product_cat->errors);
                    $result = false;
                }
            }
        }
        return $result;
    }

    /**
     * @return bool
     * @throws \yii\db\Exception
     */
    public function SetComp(){
        $result = true;
        if(!empty($this->compatibility)){
            \Yii::$app->db->createCommand("DELETE FROM product_compatibility WHERE product_id=".intval($this->id))->execute();
            foreach($this->compatibility as $comp=>$id){
                $pc = new ProductCompatibility();
                $pc->product_id = $this->id;
                $pc->comp_product_id = $id;
                if(!$pc->save()){
                    $this->addErrors($pc->errors);
                    $result = false;
                }
            }
        }
        return $result;
    }

    /**
     * @return bool
     * @throws \yii\db\Exception
     */
    public function SetAnalogs(){
        $result = true;
        if(!empty($this->analogs)){
            \Yii::$app->db->createCommand("DELETE FROM product_analogs WHERE product_id=".intval($this->id))->execute();
            foreach($this->analogs as $comp=>$id){
                $pc = new ProductAnalog();
                $pc->product_id = $this->id;
                $pc->analog_product_id = $id;
                if(!$pc->save()){
                    $this->addErrors($pc->errors);
                    $result = false;
                }
            }
        }
        return $result;
    }

    public function afterFind()
    {
        foreach(ProductsCategories::find()->where(['product_id'=>$this->id])->all() as $item){
            $this->cats[] = $item->product_category_id;
        }

        foreach(ProductCompatibility::find()->where(['product_id'=>$this->id])->all() as $item){
            $this->compatibility[] = $item->comp_product_id;
        }

        foreach (ProductAnalog::find()->where(['product_id'=>$this->id])->all() as $item){
            $this->analogs[] = $item->analog_product_id;
        }
        parent::afterFind(); // TODO: Change the autogenerated stub
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'id'),
            'compatibility' => "Совместимость",
            'analogs' => "Аналоги",
            'link' => "Ссылка на сайт",
            'name' => Yii::t('product', 'name'),
            'translate' => Yii::t('product', 'translate'),
            'short_descr' => Yii::t('product', 'short_descr'),
            'descr' => Yii::t('product', 'descr'),
            'install_count' => Yii::t('app', 'Install Count'),
            'logo' => Yii::t('product', 'logo'),
            'rating' => Yii::t('product', 'rating'),
            'rate_average' => Yii::t('app', 'Rate Average'),
            'rate_boon' => Yii::t('app', 'Rate Boon'),
            'rate_func' => Yii::t('app', 'Rate Func'),
            'rate_support' => Yii::t('app', 'Rate Support'),
            'rate_price' => Yii::t('app', 'Rate Price'),
            'rate_count' => Yii::t('app', 'Rate Count'),
            'admin_id' => Yii::t('app', 'Admin ID'),
            'category_id' => 'Основная категория',
            'cats' => 'Доп категории',
        ];
    }

    /**
     * Gets query for [[ProductLang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct_lang()
    {
        return $this->hasOne(ProductLang::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ProductCategory::className(), ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Industries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndustries()
    {
        return $this->hasMany(Industry::className(), ['id' => 'industry_id'])->viaTable('products_industries', ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Integrators]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIntegrators()
    {
        return $this->hasMany(Integrator::className(), ['id' => 'integrator_id'])->viaTable('integrators_products', ['product_id' => 'id']);
    }

    /**
     * Gets query for [[IntegratorsProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIntegratorsProducts()
    {
        return $this->hasMany(IntegratorsProducts::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductCompatibilities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductCompatibilities()
    {
        return $this->hasMany(ProductCompatibility::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductLangs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductLangs()
    {
        return $this->hasMany(ProductLang::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductTarifs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductTarifs()
    {
        return $this->hasMany(ProductTarif::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductsCategories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsCategories()
    {
        return $this->hasMany(ProductsCategories::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductsIndustries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsIndustries()
    {
        return $this->hasMany(ProductsIndustries::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductsProps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsProps()
    {
        return $this->hasMany(ProductsProps::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductsRegions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsRegions()
    {
        return $this->hasMany(ProductsRegions::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[PropsQuestions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPropsQuestions()
    {
        return $this->hasMany(PropsQuestions::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Regions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegions()
    {
        return $this->hasMany(Region::className(), ['id' => 'region_id'])->viaTable('products_regions', ['product_id' => 'id']);
    }
}
