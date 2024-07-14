<?php
/* @var $this StudentController */
/* @var $student Student */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'student-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false,
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary(array($account, $student), null, null, array('class' => 'card border-left-danger shadow h-100 py-2 pl-4 mb-4')); ?>

	<legend>Account:</legend>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group row pl-4">
				<div class="col-sm-12"><?php echo $form->labelEx($account, 'username'); ?></div>
				<div class="col-sm-12"><?php echo $form->textField($account, 'username', array('class' => 'form-control', 'size' => 60, 'maxlength' => 128)); ?></div>
				<div class="col-sm-12"><?php echo $form->error($account, 'username', array('class' => 'text-danger')); ?></div>
			</div>

			<div class="form-group row pl-4">
				<div class="col-sm-12"><?php echo $form->labelEx($account, 'password'); ?></div>
				<div class="col-sm-12"><?php echo $form->passwordField($account, 'password', array('class' => 'form-control', 'size' => 60, 'maxlength' => 128)); ?></div>
				<div class="col-sm-12"><?php echo $form->error($account, 'password', array('class' => 'text-danger')); ?></div>
			</div>

			<div class="form-group row pl-4">
				<div class="col-sm-12"><?php echo $form->labelEx($account, 'email_address'); ?></div>
				<div class="col-sm-12"><?php echo $form->textField($account, 'email_address', array('class' => 'form-control', 'size' => 60, 'maxlength' => 128)); ?></div>
				<div class="col-sm-12"><?php echo $form->error($account, 'email_address', array('class' => 'text-danger')); ?></div>
			</div>

			<legend>Student Information:</legend>

			<div class="form-group row pl-4">
				<div class="col-sm-12"><?php echo $form->labelEx($student, 'lastname'); ?></div>
				<div class="col-sm-12"><?php echo $form->textField($student, 'lastname', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?></div>
				<div class="col-sm-12"><?php echo $form->error($student, 'lastname', array('class' => 'text-danger')); ?></div>
			</div>

			<div class="form-group row pl-4">
				<div class="col-sm-12"><?php echo $form->labelEx($student, 'firstname'); ?></div>
				<div class="col-sm-12"><?php echo $form->textField($student, 'firstname', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?></div>
				<div class="col-sm-12"><?php echo $form->error($student, 'firstname', array('class' => 'text-danger')); ?></div>
			</div>

			<div class="form-group row pl-4">
				<div class="col-sm-12"><?php echo $form->labelEx($student, 'middlename'); ?></div>
				<div class="col-sm-12"><?php echo $form->textField($student, 'middlename', array('class' => 'form-control', 'size' => 60, 'maxlength' => 255)); ?></div>
				<div class="col-sm-12"><?php echo $form->error($student, 'middlename', array('class' => 'text-danger')); ?></div>
			</div>

			<div class="form-group row pl-4">
				<div class="col-sm-12"><?php echo $form->labelEx($student, 'gender'); ?></div>
				<div class="col-sm-12"><?php echo $form->dropDownList($student, 'gender', Account::genderList(), array('empty' => Yii::t('app', '-Gender-'), 'class' => 'form-control')); ?></div>
				<div class="col-sm-12"><?php echo $form->error($student, 'gender', array('class' => 'text-danger')); ?></div>
			</div>

			<div class="form-group row pl-4">
				<div class="col-sm-12"><?php echo $form->labelEx($student, 'year_level'); ?></div>
				<div class="col-sm-12"><?php echo $form->dropDownList($student, 'year_level', YearLevel::dataList(), array('empty' => Yii::t('app', '-Year Level-'), 'class' => 'form-control')); ?></div>
				<div class="col-sm-12"><?php echo $form->error($student, 'year_level', array('class' => 'text-danger')); ?></div>
			</div>

			<div class="form-group row pl-4">
				<div class="col-sm-12"><?php echo $form->labelEx($student, 'section'); ?></div>
				<div class="col-sm-12"><?php echo $form->dropDownList($student, 'section', Section::dataList(), array('empty' => Yii::t('app', '-Section-'), 'class' => 'form-control')); ?></div>
				<div class="col-sm-12"><?php echo $form->error($student, 'section', array('class' => 'text-danger')); ?></div>
			</div>
		</div>
	</div>


	<div class="row buttons">
		<div class="col-sm-12"><?php echo CHtml::submitButton($student->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary btn-user')); ?></div>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->