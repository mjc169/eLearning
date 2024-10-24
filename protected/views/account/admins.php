<!-- DataTalbes Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">List of Admins</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Email Address</th>
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
						$this->renderPartial('_viewAdmin', [
							'data' => $data
						]);
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	// Call the dataTables jQuery plugin
	$(document).ready(function() {
		$('#dataTable').DataTable();
	});
</script>