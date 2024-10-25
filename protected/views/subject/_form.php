<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'subject-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false,
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary(array($model), null, null, array('class' => 'card border-left-danger shadow h-100 py-2 pl-4 mb-4')); ?>

	<div class="row">
		<div class="col-md-12">
			<div class="form-group row pl-4">
				<div class="col-sm-12"><?php echo $form->labelEx($model, 'subject_code'); ?></div>
				<div class="col-sm-12"><?php echo $form->textField($model, 'subject_code', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?></div>
				<div class="col-sm-12"><?php echo $form->error($model, 'subject_code', array('class' => 'text-danger')); ?></div>
			</div>

			<div class="form-group row pl-4">
				<div class="col-sm-12"><?php echo $form->labelEx($model, 'subject'); ?></div>
				<div class="col-sm-12"><?php echo $form->textField($model, 'subject', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?></div>
				<div class="col-sm-12"><?php echo $form->error($model, 'subject', array('class' => 'text-danger')); ?></div>
			</div>

			<div class="form-group row pl-4">
				<div class="col-sm-12"><?php echo $form->labelEx($model, 'description'); ?></div>
				<div class="col-sm-12"><?php echo $form->textField($model, 'description', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?></div>
				<div class="col-sm-12"><?php echo $form->error($model, 'description', array('class' => 'text-danger')); ?></div>
			</div>

			<div class="form-group row pl-4">
				<div class="col-sm-12"><?php echo $form->labelEx($model, 'status'); ?></div>
				<div class="col-sm-12"><?php echo $form->dropDownList($model, 'status', array('1' => 'Active', '0' => 'Inactive'), array('class' => 'form-control')); ?></div>
				<div class="col-sm-12"><?php echo $form->error($model, 'status'); ?></div>
			</div>

			<div class="col-md-12 text-right">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary btn-user')); ?>
			</div>
		</div>
	</div>
	<?php $this->endWidget(); ?>

</div><!-- form -->