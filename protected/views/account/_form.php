<?php
/* @var $this AccountController */
/* @var $model Account */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'account-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false,
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'username'); ?>
		<?php echo $form->textField($model, 'username', array('size' => 60, 'maxlength' => 128)); ?>
		<?php echo $form->error($model, 'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'password'); ?>
		<?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 255)); ?>
		<?php echo $form->error($model, 'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'email_address'); ?>
		<?php echo $form->textField($model, 'email_address', array('size' => 60, 'maxlength' => 128)); ?>
		<?php echo $form->error($model, 'email_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'account_type'); ?>
		<?php echo $form->dropDownList($model, 'account_type', array(Account::ACCOUNT_TYPE_ADMIN => 'Admin', Account::ACCOUNT_TYPE_TEACHER => 'Teacher', Account::ACCOUNT_TYPE_STUDENT => 'Student')); ?>
		<?php echo $form->error($model, 'account_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'status'); ?>
		<?php echo $form->dropDownList($model, 'status', array('1' => 'Active', '0' => 'Inactive')); ?>
		<?php echo $form->error($model, 'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->