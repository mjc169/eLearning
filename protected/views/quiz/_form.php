<?php
/* @var $this QuizController */
/* @var $model Quiz */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'quiz-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false,
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary(array($model), null, null, array('class' => 'card border-left-danger shadow h-100 py-2 pl-4 mb-4')); ?>
	<div class="form-group row pl-4">
		<div class="col-sm-12"><?php echo $form->labelEx($model, 'title'); ?></div>
		<div class="col-sm-12"><?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?></div>
		<div class="col-sm-12"><?php echo $form->error($model, 'title'); ?></div>
	</div>

	<div class="form-group row pl-4">
		<div class="col-sm-12"><?php echo $form->labelEx($model, 'instructions'); ?></div>
		<div class="col-sm-12"><?php echo $form->textArea($model, 'instructions', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?></div>
		<div class="col-sm-12"><?php echo $form->error($model, 'instructions'); ?></div>
	</div>

	<div class="form-group row pl-4">
		<div class="col-sm-12"><?php echo $form->labelEx($model, 'time_limit'); ?></div>
		<div class="col-sm-12"><?php echo $form->textField($model, 'time_limit', array('class' => 'form-control')); ?></div>
		<div class="col-sm-12"><?php echo $form->error($model, 'time_limit'); ?></div>
	</div>

	<div class="form-group row pl-4">
		<div class="col-sm-12"><?php echo $form->labelEx($model, 'shuffle'); ?></div>
		<div class="col-sm-12"><?php echo $form->dropDownList($model, 'shuffle', [0 => 'No', 1 => 'Yes'], array('class' => 'form-control')); ?></div>
		<div class="col-sm-12"><?php echo $form->error($model, 'shuffle'); ?></div>
	</div>

	<div class="form-group row pl-4">
		<div class="col-sm-12"><?php echo $form->labelEx($model, 'limit_to_one'); ?></div>
		<div class="col-sm-12"><?php echo $form->textField($model, 'limit_to_one', array('class' => 'form-control')); ?></div>
		<div class="col-sm-12"><?php echo $form->error($model, 'limit_to_one'); ?></div>
	</div>

	<div class="form-group row pl-4">
		<div class="col-sm-12"><?php echo $form->labelEx($model, 'lock_question'); ?></div>
		<div class="col-sm-12"><?php echo $form->dropDownList($model, 'lock_question', [0 => 'No', 1 => 'Yes'], array('class' => 'form-control')); ?></div>
		<div class="col-sm-12"><?php echo $form->error($model, 'lock_question'); ?></div>
	</div>

	<div class="form-group row pl-4">
		<div class="col-sm-12"><?php echo $form->labelEx($model, 'due_date'); ?></div>
		<div class="col-sm-12"><?php
								$this->widget('zii.widgets.jui.CJuiDatePicker', array(
									'name' => 'Quiz[due_date]',
									'value' => $model->due_date,
									'options' => array(
										'showAnim' => 'fold',
									),
									// any HTML options for the input field
									'htmlOptions' => array(
										'class' => 'form-control',
										'placeholder' => 'Select Due date',
										'id' => 'datepicker-due_date',
									),
								));

								?>
		</div>
		<div class="col-sm-12"><?php echo $form->error($model, 'due_date'); ?></div>
	</div>

	<div class="form-group row pl-4">
		<div class="col-sm-12"><?php echo $form->labelEx($model, 'availability_date'); ?></div>
		<div class="col-sm-12"><?php
								$this->widget('zii.widgets.jui.CJuiDatePicker', array(
									'name' => 'Quiz[availability_date]',
									'value' => $model->availability_date,
									'options' => array(
										'showAnim' => 'fold',
									),
									// any HTML options for the input field
									'htmlOptions' => array(
										'class' => 'form-control',
										'placeholder' => 'Select Availability date',
										'id' => 'datepicker-availability_date',
									),
								));

								?></div>
		<div class="col-sm-12"><?php echo $form->error($model, 'availability_date'); ?></div>
	</div>

	<div class="form-group row pl-4">
		<div class="col-sm-12"><?php echo $form->labelEx($model, 'lock_date'); ?></div>
		<div class="col-sm-12"><?php
								$this->widget('zii.widgets.jui.CJuiDatePicker', array(
									'name' => 'Quiz[lock_date]',
									'value' => $model->lock_date,
									'options' => array(
										'showAnim' => 'fold',
									),
									// any HTML options for the input field
									'htmlOptions' => array(
										'class' => 'form-control',
										'placeholder' => 'Select Lock date',
										'id' => 'datepicker-lock_date',
									),
								));

								?></div>
		<div class="col-sm-12"><?php echo $form->error($model, 'lock_date'); ?></div>
	</div>

	<div class="row buttons">
		<div class="col-sm-12"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></div>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->