<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<?php if (Yii::app()->user->isGuest) : ?>
	<p>Please login.</p>

	<?php echo CHtml::link("Login", array('site/login'), array('class' => 'btn btn-primary')); ?>
<?php endif; ?>