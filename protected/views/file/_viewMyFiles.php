<?php
/* @var $this StudentController */
/* @var $data Student */
?>

<tr class="view">

	<td>
		<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	</td>

	<td>
		<?php echo CHtml::encode($data->original_filename); ?>
	</td>

	<td>
		<?php echo FileAssignment::listOfReceivers($data->id) ?>
	</td>

	<td>
		<?php echo CHtml::link("Download File", array('download', 'id' => $data->id), array("target" => "_blank")); ?> |
		<?php echo CHtml::link("Download as Base64", $data->bvalue, array("download" => $data->original_filename, "target" => "_blank")); ?>
	</td>

	<td>
		<?php echo CHtml::link("Share File", array('assignFiles', 'id' => $data->id)); ?>
	</td>
</tr>