<?php
/* @var $this FileController */
/* @var $data File */
?>



<div class="view">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<!--<h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>-->
		</div>
		<div class="card-body">
			<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('uploader_id')); ?>:</b>
			<?php echo CHtml::encode($data->uploader->getFullName()); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('original_filename')); ?>:</b>
			<?php echo CHtml::encode($data->original_filename); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('file_extension')); ?>:</b>
			<?php echo CHtml::encode($data->file_extension); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('e_filename')); ?>:</b>
			<?php echo CHtml::encode($data->e_filename); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('bvalue')); ?>:</b>
			<?php echo CHtml::encode($data->shortenedBvalue); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
			<?php echo CHtml::encode($data->getStatusLabel()); ?>
			<br />

		</div>
	</div>



</div>