<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

$username=User::model()->findAll();
print_r($username);
?>

