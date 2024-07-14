<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs = array(
	'Students' => array('index'),
	$model->id,
);

$this->menu = array(
	array('label' => 'List Student', 'url' => array('index')),
	array('label' => 'Create Student', 'url' => array('create')),
	array('label' => 'Update Student', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete Student', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
	array('label' => 'Manage Student', 'url' => array('admin')),
);
?>

<h1>View Student #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
		'account_id',
		'account.username',
		'account.email_address',
		'lastname',
		'firstname',
		'middlename',
		array(
			'name' => 'gender',
			'value' => function ($data) {
				return $data->account->genderLabel;
			},
		),
		array(
			'name' => 'year_level',
			'value' => function ($data) {
				return $data->yearLevel->year_level;
			},
		),
		array(
			'name' => 'section',
			'value' => function ($data) {
				return $data->section0->section;
			},
		)
	),
)); ?>

<?php echo CHtml::link(CHtml::encode('Update Student'), array('student/update', 'id' => $model->id)); ?>