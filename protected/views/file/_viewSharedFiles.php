<?php
/* @var $this StudentController */
/* @var $data Student */
?>

<tr class="view">

	<td>
		<?php echo CHtml::link(CHtml::encode($data->file_id), array('view', 'id' => $data->file_id)); ?>
	</td>

	<td>
		<?php echo CHtml::encode($data->file->original_filename); ?>
	</td>

	<td>
		<?php echo CHtml::encode($data->file->uploader->getFullName("[Admin] " . $data->file->uploader->username)); ?>
	</td>

	<td>
		<?php echo CHtml::encode($data->status); ?>
	</td>
</tr>