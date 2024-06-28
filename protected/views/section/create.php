<?php
/* @var $this SectionController */
/* @var $model Section */

$this->breadcrumbs = array(
	'Sections' => array('index'),
	'Create',
);

$this->menu = array(
	array('label' => 'List Section', 'url' => array('index')),
);
?>

<h1>Create Section</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>