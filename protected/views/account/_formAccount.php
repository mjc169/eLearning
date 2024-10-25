<div class="form">
	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'account-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false,
	)); ?>
	<div class="row">
		<div class="col-sm-12 mb-2">
			<?php echo $form->errorSummary(array($account, $relatedModel), null, null, array('class' => 'card border-left-danger shadow h-100 py-2 pl-4 mb-4')); ?>
		</div>
		<div class="col-sm-6">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Account Information</h6>
				</div>
				<div class="card-body">
					<p class="note">Fields with <span class="required">*</span> are required.</p>

					<fieldset>
						<div class="row">
							<?php echo $form->labelEx($account, 'username'); ?>
							<?php echo $form->textField($account, 'username', array('size' => 60, 'maxlength' => 128, 'class' => 'form-control')); ?>
							<?php echo $form->error($account, 'username', array('class' => 'text-danger')); ?>
						</div>

						<div class="row">
							<?php echo $form->labelEx($account, 'password'); ?>
							<?php echo $form->passwordField($account, 'password', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
							<?php echo $form->error($account, 'password', array('class' => 'text-danger')); ?>
						</div>

						<div class="row">
							<?php echo $form->labelEx($account, 'email_address'); ?>
							<?php echo $form->textField($account, 'email_address', array('size' => 60, 'maxlength' => 128, 'class' => 'form-control')); ?>
							<?php echo $form->error($account, 'email_address', array('class' => 'text-danger')); ?>
						</div>

						<div class="row">
							<?php echo $form->labelEx($account, 'status'); ?>
							<?php echo $form->dropDownList($account, 'status', array('1' => 'Active', '0' => 'Inactive'), array('class' => 'form-control')); ?>
							<?php echo $form->error($account, 'status', array('class' => 'text-danger')); ?>
						</div>

						<div class="row">
							<?php echo $form->labelEx($account, 'account_type'); ?>
							<?php echo $form->dropDownList($account, 'account_type', array(Account::ACCOUNT_TYPE_ADMIN => 'Admin', Account::ACCOUNT_TYPE_TEACHER => 'Teacher', Account::ACCOUNT_TYPE_STUDENT => 'Student'), array('class' => 'form-control')); ?>
							<?php echo $form->error($account, 'account_type', array('class' => 'text-danger')); ?>
						</div>
					</fieldset>
				</div>
			</div>
		</div>
		<div class="col-sm-6 d-flex align-items-stretch">
			<div id="partial-form">
				<!--AJAX CONTENT -->
			</div>
		</div>
		<div class="col-sm-12 text-right">
			<?php echo CHtml::submitButton($account->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary btn-user')); ?>
		</div>
	</div>
	<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
	$(document).ready(function() {
		const formData = <?php echo json_encode($_POST ?? []); ?>;

		$('#Account_account_type').on("change", function(event) {
			const thisVal = parseInt($(this).val());

			$('#partial-form').html("" +
				"<div class=\"card shadow mb-4\">" +
				"<div class=\"card-header py-3\">" +
				"<h6 class=\"m-0 font-weight-bold text-primary\">User Information</h6>" +
				"</div>" +
				"<div class=\"card-body\">Additional field will be displayed here based on selected Account Type.</div>" +
				"</div>"
			);

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