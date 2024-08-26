<?php
/* @var $this SectionController */
/* @var $model Section */
/* @var $form CActiveForm */
?>

<div class="card shadow mb-4  col-sm-12">
	<div class="card-body">
		<div class="form">

			<?php $form = $this->beginWidget('CActiveForm', array(
				'id' => 'section-form',
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
						<div class="col-sm-12"><?php echo $form->labelEx($model, 'section_code'); ?></div>
						<div class="col-sm-12"><?php echo $form->textField($model, 'section_code', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?></div>
						<div class="col-sm-12"><?php echo $form->error($model, 'section_code', array('class' => 'text-danger')); ?></div>
					</div>

					<div class="form-group row pl-4">
						<div class="col-sm-12"><?php echo $form->labelEx($model, 'section'); ?></div>
						<div class="col-sm-12"><?php echo $form->textField($model, 'section', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?></div>
						<div class="col-sm-12"><?php echo $form->error($model, 'section', array('class' => 'text-danger')); ?></div>
					</div>

					<div class="form-group row pl-4">
						<div class="col-sm-12"><?php echo $form->labelEx($model, 'status'); ?></div>
						<div class="col-sm-12"><?php echo $form->dropDownList($model, 'status', array('1' => 'Active', '0' => 'Inactive'), array('class' => 'form-control')); ?></div>
						<div class="col-sm-12"><?php echo $form->error($model, 'status'); ?></div>
					</div>

					<div class="row buttons">
						<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary btn-user btn-block')); ?>
					</div>
				</div>
			</div>
			<?php $this->endWidget(); ?>

		</div><!-- form -->

	</div>
</div>