<?php
/* @var $this AccountController */
/* @var $model Account */

$this->breadcrumbs = array(
	'Accounts' => array('index'),
	'Create Account',
);

$this->menu = array(
	array('label' => 'List Account', 'url' => array('index')),
);
?>

<h1>Create Account</h1>

<?php $this->renderPartial('_form', array(
	'account' => $account,
)); ?>