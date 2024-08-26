<?php
/* @var $this QuestionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
	'My Files',
);
?>

<h1>Files shared to me</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<!--<h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>-->
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Filename</th>
						<th>Owner Name</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>

					<?php $this->widget('zii.widgets.CListView', array(
						'dataProvider' => $dataProvider,
						'itemView' => '_viewSharedFiles',
					)); ?>
				</tbody>
			</table>
		</div>
	</div>
</div>