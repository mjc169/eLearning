<?php
$this->breadcrumbs = array(
	'Teacher Subject',
);

$this->menu = array(
	array('label' => 'Assign Teacher Subject', 'url' => array('assignSubject')),
);
?>

<h1>Teachers - Assigned Subjects</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider' => $dataProvider,
	'itemView' => '_viewSubject',
)); ?>