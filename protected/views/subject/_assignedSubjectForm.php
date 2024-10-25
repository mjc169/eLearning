<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'subject-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false,
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary(array($model), null, null, array('class' => 'card border-left-danger shadow h-100 py-2 pl-4 mb-4')); ?>

	<div class="row">
		<div class="col-md-12">
			<div class="form-group row pl-4">
				<div class="col-sm-6"><?php echo $form->labelEx($model, 'subject_id'); ?></div>
				<div class="col-sm-6">
					<?php echo $form->dropDownList($model, 'subject_id', Subject::dataList(), array('empty' => Yii::t('app', '-Select Subject-'), 'class' => 'form-control', 'style' => 'max-width: 400px;')); ?>
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

			<div class="col-md-12 text-right">
				<?php echo CHtml::submitButton('Assign Class', array('class' => 'btn btn-primary btn-user')); ?>
			</div>
		</div>
	</div>
	<?php $this->endWidget(); ?>

</div><!-- form -->