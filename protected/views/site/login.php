<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
	'Login',
);
?>


<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-xl-10 col-lg-12 col-md-9">

			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
						<div class="col-lg-6">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h1 text-gray-900 mb-4">E-Learning</h1>
									<h4 class="h4 text-gray-900 mb-4">Welcome Back!</h4>
								</div>

								<?php $form = $this->beginWidget('CActiveForm', array(
									'id' => 'login-form',
									'enableClientValidation' => true,
									'clientOptions' => array(
										'validateOnSubmit' => true,
									),
									'htmlOptions' => array(
										'class' => 'user',
									)
								)); ?>

								<p class="note">Fields with <span class="required">*</span> are required.</p>

								<div class="form-group">
									<?php echo $form->labelEx($model, 'username'); ?>
									<?php echo $form->textField($model, 'username', array('class' => 'form-control form-control-user')); ?>
									<?php echo $form->error($model, 'username', array('class' => 'text-danger')); ?>
								</div>

								<div class="form-group">
									<?php echo $form->labelEx($model, 'password'); ?>
									<?php echo $form->passwordField($model, 'password', array('class' => 'form-control form-control-user')); ?>
									<?php echo $form->error($model, 'password', array('class' => 'text-danger')); ?>
								</div>

								<div class="form-group rememberMe">
									<div class="custom-control custom-checkbox small">
										<?php echo $form->checkBox($model, 'rememberMe', array('id' => 'customCheck', 'class' => 'custom-control-input')); ?>
										<?php echo $form->label($model, 'rememberMe', array('class' => 'custom-control-label', 'for' => 'customCheck')); ?>
										<?php echo $form->error($model, 'rememberMe', array('class' => 'text-danger')); ?>
									</div>
								</div>

								<p class="hint">
									Hint: You may login as: <br>
									Admin: <kbd>adrianec</kbd>/<kbd>test</kbd> <br>
									Teacher: <kbd>teacher1</kbd>/<kbd>test</kbd> <br>
									Student: <kbd>student1</kbd>/<kbd>test</kbd>
								</p>

								<div class="row buttons">
									<?php echo CHtml::submitButton('Login', array('class' => 'btn btn-primary btn-user btn-block')); ?>
								</div>
								<?php $this->endWidget(); ?>
								<hr>
								<div class="text-center">
									<a class="small" href="forgot-password.html">Forgot Password?</a>
								</div>
								<div class="text-center">
									<a class="small" href="register.html">Create an Account!</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>
</div>