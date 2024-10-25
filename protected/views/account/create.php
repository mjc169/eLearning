<div class="row">
	<div class="col-sm-12 col-lg-8">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Add New Account</h6>
			</div>
			<div class="card-body">
				<?php $this->renderPartial('_formAccount', array(
					'account' => $account,
					'relatedModel' => $relatedModel,
				)); ?>
			</div>
		</div>
	</div>
</div>

<?php $this->widget('AdminDataTable'); ?>
<?php $this->widget('StudentDataTable'); ?>
<?php $this->widget('TeacherDataTable'); ?>