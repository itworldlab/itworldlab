<?php
echo '<ul class="list-func">';
foreach($col as $prop){
    $ch = "close";
    $ch2 = "list-func__svg--red";
    if(in_array($prop->id,$product_props)){
        $ch = "check";
        $ch2 = 'green-check list1__green-check';
    }
    echo '<li><svg class="list-func__svg '.$ch2.'"><use xlink:href="/images/dist/sprite.svg#'.$ch.'"></use></svg>'.$prop->name.'</li>';
}
echo '</ul>';
