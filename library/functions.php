<?php

function buildTree($elements , $parent_id=0){

    $branch = array();

  foreach ($elements as $element) {
   if($element->parent_id ==$parent_id){
  
    $children = buildTree($elements,$element->id);
   
    if($children){
        $element->children = $children;

    }
    else{
        $element->children = array();
    }

    $branch[] = $element;

   }
  }
  return $branch;

}

function drawElement($items){

    echo "<ul>";
    foreach ($items as $item ) {
       
        echo "<li> {$item->title} </li>";
        if(sizeof($item->children) > 0){
            drawElement($item->children);
        }
    }
    echo "</ul>";
}


?>