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

	<div class="row">
		<div class="col-sm-6">
			<div class="form-group row pl-4">
				<div class="col-sm-12"><?php echo $form->labelEx($model, 'subject_id'); ?></div>
				<div class="col-sm-12"><?php echo $form->dropDownList($model, 'subject_id', Subject::dataList(), array('empty' => '-Select Subject-', 'class' => 'form-control', 'disabled' => true)); ?></div>
				<div class="col-sm-12"><?php echo $form->error($model, 'subject_id', array('class' => 'text-danger')); ?></div>
			</div>
			<div class="form-group row pl-4">
				<div class="col-sm-12"><?php echo $form->labelEx($model, 'title'); ?></div>
				<div class="col-sm-12"><?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?></div>
				<div class="col-sm-12"><?php echo $form->error($model, 'title', array('class' => 'text-danger')); ?></div>
			</div>

			<div class="form-group row pl-4">
				<div class="col-sm-12"><?php echo $form->labelEx($model, 'instructions'); ?></div>
				<div class="col-sm-12"><?php echo $form->textArea($model, 'instructions', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?></div>
				<div class="col-sm-12"><?php echo $form->error($model, 'instructions', array('class' => 'text-danger')); ?></div>
			</div>

			<div class="form-group row pl-4">
				<div class="col-sm-12"><?php echo $form->labelEx($model, 'time_limit'); ?></div>
				<div class="col-sm-12"><?php echo $form->textField($model, 'time_limit', array('class' => 'form-control', "placeholder" => "Time in Minutes, e.g 60 for 1 hour")); ?></div>
				<div class="col-sm-12"><?php echo $form->error($model, 'time_limit', array('class' => 'text-danger')); ?></div>
			</div>

			<div class="form-group row pl-4">
				<div class="col-sm-12"><?php echo $form->labelEx($model, 'shuffle'); ?></div>
				<div class="col-sm-12"><?php echo $form->dropDownList($model, 'shuffle', [0 => 'No', 1 => 'Yes'], array('class' => 'form-control')); ?></div>
				<div class="col-sm-12"><?php echo $form->error($model, 'shuffle', array('class' => 'text-danger')); ?></div>
			</div>

			<div class="form-group row pl-4">
				<div class="col-sm-12"><?php echo $form->labelEx($model, 'limit_to_one'); ?></div>
				<div class="col-sm-12"><?php echo $form->dropDownList($model, 'limit_to_one', [0 => 'No', 1 => 'Yes'], array('class' => 'form-control')); ?></div>
				<div class="col-sm-12"><?php echo $form->error($model, 'limit_to_one', array('class' => 'text-danger')); ?></div>
			</div>

			<div class="form-group row pl-4">
				<div class="col-sm-12"><?php echo $form->labelEx($model, 'lock_question'); ?></div>
				<div class="col-sm-12"><?php echo $form->dropDownList($model, 'lock_question', [0 => 'No', 1 => 'Yes'], array('class' => 'form-control')); ?></div>
				<div class="col-sm-12"><?php echo $form->error($model, 'lock_question', array('class' => 'text-danger')); ?></div>
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
				<div class="col-sm-12"><?php echo $form->error($model, 'availability_date', array('class' => 'text-danger')); ?></div>
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
				<div class="col-sm-12"><?php echo $form->error($model, 'due_date', array('class' => 'text-danger')); ?></div>
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
				<div class="col-sm-12"><?php echo $form->error($model, 'lock_date', array('class' => 'text-danger')); ?></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="col-sm-12"><?php echo $form->labelEx($model, 'questions'); ?></div>
			<?php
			for ($i = 0; $i < count($model->questions); $i++) { ?>
				<div class="row  pl-4 pr-4">
					<?php echo $form->hiddenField($model, "questions[$i][id]"); ?>
					<div class="col-sm-3"><?php echo $form->dropDownList($model, "questions[$i][competency]", SubjectCompetency::dataList($model->subject_id), array('empty' => '-Select Subject Competency-', 'class' => 'form-control')); ?></div>
					<div class="col-sm-3"><?php echo $form->dropDownList($model, "questions[$i][taxonomy]", QuestionTaxonomy::dataList(), array('empty' => '-Select Question Taxonomy-', 'class' => 'form-control')); ?></div>
					<div class="col-sm-3"><?php echo $form->textField($model, "questions[$i][questionNo]", array('class' => 'form-control', 'placeholder' => 'Add number of Questions to be generated')); ?></div>
				</div>
			<?php }	?>
			<div class="col-sm-12"><?php echo $form->error($model, 'questions', array('class' => 'text-danger')); ?></div>
		</div>
	</div>

	<div class="row buttons">
		<div class="col-sm-12"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></div>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->