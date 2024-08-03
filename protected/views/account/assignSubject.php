<?php
$this->breadcrumbs = array(
	'Teacher Subject',
);

$this->menu = array(
	array('label' => 'View Teacher Subject', 'url' => array('viewTeacherSubject')),
);
?>

<h1>Assign Teacher Subject</h1>


<?php
/* @var $this FileController */
/* @var $model File */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'assign-class-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model);
	?>

	<div class="row">
		<div class="col-md-6">

			<div class="form-group row pl-4">
				<div class="col-sm-6"><?php echo $form->labelEx($model, 'subject_id'); ?></div>
				<div class="col-sm-6">
					<?php echo $form->dropDownList($model, 'subject_id', Subject::dataList(), array('empty' => Yii::t('app', '-Select Subject-'), 'class' => 'form-control', 'style' => 'width: 360px;')); ?>
				</div>
				<div class="col-sm-12"><?php echo $form->error($model, 'subject_id', array('class' => 'text-danger')); ?></div>
			</div>
			<div class="form-group row pl-4">
				<div class="col-sm-6"><?php echo $form->labelEx($model, 'teacher_id'); ?></div>
				<div class="col-sm-6">
					<?php echo $form->dropDownList($model, 'teacher_id', Account::dataList(Account::ACCOUNT_TYPE_TEACHER), array('empty' => Yii::t('app', '-Select Teacher-'), 'class' => 'form-control')); ?>
				</div>
				<div class="col-sm-12"><?php echo $form->error($model, 'teacher_id', array('class' => 'text-danger')); ?></div>
			</div>
		</div>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Assign Class'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->