<h1>My Class List</h1>

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
						<th>Subject</th>
						<th>No of Students</th>
						<th>Teacher</th>
					</tr>
				</thead>
				<tbody>

					<?php foreach ($classLists as $subject_id => $data) : ?>
						<tr class="view">

							<td>

								<?php echo $subject_id; ?>
							</td>

							<td>
								<?php echo CHtml::encode("[" . $data['subject']->subject_code . "]" . $data['subject']->subject);
								?>
							</td>

							<td>
								<?php echo CHtml::encode(count($data['students'])); ?>
							</td>

							<td>
								<?php echo $data['teacher']->getFullName(); ?>
							</td>

						</tr>
					<?php endforeach; ?>
				</tbody>

			</table>
		</div>
	</div>
</div>