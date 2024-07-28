<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'take-quiz-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false,
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary(array($model), null, null, array('class' => 'card border-left-danger shadow h-100 py-2 pl-4 mb-4')); ?>

	<h1><?php echo $quiz->title; ?></h1>
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group row pl-4">
				<div class="col-sm-12"><?php echo $form->labelEx($model, 'subject_id'); ?></div>
				<div class="col-sm-12"><?php echo $form->dropDownList($model, 'subject_id', Subject::dataList(), array('empty' => '-Select Subject-', 'class' => 'form-control', 'disabled' => true)); ?></div>
				<div class="col-sm-12"><?php echo $form->error($model, 'subject_id', array('class' => 'text-danger')); ?></div>
			</div>


			<div class="row buttons">
				<div class="col-sm-12"><?php echo CHtml::submitButton('Submit Quiz'); ?></div>
			</div>

			<?php $this->endWidget(); ?>

		</div><!-- form -->