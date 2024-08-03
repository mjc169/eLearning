<?php
/* @var $this FileController */
/* @var $model File */
/* @var $form CActiveForm */
?>

<div class="wide form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'action' => Yii::app()->createUrl($this->route),
		'method' => 'get',
	)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'uploader_id'); ?>
		<?php echo $form->textField($model, 'uploader_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'original_filename'); ?>
		<?php echo $form->textField($model, 'original_filename', array('size' => 60, 'maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'file_extension'); ?>
		<?php echo $form->textField($model, 'file_extension', array('size' => 10, 'maxlength' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'e_filename'); ?>
		<?php echo $form->textField($model, 'e_filename', array('size' => 60, 'maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'bvalue'); ?>
		<?php echo $form->textArea($model, 'bvalue', array('rows' => 6, 'cols' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'status'); ?>
		<?php echo $form->textField($model, 'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search', array('class' => 'btn btn-primary btn-user btn-block')); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- search-form -->