<?php
/* @var $this QuizController */
/* @var $data Quiz */
?>

<div class="view">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
			<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
			<?php echo CHtml::encode($data->title); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('instructions')); ?>:</b>
			<?php echo CHtml::encode($data->instructions); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('time_limit')); ?>:</b>
			<?php echo CHtml::encode($data->time_limit); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('shuffle')); ?>:</b>
			<?php echo CHtml::encode($data->shuffle); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('limit_to_one')); ?>:</b>
			<?php echo CHtml::encode($data->limit_to_one); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('lock_question')); ?>:</b>
			<?php echo CHtml::encode($data->lock_question); ?>
			<br />

			<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('due_date')); ?>:</b>
	<?php echo CHtml::encode($data->due_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('availability_date')); ?>:</b>
	<?php echo CHtml::encode($data->availability_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lock_date')); ?>:</b>
	<?php echo CHtml::encode($data->lock_date); ?>
	<br />

	*/ ?>

		</div>
	</div>
</div>