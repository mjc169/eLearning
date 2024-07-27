<?php
/* @var $this SectionController */
/* @var $data Section */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('subject_id')); ?>:</b>
	<?php echo CHtml::encode('[' . $data->subject->subject . '] - ' . $data->subject->subject); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('teacher_id')); ?>:</b>
	<?php echo CHtml::encode($data->teacher->getFullName()); ?>
	<br />


</div>