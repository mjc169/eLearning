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

	<?php echo $form->errorSummary(array($account)); ?>

	<fieldset>
		<legend>Account</legend>

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

		<div class="row">
			<?php echo $form->labelEx($account, 'status'); ?>
			<?php echo $form->dropDownList($account, 'status', array('1' => 'Active', '0' => 'Inactive')); ?>
			<?php echo $form->error($account, 'status'); ?>
		</div>
	</fieldset>

	<div class="row buttons">
		<?php echo CHtml::submitButton($account->isNewRecord ? 'Create Admin' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->