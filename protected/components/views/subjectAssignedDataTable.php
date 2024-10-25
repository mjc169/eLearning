<!-- DataTalbes Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">List of Assigned Subjects</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="assignedSubjectDataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Subject Code - Subject</th>
						<th>Teacher Full Name</th>
						<th>D</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($dataProvider->getData() as $data) { ?>
						<!--ADMIN-->
						<tr>
							<td><?php echo CHtml::encode($data->id); ?></td>
							<td><?php echo CHtml::encode('[' . $data->subject->subject_code . '] - ' . $data->subject->subject); ?></td>
							<td><?php echo CHtml::encode($data->teacher->getFullName()); ?></td>
							<td>
								<?php
								echo CHtml::link('D', array('deleteAssignedSubject', 'teacher_subject_id' => $data->id), array(
									'confirm' => 'Are you sure you want to delete this item?',
								));
								?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
	// Call the dataTables jQuery plugin
	$(document).ready(function() {
		$('#assignedSubjectDataTable').DataTable();
	});
</script>