<!-- DataTalbes Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List of Teachers</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="teacherDataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email Address</th>
                        <th>Fullname</th>
                        <th>Gender</th>
                        <th>Date Created</th>
                        <th>Status</th>
                        <th>V</th>
                        <th>E</th>
                        <th>D</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataProvider->getData() as $data) { ?>
                        <!--Teacher-->
                        <tr>
                            <td><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?></td>
                            <td><?php echo CHtml::encode($data->username); ?></td>
                            <td><?php echo CHtml::encode($data->email_address); ?></td>
                            <td><?php echo CHtml::encode($data->getFullName()); ?></td>
                            <td><?php echo CHtml::encode($data->genderLabel); ?></td>
                            <td><?php echo CHtml::encode(date("M d, Y g:i a", strtotime($data->date_created))); ?></td>
                            <td><?php echo CHtml::encode($data->getStatusLabel()); ?></td>
                            <td>V</td>
                            <td>E</td>
                            <td>D</td>
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
        $('#teacherDataTable').DataTable();
    });
</script>