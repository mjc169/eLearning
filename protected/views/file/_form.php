<?php
/* @var $this FileController */
/* @var $model File */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'file-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'uploader_id'); ?>
		<?php echo "ACCOUNT ID: ". $model->uploader_id; ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'original_filename'); ?>
		<?php echo $form->fileField($model,'original_filename'); ?>
		<?php echo $form->hiddenField($model, 'bvalue'); ?>
		<?php echo $form->error($model,'original_filename'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


<script>
$(document).ready(function() {

	const dataURLtoFile = (dataUrl, filename) => {
        const arr = dataUrl.split(",");
        const mime = arr[0].match(/:(.*?);/)[1];

		//const bstr = atob(arr[1]);
        //let n = bstr.length;
        //const u8arr = new Uint8Array(n);
        //while (n--) {
        //    u8arr[n] = bstr.charCodeAt(n);
        //}
        //return new File([u8arr], filename, { type: mime });
		//TO DO: Ask Adriane if Mime type is not needed for B64 decoding?
		return arr[1];
    };

	const toBase64 = file => new Promise((resolve, reject) => {
		const reader = new FileReader();
		reader.readAsDataURL(file);
		reader.onload = () => resolve(reader.result);
		reader.onerror = reject;
	});

	async function FileUploadToBase64() {
		const file = $('#File_original_filename').prop('files')[0];

		if (!file) {
			$("#File_bvalue").val("");
			return;
		}

		const toBase64Obj = await toBase64(file);
		$("#File_bvalue").val(dataURLtoFile(toBase64Obj));
	}

	$('#File_original_filename').on("change", async function(event) {
		
		await FileUploadToBase64();
	});
});
</script>