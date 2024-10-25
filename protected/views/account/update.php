<h1>Update Account <?php echo $account->id; ?></h1>

<?php $this->renderPartial('_form', array(
	'account' => $account,
	'relatedModel' => $relatedModel,
)); ?>