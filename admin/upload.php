<?php

error_reporting (E_ALL ^ E_NOTICE);

include_once('header1.php');

$upload_path = "../kokan/cropimage/upload_images/";				
$upload_path1 = "/kokan/cropimage/upload_images/";		
$thumb_width = "150";						
$thumb_height = "150";						


function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale){
	list($imagewidth, $imageheight, $imageType) = getimagesize($image);
	$imageType = image_type_to_mime_type($imageType);
	
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	switch($imageType) {
		case "image/gif":
			$source=imagecreatefromgif($image); 
			break;
	    case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
			$source=imagecreatefromjpeg($image); 
			break;
	    case "image/png":
		case "image/x-png":
			$source=imagecreatefrompng($image); 
			break;
  	}
	imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);
	switch($imageType) {
		case "image/gif":
	  		imagegif($newImage,$thumb_image_name); 
			break;
      	case "image/pjpeg":
		case "image/jpeg":
		case "image/jpg":
	  		imagejpeg($newImage,$thumb_image_name,100); 
			break;
		case "image/png":
		case "image/x-png":
			imagepng($newImage,$thumb_image_name);  
			break;
    }
	chmod($thumb_image_name, 0777);
	return $thumb_image_name;
}



if (isset($_POST["upload_thumbnail"])) {

	$filename = $_POST['filename'];

	$large_image_location = $upload_path.$_POST['filename'];
    $thumb_image_location = $upload_path."thumb_".$_POST['filename'];

	$x1 = $_POST["x1"];
	$y1 = $_POST["y1"];
	$x2 = $_POST["x2"];
	$y2 = $_POST["y2"];
	$w = $_POST["w"];
	$h = $_POST["h"];
	
	$scale = $thumb_width/$w;
	$cropped = resizeThumbnailImage($thumb_image_location, $large_image_location,$w,$h,$x1,$y1,$scale);
	 $newpat= $_POST['filename'];
    $query="INSERT INTO `gk_slider` (`image`) VALUES ('".$thumb_image_location."')";
    mysql_query($query);
	//header("location:".$_SERVER["PHP_SELF"]);
	setSessionMsg('Record Added Successfully');
			?>
			<script type="text/javascript">
			var newLocation = "<?php echo 'show_image.php'; ?>";
			window.location = newLocation;   
			</script>
			<?php
	exit();
}

?>

<link rel="stylesheet" type="text/css" href="../cropimage/css/cropimage.css" />
<link type="text/css" href="../cropimage/css/imgareaselect-default.css" rel="stylesheet" />
<script type="text/javascript" src="../cropimage/js/jquery.min.js"></script>
<script type="text/javascript" src="../cropimage/js/jquery.form.js"></script>
<script type="text/javascript" src="../cropimage/js/jquery.imgareaselect.js"></script>

<script type="text/javascript" >
    $(document).ready(function() {
        $('#submitbtn').click(function() {
            $("#viewimage").show();
            $("#viewimage").html('');
            $("#viewimage").html('<img src="../cropimage/images/loading.gif" style="padding: 150px;"/>');
            $(".uploadform").ajaxForm({
            	url: '../kokan/cropimage/upload.php',
                success:    showResponse 
            }).submit();
        });
    });
    
    function showResponse(responseText, statusText, xhr, $form){
		$('.crop_preview_right').show();
		if(responseText.indexOf('.')>0){
			$('#thumbviewimage').html('<img src="<?php echo $upload_path1; ?>'+responseText+'"   style="position: relative;" alt="Thumbnail Preview" />');
	    	$('#viewimage').html('<img class="preview" alt="" src="<?php echo $upload_path1; ?>'+responseText+'"   id="thumbnail" />');
	    	$('#filename').val(responseText); 
			$('#thumbnail').imgAreaSelect({  aspectRatio: '1:1', handles: true  , onSelectChange: preview });
		}else{
			$('#thumbviewimage').html(responseText);
	    	$('#viewimage').html(responseText);
		}
    }
    
</script>

<script type="text/javascript">
function preview(img, selection) { 
	var scaleX = <?php echo $thumb_width;?> / selection.width; 
	var scaleY = <?php echo $thumb_height;?> / selection.height; 

	$('#thumbviewimage > img').css({
		width: Math.round(scaleX * img.width) + 'px', 
		height: Math.round(scaleY * img.height) + 'px',
		marginLeft: '-' + Math.round(scaleX * selection.x1) + 'px', 
		marginTop: '-' + Math.round(scaleY * selection.y1) + 'px' 
	});
	
	var x1 = Math.round((img.naturalWidth/img.width)*selection.x1);
	var y1 = Math.round((img.naturalHeight/img.height)*selection.y1);
	var x2 = Math.round(x1+selection.width);
	var y2 = Math.round(y1+selection.height);
	
	$('#x1').val(x1);
	$('#y1').val(y1);
	$('#x2').val(x2);
	$('#y2').val(y2);	
	
	$('#w').val(Math.round((img.naturalWidth/img.width)*selection.width));
	$('#h').val(Math.round((img.naturalHeight/img.height)*selection.height));
	
} 

$(document).ready(function () { 
	$('#save_thumb').click(function() {
		var x1 = $('#x1').val();
		var y1 = $('#y1').val();
		var x2 = $('#x2').val();
		var y2 = $('#y2').val();
		var w = $('#w').val();
		var h = $('#h').val();
		if(x1=="" || y1=="" || x2=="" || y2=="" || w=="" || h==""){
			alert("Please Make a Selection First");
			return false;
		}else{
			return true;
		}
	});
}); 

$(document).ready(function(){
    $("input[type=file]").change(function(){
		$("#viewimage").html('');
        $("#viewimage").html('<img src="images/loading.gif" style="padding: 150px;"/>');
        setTimeout(function(){
			$("#submitbtn").click()
		}, 1000); 
    });
});
</script>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slider images</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Add Slider images
                            </div>
							<center><div style="color:red;">
											<?php 
												if(isset($error)) 
												{ 
													echo $error; 
												} 
											?>
											</div></center>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">


<form class="uploadform" id="uploadform" method="post" enctype="multipart/form-data" action='upload.php' name="photo">	
	<div class="crop_set_upload">
		<div class="crop_upload_label">Upload files: </div>
		<div class="crop_select_image">
			<div class="file_browser">
				<input type="file" name="imagefile" id="imagefile" class="hide_broswe" />
			</div>
		</div>
		<div class="crop_select_image"><input type="submit" value="Upload" style="display:none;" class="upload_button" name="submitbtn" id="submitbtn" /></div>
	</div>
</form>			
		<div class="crop_set_preview">
			<div class="crop_preview_left"> 
				<div class="crop_preview_box_big"  style="display:none;" id='viewimage'> 
					
				</div>
			</div>
			<div class="crop_preview_right" style="display:none;">
				Preview (150x150 px)
				<div class="crop_preview_box_small" id='thumbviewimage' style="position:relative; overflow:hidden;"> </div>
				
				<form name="thumbnail" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
					<input type="hidden" name="x1" value="" id="x1" />
					<input type="hidden" name="y1" value="" id="y1" />
					<input type="hidden" name="x2" value="" id="x2" />
					<input type="hidden" name="y2" value="" id="y2" />
					<input type="hidden" name="w" value="" id="w" />
					<input type="hidden" name="h" value="" id="h" />
					<input type="hidden" name="wr" value="" id="wr" />
					
					<input type="text" name="filename" value="" id="filename" />
					<div class="crop_preview_submit">
						<input type="submit" name="upload_thumbnail" value="Save Thumbnail" id="save_thumb" class="submit_button" /> </div>
				</form>
				
			</div>
		</div>
	

   </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/startmin.js"></script>

    </body>
</html>

