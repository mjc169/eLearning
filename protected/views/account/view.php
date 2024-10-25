<h1>View Account #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
		'id',
		'username',
		'email_address',
		array(
			'name' => 'account_type',
			'value' => function ($data) {
				return $data->getAccountTypeLabel();
			},
		),
		array(
			'name' => 'status',
			'value' => function ($data) {
				return $data->getStatusLabel();
			},
		),
		'date_created',
		'date_updated',
	),
)); ?>