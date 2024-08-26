<?php /* @var $this Controller */ ?>
<?php if (!Yii::app()->user->isGuest && Yii::app()->user->account->isAccountType(Account::ACCOUNT_TYPE_STUDENT)) : ?>
	<?php $this->beginContent('//layouts/sp2-student'); ?>
<?php else: ?>
	<?php $this->beginContent('//layouts/sp2-main'); ?>
<?php endif; ?>

<div id="content">
	<?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>