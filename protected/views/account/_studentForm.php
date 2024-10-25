<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'student-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
)); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Student Information:</h6>
    </div>
    <div class="card-body">

        <fieldset>
            <div class="row">
                <?php echo $form->labelEx($student, 'lastname'); ?>
                <?php echo $form->textField($student, 'lastname', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($student, 'lastname', array('class' => 'text-danger')); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($student, 'firstname'); ?>
                <?php echo $form->textField($student, 'firstname', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($student, 'firstname', array('class' => 'text-danger')); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($student, 'middlename'); ?>
                <?php echo $form->textField($student, 'middlename', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                <?php echo $form->error($student, 'middlename', array('class' => 'text-danger')); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($student, 'gender'); ?>
                <?php echo $form->dropDownList($student, 'gender', Account::genderList(), array('empty' => Yii::t('app', '-Gender-'), 'class' => 'form-control')); ?>
                <?php echo $form->error($student, 'gender', array('class' => 'text-danger')); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($student, 'year_level'); ?>
                <?php echo $form->dropDownList($student, 'year_level', YearLevel::dataList(), array('empty' => Yii::t('app', '-Year Level-'), 'class' => 'form-control')); ?>
                <?php echo $form->error($student, 'year_level', array('class' => 'text-danger')); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($student, 'section'); ?>
                <?php echo $form->dropDownList($student, 'section', Section::dataList(), array('empty' => Yii::t('app', '-Section-'), 'class' => 'form-control')); ?>
                <?php echo $form->error($student, 'section', array('class' => 'text-danger')); ?>
            </div>
        </fieldset>
    </div>
</div>
<?php $this->endWidget(); ?>