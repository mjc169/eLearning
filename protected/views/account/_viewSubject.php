<?php
/* @var $this SectionController */
/* @var $data Section */
?>

<div class="view">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
			<?php echo CHtml::link(CHtml::encode($data->id), array('viewTeacherSubject', 'id' => $data->id)); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('subject_id')); ?>:</b>
			<?php echo CHtml::encode('[' . $data->subject->subject_code . '] - ' . $data->subject->subject); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('teacher_id')); ?>:</b>
			<?php echo CHtml::encode($data->teacher->getFullName()); ?>
			<br />


		</div>
	</div>
</div>