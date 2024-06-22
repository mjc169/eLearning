<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs = array(
	'Students' => array('index'),
	'Create',
);

$this->menu = array(
	array('label' => 'List Student', 'url' => array('index')),
	array('label' => 'Manage Student', 'url' => array('admin')),
);
?>

<h1>Add Student</h1>

<?php $this->renderPartial('_form', array(
	'student' => $student,
	'account' => $account,
)); ?>