<?php /* @var $this Controller */ ?>
<?php if (!Yii::app()->user->isGuest && !Yii::app()->user->account->isAccountType(Account::ACCOUNT_TYPE_STUDENT)) : ?>
	<?php $this->beginContent('//layouts/sp2-student'); ?>
<?php else: ?>
	<?php $this->beginContent('//layouts/sp2-main'); ?>
<?php endif; ?>

<div class="row">
	<div class="span-19 col-md-8">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	<div class="span-5 last col-md-4">
		<?php if (!empty($this->menu)): ?>
			<div id="sidebar" class="bg-gradient-primary" style="border: 1px solid; padding: 10px; ">
				<?php
				$this->beginWidget('zii.widgets.CPortlet', array(
					'title' => 'Manage',
				));
				$this->widget('zii.widgets.CMenu', array(
					'items' => $this->menu,
					'htmlOptions' => array('class' => 'operations'),
				));
				$this->endWidget();
				?>
			</div><!-- sidebar -->
		<?php endif; ?>
	</div>
</div>
<?php $this->endContent(); ?>