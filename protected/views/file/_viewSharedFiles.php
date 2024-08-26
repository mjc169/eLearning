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
		<?php echo CHtml::link("Download File", array('download', 'id' => $data->file->id), array("target" => "_blank")); ?> |
		<?php echo CHtml::link("Download as Base64", $data->file->bvalue, array("download" => $data->file->original_filename, "target" => "_blank")); ?>
	</td>

	<td>
		n/a
	</td>
</tr>