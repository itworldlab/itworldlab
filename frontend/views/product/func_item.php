<?php
echo '<ul class="list1">';
foreach($col as $prop){
    $ch = "close";
    $ch2 = "list1__close";
    if(in_array($prop->id,$product_props)){
        $ch = "check";
        $ch2 = 'green-check list1__green-check';
    }
    echo '<li><svg class="'.$ch2.'"><use xlink:href="/images/dist/sprite.svg#'.$ch.'"></use></svg>'.$prop->name.'</li>';
}
echo '</ul>';