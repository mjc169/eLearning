<?php
/* @var $this QuestionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
	'My Files',
);
?>

<h1>My Files</h1>

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
						<th>Shared To</th>
						<th>Download</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $this->widget('zii.widgets.CListView', array(
						'dataProvider' => $dataProvider,
						'itemView' => '_viewMyFiles',
					)); ?>
				</tbody>
			</table>
		</div>
	</div>
</div>