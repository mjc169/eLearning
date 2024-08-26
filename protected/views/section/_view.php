<?php
/* @var $this SectionController */
/* @var $data Section */
?>

<div class="view">
	<div class="card shadow mb-4">
		<div class="card-header py-3">

			<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('section_code')); ?>:</b>
			<?php echo CHtml::encode($data->section_code); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('section')); ?>:</b>
			<?php echo CHtml::encode($data->section); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
			<?php echo CHtml::encode($data->getStatusLabel()); ?>
			<br />


		</div>
	</div>
</div>