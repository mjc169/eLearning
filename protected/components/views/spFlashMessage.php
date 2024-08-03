<?php if (Yii::app()->user->hasFlash('success')) : ?>

    <div class="card bg-success text-white shadow">
        <div class="card-body">
            <?php echo Yii::app()->user->getFlash('success'); ?>
        </div>
    </div>

<?php endif; ?>

<?php if (Yii::app()->user->hasFlash('error')) : ?>

    <div class="card bg-danger text-white shadow">
        <div class="card-body">
            <?php echo Yii::app()->user->getFlash('error'); ?>
        </div>
    </div>

<?php endif; ?>