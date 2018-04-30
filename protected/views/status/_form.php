
<!DOCTYPE html>
<html>
<head>
    <title>AWS S3</title>
<body>

<h1 class="h1-font"> Upload Files into AWS S3</h1>

<form method="post" action="<?php echo Yii::app()->getBaseUrl(true).'/index.php?r=status/create'?>" enctype="multipart/form-data">
    <input type="file" name="upload[]" multiple="multiple">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Upload file' : 'Save'); ?>
</form>
</body>
</html>

