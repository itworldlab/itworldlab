<?php

?>

<select class="form-control" id="prop-cat">
    <option value="">Выберите...</option>
    <option value="0">Без категории</option>
    <?php foreach(\backend\models\product\ProductCategory::find()->all() as $item):?>
        <?php if($cat->id != $item->id):?>
            <option value="<?=$item->id?>"><?=$item->name?></option>
        <?php endif?>
    <?php endforeach;?>
</select>
<hr/>
<div id="content">

</div>


<script>
    function Sel(event){
        console.log(event);
    }
    $("#modalTitle").html("От куда импортировать");

    $("#prop-cat").change(function(){
        var cat_id = $(this).val();
        if(cat_id === ""){
           return;
        }
        $("#content").html("<img src='/img/loader.gif'/>");
        $.ajax({
            type:"get",
            url:"/product/prop-type/import",
            data:{cat_id:cat_id,form:true},
            success:function(data){
                $("#content").html(data);
            }
        })
    });
</script>
