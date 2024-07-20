<?php
/* @var $this QuestionController */
/* @var $model Question */

$this->breadcrumbs = array(
	'Questions' => array('index'),
	'Create',
);

$this->menu = array(
	array('label' => 'List Question', 'url' => array('index')),
	array('label' => 'Manage Question', 'url' => array('admin')),
);
?>

<h1>Create Quiz</h1>

<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'precreate-question-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false,
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary(array($model), null, null, array('class' => 'card border-left-danger shadow h-100 py-2 pl-4 mb-4')); ?>

	<div class="row">
		<div class="col-sm-6">
			<div class="row">
				<div class="col-sm-12"><?php echo $form->labelEx($model, 'subjectId'); ?></div>
				<div class="col-sm-12"><?php echo $form->dropDownList($model, 'subjectId', Subject::dataList(), array('empty' => '-Select Subject-', 'style' => 'max-width: 500px;')); ?></div>
				<div class="col-sm-12"><?php echo $form->error($model, 'subjectId', array('class' => 'text-danger')); ?></div>
			</div>
		</div>
	</div>
	<div class="row buttons">
		<div class="col-sm-12"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></div>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->