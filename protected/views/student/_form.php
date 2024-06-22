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

	<?php echo $form->errorSummary(array($account, $student)); ?>

	<fieldset>
		<legend>Account:</legend>

		<div class="row">
			<?php echo $form->labelEx($account, 'username'); ?>
			<?php echo $form->textField($account, 'username', array('size' => 60, 'maxlength' => 128)); ?>
			<?php echo $form->error($account, 'username'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($account, 'password'); ?>
			<?php echo $form->passwordField($account, 'password', array('size' => 60, 'maxlength' => 255)); ?>
			<?php echo $form->error($account, 'password'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($account, 'email_address'); ?>
			<?php echo $form->textField($account, 'email_address', array('size' => 60, 'maxlength' => 128)); ?>
			<?php echo $form->error($account, 'email_address'); ?>
		</div>
	</fieldset>

	<fieldset>
		<legend>Student Information:</legend>
		<div class="row">
			<?php echo $form->labelEx($student, 'lastname'); ?>
			<?php echo $form->textField($student, 'lastname', array('size' => 60, 'maxlength' => 255)); ?>
			<?php echo $form->error($student, 'lastname'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($student, 'firstname'); ?>
			<?php echo $form->textField($student, 'firstname', array('size' => 60, 'maxlength' => 255)); ?>
			<?php echo $form->error($student, 'firstname'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($student, 'middlename'); ?>
			<?php echo $form->textField($student, 'middlename', array('size' => 60, 'maxlength' => 255)); ?>
			<?php echo $form->error($student, 'middlename'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($student, 'gender'); ?>
			<?php echo $form->dropDownList($student, 'gender', Student::genderList(), array('empty' => Yii::t('app', '-Gender-'))); ?>
			<?php echo $form->error($student, 'gender'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($student, 'year_level'); ?>
			<?php echo $form->dropDownList($student, 'year_level', YearLevel::dataList(), array('empty' => Yii::t('app', '-Year Level-'))); ?>
			<?php echo $form->error($student, 'year_level'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($student, 'section'); ?>
			<?php echo $form->dropDownList($student, 'section', Section::dataList(), array('empty' => Yii::t('app', '-Section-'))); ?>
			<?php echo $form->error($student, 'section'); ?>
		</div>
	</fieldset>
	<div class="row buttons">
		<?php echo CHtml::submitButton($student->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->