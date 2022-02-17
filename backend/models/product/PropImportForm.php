<?php

namespace backend\models\product;

use yii\base\Model;

class PropImportForm extends Model
{
    public $props = [];
    public $form = true;
    public $cat_id = 0;

    public function rules()
    {
        return [
            ['props','safe'],
            ['form','boolean'],
            ['cat_id','integer'],
        ];
    }

}
