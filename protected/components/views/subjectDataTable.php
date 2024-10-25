<!-- DataTalbes Example -->
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">List of Subjects</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="subjectDataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th style="width: 150px;">Subject Code</th>
						<th style="width: 400px;">Subject</th>
						<th>Description</th>
						<th>Status</th>
						<th>V</th>
						<th>E</th>
						<th>D</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($dataProvider->getData() as $data) { ?>
						<!--ADMIN-->
						<tr>
							<td><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?></td>
							<td><?php echo CHtml::encode($data->subject_code); ?></td>
							<td><?php echo CHtml::encode($data->subject); ?></td>
							<td><?php echo CHtml::encode($data->description); ?></td>
							<td><?php echo CHtml::encode($data->getStatusLabel()); ?></td>
							<td><?php echo CHtml::link(CHtml::encode("V"), array('view', 'id' => $data->id)); ?></td>
							<td><?php echo CHtml::link(CHtml::encode("E"), array('update', 'id' => $data->id)); ?></td>
							<td>
								<?php
								echo CHtml::link('D', array('delete', 'id' => $data->id), array(
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
		$('#subjectDataTable').DataTable();
	});
</script>