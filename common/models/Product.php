<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property int $id
 * @property string|null $name Название продукта
 * @property float|null $rating Рейтинг
 * @property string|null $short_descr Короткое описание
 * @property string|null $descr Описание
 * @property int|null $install_count Кол-во использований
 * @property string $logo Лого продукта|img_crop
 * @property string|null $productcol

 *
 * @property Integrator[] $integrators
 * @property IntegratorsProducts[] $integratorsProducts
 * @property ProductsProps[] $productsProps
 * @property PropsQuestions[] $propsQuestions
 */
class Product extends \yii\db\ActiveRecord
{
    public $test = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'logo'], 'required'],
            [['id', 'install_count'], 'integer'],
            [['rating'], 'number'],
            [['descr'], 'string'],
            [['name', 'productcol'], 'string', 'max' => 45],
            [['short_descr'], 'string', 'max' => 255],
            [['logo'], 'string', 'max' => 100],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Название продукта'),
            'rating' => Yii::t('app', 'Рейтинг'),
            'short_descr' => Yii::t('app', 'Короткое описание'),
            'descr' => Yii::t('app', 'Описание'),
            'install_count' => Yii::t('app', 'Кол-во использований'),
            'logo' => Yii::t('app', 'Лого продукта|img_crop'),
            'productcol' => Yii::t('app', 'Productcol'),
        ];
    }

    /**
     * Gets query for [[Integrators]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIntegrators()
    {
        return $this->hasMany(Integrator::className(), ['id' => 'integrator_id'])->viaTable('{{%integrators_products}}', ['product_id' => 'id']);
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
     * Gets query for [[ProductsProps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductsProps()
    {
        return $this->hasMany(ProductsProps::className(), ['product_id' => 'id']);
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
}
