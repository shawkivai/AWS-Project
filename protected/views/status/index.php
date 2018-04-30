
<h1>Amazon Web Service</h1>

<?php

require 'C:\xampp\htdocs\AssignmentPHp\protected\config\start.php';

$objects = $s3->getIterator('ListObjects',[
    'Bucket' => $config['s3']['bucket']

]);

$this->renderPartial('_view', array('objects' => $objects, 'config'=>$config, 's3'=>$s3,));

?>

<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>Listings</title>-->
<!--</head>-->
<!--<body>-->
<!---->
<!--<h1>Show the files uploaded into the bucket</h1>-->
<!--<table>-->
<!--    <thead>-->
<!--    --><?php //foreach ($objects as $object): ?>
<!--    <!-- -->--><?php ////var_dump($object); ?>
<!--    <tr>-->
<!--        <th>File</th>-->
<!--    </tr>-->
<!--    </thead>-->
<!--    <tbody>-->
<!--    <td>--><?php //echo $object['Key'];?><!--</td>-->
<!--    <td><a href="--><?php //echo $s3->getObjectUrl($config['s3']['bucket'], $object['Key']); ?><!--" download="--><?php //$object['Key']?><!--">Download</a></td>-->
<!--    --><?php //endforeach; ?>
<!--    </tbody>-->
<!--</table>-->
<!---->
<!---->
<!--</form>-->
<!--</body>-->
<!--</html>-->
