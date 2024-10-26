<?php
/* @var $this QuizController */
/* @var $model Quiz */

$this->breadcrumbs = array(
	'Quizzes' => array('index'),
	$model->title => array('view', 'id' => $model->id),
	'Update',
);

$this->menu = array(
	array('label' => 'List Quiz', 'url' => array('index')),
	array('label' => 'Create Quiz', 'url' => array('create')),
	array('label' => 'View Quiz', 'url' => array('view', 'id' => $model->id)),
	array('label' => 'Manage Quiz', 'url' => array('admin')),
);
?>

<h1>Update Quiz <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>