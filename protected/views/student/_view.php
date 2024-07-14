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
		<?php echo CHtml::encode($data->account->genderLabel); ?>
		<br />

	<td>
		<?php echo CHtml::encode($data->yearLevel->year_level); ?>
	</td>

	<td>
		<?php echo CHtml::encode($data->section0->section_code); ?>
	</td>
</tr>