<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'question-form-make',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
    )); ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>

        <div class="row">
            <?php echo $form->labelEx($model, 'question'); ?>
            <?php echo $form->textArea($model, 'question', array('rows'=>3)); ?>
            <?php echo $form->error($model, 'question'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'choices'); ?> <br>
            <?php
            for ($i = 0; $i < count($model->choices); $i++) {
                echo $form->textField($model, "choices[$i]");
                echo "<br>";
            }
            ?>
            <?php echo $form->error($model, 'choices'); ?>
        </div>

        <div class="row buttons">
            <button type="submit">Submit</button>
        </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->