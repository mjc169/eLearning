<h1>My Quiz List</h1>

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
						<th>Title</th>
						<th>Time Limit</th>
						<th>Due Date</th>
						<th>Availability Date</th>
						<th>Lock date</th>
						<th>Score</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>

					<?php foreach ($quizzes as $quiz) : ?>
						<tr class="view">

							<td>

								<?php echo $quiz->id; ?>
							</td>

							<td>
								<?php $subject = $quiz->subject; ?>
								<?php echo CHtml::encode("[" . $subject->subject_code . "]" . $subject->subject);
								?>
							</td>

							<td>
								<?php echo CHtml::encode($quiz->title); ?>
							</td>

							<td>
								<?php echo CHtml::encode($quiz->time_limit); ?>
							</td>

							<td>
								<?php echo CHtml::encode($quiz->due_date); ?>
							</td>


							<td>
								<?php echo CHtml::encode($quiz->availability_date); ?>
							</td>

							<td>
								<?php echo CHtml::encode($quiz->lock_date); ?>
							</td>

							<td>
								Score
							</td>

							<td>
								Take Quiz | Unavailable | Locked
							</td>

						</tr>
					<?php endforeach; ?>
				</tbody>

			</table>
		</div>
	</div>
</div>