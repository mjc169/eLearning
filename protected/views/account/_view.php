<?php
/* @var $this AccountController */
/* @var $data Account */
?>

<div class="view">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
			<?php echo CHtml::encode($data->username); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('email_address')); ?>:</b>
			<?php echo CHtml::encode($data->email_address); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('account_type')); ?>:</b>
			<?php echo CHtml::encode($data->getAccountTypeLabel()); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
			<?php echo CHtml::encode($data->getStatusLabel()); ?>
			<br />

			<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('date_created')); ?>:</b>
	<?php echo CHtml::encode($data->date_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_updated')); ?>:</b>
	<?php echo CHtml::encode($data->date_updated); ?>
	<br />

	*/ ?>

		</div>
	</div>
</div>