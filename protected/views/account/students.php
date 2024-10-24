<!-- DataTalbes Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">List of Students</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Email Address</th>
						<th>Fullname</th>
						<th>Gender</th>
						<th>Year Level</th>
						<th>Section</th>
						<th>Date Created</th>
						<th>Status</th>
						<th>V</th>
						<th>E</th>
						<th>D</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($dataProvider->getData() as $data) {
						$this->renderPartial('_viewStudents', [
							'data' => $data
						]);
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/sp2/vendor/datatables/jquery.dataTables.js"></script>
<script>
	// Call the dataTables jQuery plugin
	$(document).ready(function() {
		$('#dataTable').DataTable();
	});
</script>