<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'account-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
)); ?>

<fieldset>
    <legend>Teacher Information:</legend>
    <div class="row">
        <?php echo $form->labelEx($teacher, 'lastname'); ?>
        <?php echo $form->textField($teacher, 'lastname', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($teacher, 'lastname'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($teacher, 'firstname'); ?>
        <?php echo $form->textField($teacher, 'firstname', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($teacher, 'firstname'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($teacher, 'middlename'); ?>
        <?php echo $form->textField($teacher, 'middlename', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($teacher, 'middlename'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($teacher, 'gender'); ?>
        <?php echo $form->dropDownList($teacher, 'gender', Account::genderList(), array('empty' => Yii::t('app', '-Gender-'))); ?>
        <?php echo $form->error($teacher, 'gender'); ?>
    </div>
</fieldset>

<?php $this->endWidget(); ?>