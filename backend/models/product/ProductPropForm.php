<?php

namespace backend\models\product;

use yii\base\Model;

class ProductPropForm extends Model
{
    public $product_id;
    public $props;

    public function rules()
    {
        return [
            [['product_id'],'integer'],
            ['props','safe'],
        ];
    }

    /**
     * @return bool
     */
    public function SetProps(){
        $result = true;
        if(!empty($this->props)){
            \Yii::$app->db->createCommand("DELETE FROM products_props WHERE product_id=".intval($this->product_id))->execute();
            foreach($this->props as $prop_id=>$val){
                if($val){
                    $product_prop = new ProductProp();
                    $product_prop->product_id = $this->product_id;
                    $product_prop->prop_id = $prop_id;
                    if(!$product_prop->save()){
                        $this->addErrors($product_prop->errors);
                        $result = false;
                    }
                }
            }
        }
        return $result;
    }

}