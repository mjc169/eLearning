<h1>View Section #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
		'id',
		'section_code',
		'section',
		'statusLabel',
	),
)); ?>
<br>
<?php echo CHtml::link(CHtml::encode("Back"), array('index', 'id' => $model->id), array('class' => 'btn btn-primary')); ?>