<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'account-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
)); ?>
<br>
<fieldset>
    <legend>Teacher Information:</legend>
    <div class="row">
        <?php echo $form->labelEx($teacher, 'lastname'); ?>
        <?php echo $form->textField($teacher, 'lastname', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
        <?php echo $form->error($teacher, 'lastname', array('class' => 'text-danger')); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($teacher, 'firstname'); ?>
        <?php echo $form->textField($teacher, 'firstname', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
        <?php echo $form->error($teacher, 'firstname', array('class' => 'text-danger')); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($teacher, 'middlename'); ?>
        <?php echo $form->textField($teacher, 'middlename', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
        <?php echo $form->error($teacher, 'middlename', array('class' => 'text-danger')); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($teacher, 'gender'); ?>
        <?php echo $form->dropDownList($teacher, 'gender', Account::genderList(), array('empty' => Yii::t('app', '-Gender-'), 'class' => 'form-control')); ?>
        <?php echo $form->error($teacher, 'gender', array('class' => 'text-danger')); ?>
    </div>
</fieldset>

<?php $this->endWidget(); ?>