<?php
/* @var $this QuestionController */
/* @var $model Question */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'question-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false,
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'subjectId'); ?>
		<?php echo $form->dropDownList($model, 'subjectId', Subject::dataList(), array('empty' => '-Select Subject-', 'class' => 'form-control', 'disabled' => true, 'style' => 'max-width: 500px')); ?>
		<?php echo $form->error($model, 'subjectId', array('class' => 'text-danger')); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'question'); ?>
		<?php echo $form->textArea($model, 'question', array('rows' => 6, 'cols' => 50)); ?>
		<?php echo $form->error($model, 'question'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'question_type'); ?>
		<?php echo $form->dropDownList($model, 'question_type', Question::questionTypeList(), array('empty' => Yii::t('app', '-Question Type-'))); ?>
		<?php echo $form->error($model, 'question_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'file_id'); ?>
		<?php echo $form->textField($model, 'file_id'); ?>
		<?php echo $form->error($model, 'file_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'taxonomy_id'); ?>
		<?php echo $form->dropDownList($model, 'taxonomy_id', QuestionTaxonomy::dataList(), array('empty' => Yii::t('app', '-Question Taxonomy-'))); ?>
		<?php echo $form->error($model, 'taxonomy_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'competency_id'); ?>
		<?php echo $form->dropDownList($model, 'competency_id', SubjectCompetency::dataList($model->subjectId), array('empty' => Yii::t('app', '-Subject Competency-'))); ?>
		<?php echo $form->error($model, 'competency_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'status'); ?>
		<?php echo $form->dropDownList($model, 'status', array('1' => 'Active', '0' => 'Inactive')); ?>
		<?php echo $form->error($model, 'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'choices'); ?> <br>
		<?php
		for ($i = 0; $i < count($model->choices); $i++) {
			echo $form->hiddenField($model, "choices[$i][id]");
			echo $form->textField($model, "choices[$i][choice]");
			echo $form->dropDownList($model, "choices[$i][is_correct]", array('0' => '-', '1' => 'Correct Answer'));
			echo $form->dropDownList($model, "choices[$i][status]", array('1' => 'Active', '0' => 'Inactive'));
			echo "<br>";
		}
		?>
		<?php echo $form->error($model, 'choices'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->