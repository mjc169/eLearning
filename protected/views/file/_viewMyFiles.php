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
		<?php echo CHtml::encode($data->getStatusLabel()); ?>
	</td>
	<td>
		<?php echo CHtml::link(CHtml::encode("View"), array('view', 'id' => $data->id)); ?>
	</td>
</tr>