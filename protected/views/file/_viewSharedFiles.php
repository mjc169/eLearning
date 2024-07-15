<?php
/* @var $this StudentController */
/* @var $data Student */
?>

<tr class="view">

	<td>
		<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	</td>

	<td>
		<?php echo CHtml::encode($data->file->original_filename); ?>
	</td>

	<td>
		<?php echo CHtml::encode($data->file->uploader->getFullName()); ?>
	</td>

	<td>
		<?php echo CHtml::encode($data->status); ?>
	</td>

	<td>
		<?php echo CHtml::link(CHtml::encode('Download'), array('download', 'id' => $data->id)); ?>
		/ <?php echo CHtml::link(CHtml::encode('Delete'), array('delete', 'id' => $data->id)); ?>
	</td>
</tr>