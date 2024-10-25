<div class="row">
    <div class="col-sm-12 col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update Subject - ID: <?php echo $model->id; ?></h6>
            </div>
            <div class="card-body">
                <?php $this->renderPartial('_form', array('model' => $model)); ?>
            </div>
        </div>
    </div>
</div>

<?php $this->widget('SubjectDataTable'); ?>