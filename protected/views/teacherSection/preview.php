<?php
/* @var $this StudentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
	'Students',
);

$this->menu = array(
	array('label' => 'Create Student', 'url' => array('create')),
	array('label' => 'Manage Student', 'url' => array('admin')),
);
?>

<h1>Class List</h1>

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
						<th>Section</th>
						<th>No of Students</th>
						<th>Student List</th>
					</tr>
				</thead>
				<tbody>

					<?php foreach ($sectionLists as $section_id => $data) : ?>
						<tr class="view">

							<td>

								<?php echo $section_id; ?>
							</td>

							<td>
								<?php echo CHtml::encode("[" . $data['section']->section_code . "]" . $data['section']->section);
								?>
							</td>

							<td>
								<?php echo CHtml::encode(count($data['students'])); ?>
							</td>

							<td>
								<?php echo Section::listOfStudents($data['students']); ?>
							</td>

						</tr>
					<?php endforeach; ?>
				</tbody>

			</table>
		</div>
	</div>
</div>