<?php
/* @var $this AccountController */
/* @var $model Account */

$this->breadcrumbs = array(
	'Accounts' => array('index'),
	$model->id,
);

$this->menu = array(
	array('label' => 'List Teacher Subject', 'url' => array('indexTeacherSubject')),
	array('label' => 'Assign Teacher Subject', 'url' => array('assignSubject')),
	array('label' => 'Unassign Teacher Subject', 'url' => '#', 'linkOptions' => array('submit' => array('deleteAssignedSubject', 'teacher_subject_id' => $model->id), 'confirm' => 'Are you sure you want to unassign this subject to the teacher?')),
);
?>

<h1>View Teacher's Subject ID: #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
		'id',
		'subject.subject_code',
		'subject.subject',
		array(
			'name' => 'Teacher Fullname',
			'value' => function ($data) {
				return $data->teacher->getFullName();
			},
		),
	),
)); ?>