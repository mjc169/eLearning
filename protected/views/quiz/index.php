<?php
/* @var $this QuizController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
	'Quizzes',
);

$this->menu = array(
	array('label' => 'Create Quiz', 'url' => array('create')),
	array('label' => 'Manage Quiz', 'url' => array('admin')),
);
?>

<h1>Quizzes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider' => $dataProvider,
	'itemView' => '_view',
)); ?>