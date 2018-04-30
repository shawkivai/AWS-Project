<?php
/* @var $this StatusController */
/* @var $data Status */
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listings</title>
</head>
<body>

<h1>Show the files uploaded into the bucket</h1>
<table>
    <thead>
    <?php foreach ($objects as $object): ?>
    <!-- --><?php //var_dump($object); ?>
    <tr>
        <th>File</th>
    </tr>
    </thead>
    <tbody>
    <td><?php echo $object['Key']; ?></td>
    <td><a href="<?php echo $s3->getObjectUrl($config['s3']['bucket'], $object['Key']); ?>"
           download="<?php $object['Key'] ?>">Download</a></td>
    <?php endforeach; ?>
    </tbody>
</table>


</form>
</body>

