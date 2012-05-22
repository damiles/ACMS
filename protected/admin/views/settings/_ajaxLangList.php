<?php
foreach($lang as $item){
    if($item->selected)
            if($item->default)
                echo " <strong>$item->title (predeterminado)</strong> ";
            else
                echo " $item->title ";
}
?>

