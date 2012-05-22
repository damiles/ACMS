<?php $this->pageTitle=Yii::app()->name;
ini_set("memory_limit","120M");
$fullPath    = Yii::app()->params['upload'].$descarga;

if ($fd = fopen ($fullPath, "rb")) {
    $fsize    =filesize($fullPath);
    $fname     = basename ($fullPath);

    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private", false); // required for certain browsers
    header("Content-Type: application/octet-stream");
    header("Content-Transfer-Encoding: Binary");
    header("Content-Disposition: attachment; filename=\"".$fname."\"");
    header("Content-Length: $fsize");

    readfile($fullPath);
    exit();

}else{
    echo "<h2>No se encuentra el archivo de descarga.</h2>";
}

?>