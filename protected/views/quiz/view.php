<?php
/* @var $this QuizController */
/* @var $model Quiz */

$this->breadcrumbs = array(
	'Quizzes' => array('index'),
	$model->title,
);

$this->menu = array(
	array('label' => 'List Quiz', 'url' => array('index')),
	array('label' => 'Create Quiz', 'url' => array('create')),
	array('label' => 'Update Quiz', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete Quiz', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
	array('label' => 'Manage Quiz', 'url' => array('admin')),
);
?>

<h1>View Quiz #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
		'id',
		'title',
		'instructions',
		'time_limit',
		'shuffle',
		'limit_to_one',
		'lock_question',
		'due_date',
		'availability_date',
		'lock_date',
	),
)); ?>