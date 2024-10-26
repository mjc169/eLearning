<h1>My Class List</h1>


<?php foreach ($studentsBySubject as $subject_code =>  $subjectData) : ?>
	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Subject: <?php echo $subject_code; ?></h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Teacher's Fullname</th>
							<th>Subject</th>
							<th>Student's Fullname</th>
							<th>D</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($subjectData['students'] as $studentData) : ?>
							<tr class="view">
								<td> <?php echo $subjectData['teacher']->getFullName(); ?> </td>
								<td> <?php echo CHtml::encode("[" . $subjectData['subject']->subject_code . "]" . $subjectData['subject']->subject); ?></td>
								<td> <?php echo $studentData->getFullName("[Admin]:" . $studentData->username); ?> </td>
								<td>D</td>
							</tr>
						<?php endforeach; ?>
					</tbody>

				</table>

			</div>
		</div>
	</div>
	<br>
<?php endforeach; ?>