<?php
use \yii\helpers\Json;

$id=$_GET['id'];
$sql = 'select * from image WHERE id <'.$id.' ORDER BY image.id DESC limit 10';
$q = Yii::$app->eladiesdb->createCommand($sql)->queryAll();
for ($i = 0; $i < count($q); $i++) {
    $row[$i]['id'] = $q[$i]['id'];
    $row[$i]['name'] = $q[$i]['url'];
}
echo Json::encode($row);
?>