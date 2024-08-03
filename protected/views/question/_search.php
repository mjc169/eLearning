<?php
/* @var $this QuestionController */
/* @var $model Question */
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
		<?php echo $form->label($model, 'question'); ?>
		<?php echo $form->textArea($model, 'question', array('rows' => 6, 'cols' => 50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'question_type'); ?>
		<?php echo $form->textField($model, 'question_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'file_id'); ?>
		<?php echo $form->textField($model, 'file_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'taxonomy_id'); ?>
		<?php echo $form->textField($model, 'taxonomy_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'competency_id'); ?>
		<?php echo $form->textField($model, 'competency_id'); ?>
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