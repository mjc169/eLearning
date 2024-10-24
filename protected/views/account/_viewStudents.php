<!--Teacher-->
<tr>
	<td><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?></td>
	<td><?php echo CHtml::encode($data->username); ?></td>
	<td><?php echo CHtml::encode($data->email_address); ?></td>
	<td><?php echo CHtml::encode($data->getFullName()); ?></td>
	<td><?php echo CHtml::encode($data->genderLabel); ?></td>
	<td><?php echo CHtml::encode($data->getRelatedModel() ? $data->getRelatedModel()->yearLevel->year_level : ""); ?></td>
	<td><?php echo CHtml::encode($data->getRelatedModel() ? $data->getRelatedModel()->section0->section_code : ""); ?></td>
	<td><?php echo CHtml::encode(date("M d, Y g:i a", strtotime($data->date_created))); ?></td>
	<td><?php echo CHtml::encode($data->getStatusLabel()); ?></td>
	<td>V</td>
	<td>E</td>
	<td>D</td>
</tr>