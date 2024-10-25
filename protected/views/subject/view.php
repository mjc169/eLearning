<h1>View Subject #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
		'id',
		'subject_code',
		'subject',
		'description',
		'statusLabel',
	),
)); ?>
<br>
<?php echo CHtml::link(CHtml::encode("Back"), array('index', 'id' => $model->id), array('class' => 'btn btn-primary')); ?>