<?php
/* @var $this AccountController */
/* @var $model Account */

$this->breadcrumbs = array(
	'Accounts' => array('index'),
	$model->id,
);

$this->menu = array(
	array('label' => 'List Account', 'url' => array('index')),
	array('label' => 'Create Account', 'url' => array('create')),
	array('label' => 'Update Account', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete Account', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
);
?>

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