<?php
/* @var $this StudentController */
/* @var $model Student */
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
		<?php echo $form->label($model, 'account_id'); ?>
		<?php echo $form->textField($model, 'account_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'lastname'); ?>
		<?php echo $form->textField($model, 'lastname', array('size' => 60, 'maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'firstname'); ?>
		<?php echo $form->textField($model, 'firstname', array('size' => 60, 'maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'middlename'); ?>
		<?php echo $form->textField($model, 'middlename', array('size' => 60, 'maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'gender'); ?>
		<?php echo $form->textField($model, 'gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'year_level'); ?>
		<?php echo $form->textField($model, 'year_level'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'section'); ?>
		<?php echo $form->textField($model, 'section'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- search-form -->