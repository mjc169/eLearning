<?php
/* @var $this QuizController */
/* @var $model Quiz */
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
		<?php echo $form->label($model, 'title'); ?>
		<?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'instructions'); ?>
		<?php echo $form->textArea($model, 'instructions', array('rows' => 6, 'cols' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'time_limit'); ?>
		<?php echo $form->textField($model, 'time_limit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'shuffle'); ?>
		<?php echo $form->textField($model, 'shuffle'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'limit_to_one'); ?>
		<?php echo $form->textField($model, 'limit_to_one'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'lock_question'); ?>
		<?php echo $form->textField($model, 'lock_question'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'due_date'); ?>
		<?php echo $form->textField($model, 'due_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'availability_date'); ?>
		<?php echo $form->textField($model, 'availability_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'lock_date'); ?>
		<?php echo $form->textField($model, 'lock_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search', array('class' => 'btn btn-primary btn-user btn-block')); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- search-form -->