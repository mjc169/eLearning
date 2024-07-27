<?php
/* @var $this FileController */
/* @var $model File */

$this->breadcrumbs = array(
	'Files' => array('index'),
	'Assign Files',
);

$this->menu = array(
	array('label' => 'List File', 'url' => array('index')),
	array('label' => 'Manage File', 'url' => array('admin')),
);
?>

<h1>Assign File</h1>

<?php if (Yii::app()->user->hasFlash('success')) : ?>

	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('success'); ?>
	</div>

<?php else : ?>


	<?php
	/* @var $this FileController */
	/* @var $model File */
	/* @var $form CActiveForm */
	?>

	<div class="form">

		<?php $form = $this->beginWidget('CActiveForm', array(
			'id' => 'assign-file-form',
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
					<div class="col-sm-6"><?php echo $form->labelEx($model, 'file_id'); ?></div>
					<div class="col-sm-6">
						<?php echo $form->dropDownList($model, 'file_id', File::dataList(Yii::app()->user->account->id), array('empty' => Yii::t('app', '-Select the file you want to share-'), 'class' => 'form-control')); ?>

					</div>
					<div class="col-sm-12"><?php echo $form->error($model, 'file_id', array('class' => 'text-danger')); ?></div>
				</div>
				<div class="form-group row pl-4">
					<div class="col-sm-6"><?php echo $form->labelEx($model, 'receiver_id'); ?></div>
					<div class="col-sm-6">
						<?php echo $form->dropDownList($model, 'receiver_id', Account::dataList(), array('empty' => Yii::t('app', '-Select person to share the file-'), 'class' => 'form-control')); ?>
					</div>
					<div class="col-sm-12"><?php echo $form->error($model, 'receiver_id', array('class' => 'text-danger')); ?></div>
				</div>

				<div class="form-group row pl-4">
					<div class="col-sm-6"><?php echo $form->labelEx($model, 'teacher_class_subject_id'); ?></div>
					<div class="col-sm-6">
						<?php echo $form->dropDownList($model, 'teacher_class_subject_id', ClassAssignment::teacherClassSubjects(Yii::app()->user->account->id), array('empty' => Yii::t('app', '-Class Subject to share-'), 'class' => 'form-control')); ?>
					</div>
					<div class="col-sm-12"><?php echo $form->error($model, 'teacher_class_subject_id', array('class' => 'text-danger')); ?></div>
				</div>
			</div>
		</div>


		<div class="row buttons">
			<?php echo CHtml::submitButton('Share File'); ?>
		</div>

		<?php $this->endWidget(); ?>

	</div><!-- form -->

<?php endif; ?>