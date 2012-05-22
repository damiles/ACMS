<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

echo '[';
$dates="";
foreach($eventos as $evento){
        $converteddate =  date("n,j,Y",strtotime($evento->date));
        $dates .= '['.$converteddate.'],';
    
}
$dates =rtrim($dates, ",");
echo $dates;
echo ']';
?>
