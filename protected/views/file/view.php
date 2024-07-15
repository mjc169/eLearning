<?php
/* @var $this FileController */
/* @var $model File */

$this->breadcrumbs=array(
	'Files'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List File', 'url'=>array('index')),
	array('label'=>'Create File', 'url'=>array('create')),
	array('label'=>'Update File', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete File', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage File', 'url'=>array('admin')),
);
?>

<h1>View File #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
			'label' => 'Uploader',
			'value' => $model->uploader->getFullName(),
		  ),
		'original_filename',
		'file_extension',
		'e_filename',
		array(
			'label' => 'Status',
			'value' => $model->getStatusLabel(),
		  ),
		array(
			'label' => 'Base64 Value',
			'type' => 'raw',
			'value' => '<textarea id="bvalue_copy" rows="10" readonly>'.$model->bvalue.'</textarea>',
		  ),
	),
)); ?>

You can use <a href="https://base64.guru/converter/decode/file" target="_blank">Base64.guru - Base64 to File</a> to decode the Base64 Value.


<script>
$(document).ready(function() {

	function copyToClipboard(text) {
		const dummyTextArea = document.createElement('textarea');
		dummyTextArea.value = text;
		document.body.appendChild(dummyTextArea);
		dummyTextArea.select();
		document.execCommand('copy');
		document.body.removeChild(dummyTextArea);

		alert('BValue Text copied to clipboard!');
	}

	$('#bvalue_copy').on("click", function(event) {
		copyToClipboard($(this).val());
	});
});
</script>