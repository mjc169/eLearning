<?php
/* @var $this QuizController */
/* @var $model Quiz */

$this->breadcrumbs = array(
	'Quizzes' => array('index'),
	'Create',
);

$this->menu = array(
	array('label' => 'List Quiz', 'url' => array('index')),
	array('label' => 'Manage Quiz', 'url' => array('admin')),
);
?>

<h1>Create Quiz</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>