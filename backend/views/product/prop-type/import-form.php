<?php
use yii\bootstrap4\ActiveForm;
use backend\models\product\Prop;

/* @var $this \yii\web\View */
/* @var $props array|\backend\models\product\PropType[]|\yii\db\ActiveRecord[] */
/* @var $cat \backend\models\product\ProductCategory */

$form = ActiveForm::begin();
echo $form->field($model,'cat_id')->hiddenInput(['value'=>$cat->id])->label(false);
echo $form->field($model,'form')->hiddenInput(['value'=>true])->label(false);
foreach($props as $prop){
    $in_props = Prop::find()->where(['prop_type_id'=>$prop->id])->count();
    echo $form->field($model,'props['.$prop->id.']')->checkbox(['id'=>'cb_'.$prop->id])->label($prop->name."<br/>Свойств: ".$in_props);
}
echo \yii\bootstrap4\Html::submitButton("Отправить",['class'=>'btn btn-success']);
ActiveForm::end()?>


