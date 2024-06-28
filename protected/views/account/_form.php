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

	<?php echo $form->errorSummary(array($account, $relatedModel)); ?>

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

		<div class="row">
			<?php echo $form->labelEx($account, 'account_type'); ?>
			<?php echo $form->dropDownList($account, 'account_type', array(Account::ACCOUNT_TYPE_ADMIN => 'Admin', Account::ACCOUNT_TYPE_TEACHER => 'Teacher', Account::ACCOUNT_TYPE_STUDENT => 'Student')); ?>
			<?php echo $form->error($account, 'account_type'); ?>
		</div>
	</fieldset>

	<div id="partial-form">

	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($account->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
	$(document).ready(function() {
		const formData = <?php echo json_encode($_POST ?? []); ?>;

		$('#Account_account_type').on("change", function(event) {
			const thisVal = parseInt($(this).val());

			$('#partial-form').html("");

			const isAdmin = thisVal === <?php echo Account::ACCOUNT_TYPE_ADMIN; ?>;
			const isTeacher = thisVal === <?php echo Account::ACCOUNT_TYPE_TEACHER; ?>;
			const isStudent = thisVal === <?php echo Account::ACCOUNT_TYPE_STUDENT; ?>;

			if (isTeacher) {
				renderTeacher(formData);
			} else if (isStudent) {
				renderPartialStudent(formData);
			}
		});

		$('#Account_account_type').trigger("change");
	});

	function renderPartialStudent(formData) {

		$.ajax({
			url: '<?php echo Yii::app()->createUrl('account/studentFormPartial', array('id' => $account->id)); ?>',
			type: 'POST', // Adjust based on your controller action
			data: formData,
			success: function(response) {
				$('#partial-form').html(response);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.error('Error updating partial:', textStatus, errorThrown);
				// Handle errors appropriately, e.g., display an error message
			}
		});
	}

	function renderTeacher(formData) {
		$.ajax({
			url: '<?php echo Yii::app()->createUrl('account/teacherFormPartial', array('id' => $account->id)); ?>',
			type: 'POST', // Adjust based on your controller action
			data: formData,
			success: function(response) {
				$('#partial-form').html(response);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.error('Error updating partial:', textStatus, errorThrown);
				// Handle errors appropriately, e.g., display an error message
			}
		});
	}
</script>