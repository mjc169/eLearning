<?php
/* @var $this StudentController */
/* @var $data Student */
?>

<tr class="view">

	<td>
		<?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:
		<?php echo CHtml::link(CHtml::encode($data->account_id), array('view', 'id' => $data->id)); ?>
	</td>

	<td>
		<?php echo CHtml::encode($data->lastname); ?>
	</td>

	<td>
		<?php echo CHtml::encode($data->firstname); ?>
	</td>

	<td>
		<?php echo CHtml::encode($data->middlename); ?>
	</td>

	<td>
		<?php echo CHtml::encode($data->gender); ?>
		<br />

	<td>
		<?php echo CHtml::encode($data->year_level); ?>
	</td>

	<td>
		<?php echo CHtml::encode($data->section); ?>
	</td>
</tr>