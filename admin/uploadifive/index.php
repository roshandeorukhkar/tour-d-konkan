<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>UploadiFive Test</title>
<script src="jquery.min.js" type="text/javascript"></script>
<script src="jquery.uploadifive.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="uploadifive.css">
<style type="text/css">
body {
	font: 13px Arial, Helvetica, Sans-serif;
}
.uploadifive-button {
	float: left;
	margin-right: 10px;
}
#queue {
	border: 1px solid #E5E5E5;
	height: 177px;
	overflow: auto;
	margin-bottom: 10px;
	padding: 0 3px 3px;
	width: 300px;
}
</style>
</head>

<body>
	<h1>UploadiFive Demo</h1>
	<!--<form>
		<div id="queue"></div>
		<input id="file_upload" name="file_upload" type="file" multiple="true">
		<a style="position: relative; top: 8px;" href="javascript:$('#file_upload').uploadifive('upload')">Upload Files</a>
	</form>-->
<form>
<div id="queueError" style="color:#ff0000;"></div>
<!--<div id="queue" class="hideshowlivestream"></div>-->
<input id="file_upload" name="file_upload" type="file" multiple="true">
<span id="db_value"></span> 
<input value="" name="file_upload_img_name" id="display_image_name" type="hidden">
<div id="imageShow"></div>
</form>
	
	
	<script type="text/javascript">
		
jQuery(document).on('click','#uploadifive-file_upload',function(){ 
		$('a#close_livestream')[0].click();
});

<?php $timestamp = time();?>
$(function() {
		$('#file_upload').uploadifive({								
			//'queueSizeLimit' : 1,
			'multi'        : true,
			'removeCompleted' : false,
			//'checkScript'      : 'uploadifive/check-exists.php',
			'formData'         : {
								   'timestamp' : '<?php echo $timestamp;?>',
								   'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
								 },
			'onCancel' : function(file) {
				//When click on cancel button
				 jQuery('#display_image_name').val('');
				 jQuery('#imageShow').html('');
			},
				
	'uploadScript'     	: 'uploadifive.php',
	'onUploadComplete' 	: function(file, data) {
		//alert(11);
		
		$('#upload_button1').attr("style", "display: none !important");
		if(data.trim() != 'Error') {
			$('#display_image_name').val(data.trim());
			$("#imageShow").append("<img src='uploads/" + data.trim() + "' height='120px' width='150px' />");
			$('#queueError').html('');
			$('.filename').html(''); //hide image name
			$('.fileinfo').html(''); //hide image name
			
		}
		else
		{
			$('.filename').html(''); //hide image name
			$('.fileinfo').html('');  //hide image name
			$('#queue').html(''); //hide loader clise button
			$('#queueError').html('Invalid file type. Allowed only jpg,jpeg,gif,png,JPG,JPEG,tiff,TIFF,bmp,BMP');	
			jQuery('#file_upload').uploadifive('clearQueue');
		}
	
	}
 
});

});
	</script>
</body>
</html>