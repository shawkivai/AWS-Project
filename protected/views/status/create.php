<?php
/* @var $this StatusController */
/* @var $model Status */

$this->breadcrumbs = array(
    'Statuses' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Bucket Files', 'url' => array('index')),
);
?>

<h1>Upload Files to AWS Server</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>

<?php

use Aws\S3\Exception\S3Exception;

require 'protected\config\start.php';

if (isset($_FILES['upload']['name'])) {
    $file = $_FILES['upload']['name'];
    $count = count($_FILES['upload']['name']);

//File details

    for ($i = 0; $i < $count; $i++) {

        $name = $_FILES['upload']['name'][$i];
        $tmp_name = $_FILES['upload']['tmp_name'][$i];

        $extension = explode('.', $name);
//    var_dump($extension);
        $extension = strtolower(end($extension));

//    MULTIPLE FILE UPLOAD AND CONTROL FILE SIZE AND CONTROL EXTENTION OF FILE//
        if ($tmp_name != "" && $extension != "exe") {
            if ($_FILES['upload']['size'][$i] > 50000000) {
                echo "file size exceed the limit";
                exit();
            } else {
                $key = md5(uniqid());
                $tmp_file_name = "{$key}.{$extension}";
                $tmp_file_path = "files/" . $_FILES['upload']['name'][$i];
//    var_dump($tmp_file_path);

                //Move the file into bucket
                if (move_uploaded_file($tmp_name, $tmp_file_path)) {

                    try {
                        $s3->putObject([
                            'Bucket' => $config['s3']['bucket'],
                            'Key' => "Md.MustakimHayder/{$name}",
                            'Body' => fopen($tmp_file_path, 'rb'),
                            'ACL' => 'public-read'
                        ]);

                        unlink($tmp_file_path); //delete the temporary file from files folder

                        echo "The files --> " . basename($tmp_file_path) . "uploaded successfully into AWS Bucket";
                    } catch (S3Exception $e) {
                        die("Upload failed");
                    }
                }
            }
        }
        else {
            echo "Not Uploaded the exe file";
        }
    }
}
?>