<?php
/* @var $this StudentController */
/* @var $model Student */

$this->breadcrumbs = array(
	'Students' => array('index'),
	$student->id => array('view', 'id' => $student->id),
	'Update',
);

$this->menu = array(
	array('label' => 'List Student', 'url' => array('index')),
	array('label' => 'Add Student', 'url' => array('create')),
	array('label' => 'View Student', 'url' => array('view', 'id' => $student->id)),
	array('label' => 'Manage Student', 'url' => array('admin')),
);
?>

<h1>Update Student <?php echo $student->id; ?></h1>

<?php $this->renderPartial('_form', array(
	'student' => $student,
	'account' => $account,
)); ?>