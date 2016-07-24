<?php
include_once('config.php');
include_once('header1.php');
?>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">

<script src="uploadifive/jquery.uploadifive.min.js"></script>
<link rel="stylesheet" type="text/css" href="uploadifive/uploadifive.css">
<style type="text/css">

#queue {
	/*border: 1px solid #E5E5E5;
	overflow: auto;
	max-height: 177px;*/
	padding: 0 3px 3px;
	width: 180px;
}
</style>

<script type="text/javascript">
						
	var siteroot='';
	//alert(siteroot);
	var ct=0;
	
	var theTotal=0;
	var attach_count = 0;
	var Total_image_size =0;
	var sizeof =0;
	<?php $timestamp = time();?>
	var tstamp = <?php echo $timestamp;?>;
	$(function() {
		
		$('#file_upload').uploadifive({	
            auto: true,			
			//'queueSizeLimit' : 2,
			'removeCompleted' : false,
			//'checkScript'      : 'uploadifive/check-exists.php',
			'formData'         : {
								   'timestamp' : '<?php echo $timestamp;?>',
								   'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
								 },
			'queueID'          	: 'queue',
			'onCancel' : function(file) {
				//When click on cancel button
				 jQuery('#display_image_name').val('');
				 //jQuery('#image_holder_contain').html(''); fname_size  fname_size
				 
			},
							
			'uploadScript'     	: 'uploadifive/uploadifive_most_visited.php',
			 'onSelect' : function(file) {
				
			 $("#wall_loader").show();
			 	jQuery("#wall_loader").css('display','block');
					//alert(2);
			
			}, 
			'onUploadComplete' 	: function(file, data) {
			//alert(data.trim());
			$("#wall_loader").hide();
			jQuery("#wall_loader").css('display','none');
			//alert(1);
			$("#image_holder_contain").show();
			
				ct++;
				Total_image_size = Number($('#imagetotalsize').val()) + Number(file.size);
				if(ct <= 10 && data.trim() != 'Error')
				{
					  if(Total_image_size < 10485760) {
							 sizeof = file.size;
							//alert(sizeof);
							theTotal = theTotal + sizeof;
							$('#imagetotalsize').val(theTotal);
					  }
					  
				}
				
				if(ct > 10)
				{
					showUDModalBox("Can't shared more than 10 media items");
					data="";
					// Below ct for images limit
					ct--;
					return false;
				}
			     else if(Total_image_size >= 10485760) {
						showUDModalBox("Files limit only 10 MB select files less then 10 MB");
						jQuery('#file_upload').uploadifive('clearQueue');
						return false;
				}
				else if(data.trim() != 'Error') {
					var str = data.trim();
					var pieces = str.split(".");
					var imagename_actual=pieces[pieces.length-1];
				
				
					
					var nowfile;
				if(imagename_actual=='docx' || imagename_actual=='DOCX' || imagename_actual=='doc' || imagename_actual=='DOC')
					nowfile = 'doc.jpg';
				else if(imagename_actual=='txt' || imagename_actual=='TXT')
					nowfile = 'txt.jpg';
				else if(imagename_actual=='PDF' || imagename_actual=='pdf' )
					nowfile = 'pdf.jpg';
				else if(imagename_actual=='xls' || imagename_actual=='XLS' || imagename_actual=='xlsx' || imagename_actual=='XLSX' || imagename_actual=='XLX' || imagename_actual=='XLX' || imagename_actual=='XLXS' || imagename_actual=='xlxs')
					nowfile = 'xls.jpg';
				else if(imagename_actual=='gif' || imagename_actual=='jpg' || imagename_actual=='png' || imagename_actual=='GIF' || imagename_actual=='JPG' || imagename_actual=='PNG' || imagename_actual=='jpeg' || imagename_actual=='JPEG')
					nowfile =(data.trim());
					
					
					$('#image_holder_contain').show();
					var text_fname = escape(file.name);
					text_fname = text_fname.split('.');
					str = file.name.replace(/\s/g, '');
					//var str = 'something -- something_else'; 
					var substr = str.split('.');
					//alert(substr[0]); 
					var matches = substr[0].match('/[^a-zA-Z0-9]/');
					
					//$('#display_image_name').val(data.trim());
					//var realHideContent='<input value="'+ data +'" name="fname[]" id="abcd" type="text">';
					var realHideContent='<input type="hidden" class="'+ct+"_"+matches+'" name="fname[]" value="'+ data +'" id="fname_ss_'+tstamp + '-' +text_fname[0]+'"/><input type="hidden"  name="fname_[]" value="'+ sizeof +'" class="single_image_hidden" id="fname_size_'+attach_count+'"/>';
				//	alert(realHideContent);
					$('#fname').append(realHideContent);
					//$("#image_holder_contain").append("<img src='"+siteroot+"uploads/" + data.trim() + "' height='120px' width='150px' />");
					$("#image_holder_contain").append('<div id="individual_attach_div_ss_'+tstamp + '-' +file.name+'" class="individual_attach_div"><img src="'+siteroot+"uploadifive/uploads/most_visted_place/" + nowfile + '" width="100" height="100" id="attach_doc_ss_'+tstamp + '-' +file.name+'"/><div class="delete_attachment" id="delete_attachment_ss_'+tstamp + '-' +ct+"_"+matches+'_count_'+attach_count+'"><i class="icon-remove white"></i></div><span id="temp_image" style="padding-right: 10px;"></span></div>');
					attach_count++;
					$('#queueError').html('');
					$('.filename').html(''); //hide image name
					$('.fileinfo').html(''); //hide image name
					$('#queue').hide();
				}
				else
				{
					$("#image_holder_contain").hide();
					$('.filename').html(''); //hide image name
					$('.fileinfo').html('');  //hide image name
					$('#queue').html(''); //hide loader clise button
					//showUDModalBox("Current file uploaded is invalid.\n\<br\> Files format allowed,\n\<br\> jpg,jpeg,gif,png,doc,docx,xls,pdf,xlsx,JPG,JPEG,DOCX,PDF,XLX,XLXS,txt");
					//showUDModalBox("Invalid File Format. File Formats Allowed::\n\<br\> jpg,jpeg,gif,png,doc,docx,xls,pdf,xlsx,JPG,JPEG,DOCX,PDF,XLX,XLXS,txt");
					jQuery('#file_upload').uploadifive('clearQueue');
				}
			
			},
			  /* onError: function (event, queueId, fileObj, errorObj) {
			   alert(1);
               alert(fileObj.size);
			   alert(100);
							
            } */
		 
		});
		
	});
										
								
										/* $(function() {
			var ct=0;
			var tstamp = <?php echo $timestamp;?>;
			//var tstamp ='<?php echo md5('unique_salt' . $timestamp);?>';
			var attach_count = 0;
			$('#id-input-file-2').uploadify({
				'formData'     : {
					'multi'      : true,
					'timestamp' : tstamp,
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>',
					'fileTypeExts' : '*.gif; *.jpg; *.png; *.docx; *.DOCX; *.doc; *.DOC; *.PDF; *.pdf; *.xls; *.xlsx; *.XLX; *.XLXS; *.txt'		
				},

				'onUploadComplete' : function(file) {
				ct++;
				//alert(ct);
				var nowfile;
				if(file.type=='.docx' || file.type=='.DOCX' || file.type=='.doc' || file.type=='.DOC' || file.type=='.txt')
					nowfile = 'doc.jpg';
				else if(file.type=='.PDF' || file.type=='.pdf' )
					nowfile = 'pdf.jpg';
				else if(file.type=='.xls' || file.type=='.xlsx' || file.type=='.XLX' || file.type=='.XLXS' )
					nowfile = 'xls.jpg';
				else if(file.type=='.gif' || file.type=='.jpg' || file.type=='.png')

					nowfile = tstamp + '-' +escape(file.name);
				else 
					
					return false;
				var text_fname = escape(file.name);
				text_fname = text_fname.split('.');
				$('#image_holder_contain').show();
				str = file.name.replace(/\s/g, '');
				//var str = 'something -- something_else'; 
				var substr = str.split('.');
				//alert(substr[0]); 
				var matches = substr[0].match('/[^a-zA-Z0-9]/');
				var realHideContent = '<input type="hidden" class="'+ct+"_"+matches+'" name="fname[]" value="'+tstamp + '-' +file.name+'" id="fname_ss_'+tstamp + '-' +text_fname[0]+'"/>';
				var picture_contain = '<div id="individual_attach_div_ss_'+tstamp + '-' +file.name+'" class="individual_attach_div"><img src=uploads/'+nowfile+' id="attach_doc_ss_'+tstamp + '-' +file.name+'"/><div class="delete_attachment" id="delete_attachment_ss_'+tstamp + '-' +ct+"_"+matches+'_count_'+attach_count+'"><i class="icon-remove white"></i></div><span id="temp_image" style="padding-right: 10px;"></span></div>';
				attach_count++;
				$('#image_holder_contain').append(picture_contain);
				$('#fname').append(trim(realHideContent));
        } ,
				'swf'      : 'uploadify.swf',
				'uploader' : 'uploadify_wall.php'
			});
		}); 
	 */
	 
	 //TO REMOVE THE ATTACH FILES FORM THE UPLODING QUEUE
	jQuery(document).on('click','.delete_attachment',function(){
		
		// Below ct for images limit
	 ct--;
		var delete_attach_file = this.id;
		//alert(delete_attach_file);
		delete_attach_file = delete_attach_file.split('_ss_');
		//alert(delete_attach_file[2]);
		var remove_attach_file_queue = delete_attach_file[1].split('_count_');
		var remove_dot_file = delete_attach_file[1].split('.');
		
		 jQuery(this).parent("div").remove();
	    
		 //for space remove start
		 var dbpat_imageremove= remove_attach_file_queue[0].replace( /\s/g, ""); 
		 var substr = dbpat_imageremove.substring(11).split('.');
		 var finelwala =  substr[0];
		 //alert(finelwala);
		 jQuery("."+finelwala).remove();
		  //for space remove end
		 jQuery('#fname_ss_'+remove_dot_file[0]).remove();
		
		 	//remove_dot_file = remove_dot_file.split('fname_size_');
			
		 jQuery('#SWFUpload_0_'+remove_attach_file_queue[1]).remove();
		 var attach_file_holder = jQuery('#image_holder_contain').html();
		 //alert(delete_attach_file[1]); 
		 /*  below code for images limit  */
		var imagesize=0;
		var singleimagesize=0;
		var multipeimagesize=0;
		var remove_total=0;
		
		 //remove_total= multipeimagesize-singleimagesize;
		 imagesize= delete_attach_file[1].split('_'); 
		 singleimagesize= $("#fname_size_"+imagesize[3]).val();
		 multipeimagesize= $('#imagetotalsize').val();
		 
		
		 remove_total= multipeimagesize-singleimagesize;
		 $('#imagetotalsize').val(multipeimagesize-singleimagesize);
		 
		 //$('#imagetotalsize').val(remove_total);
		 
		 $("#fname_size_"+imagesize[3]).remove();
		 theTotal=0;
		if(attach_file_holder=='')
		{
			jQuery('#image_holder_contain').hide();
			jQuery('#id-input-file-2-queue').remove();
		}
	});
	</script>				
<?php				
					$error ="";
						if(isset($_POST['submit']) && $_POST['submit'] !="")
						{
						 $placename= $_POST['placename'];
						 $description= $_POST['description'];
						 $address=$_POST['address'];
						  $location=$_POST['location'];
						 
							if($_POST['placename']=='')
							{
								$error= " Placename can not be empty";
							}
									
							else if($_POST['description']=='')
							{
								$error= "Description can not be empty";
							}
							else if($_POST['address']=='')
							{
								$error= "Address can not be empty";
							}
							else if($_POST['location']=='')
							{
								$error= "Location can not be empty";
							}
							else
							{
								if($error == "")
								{
									
									 $query="INSERT INTO `gk_most_visited_place` (`placename`, `description`, `address`, `location`) VALUES ('".$placename."','".$description."','".$address."','".$location."')";
									
									mysql_query($query);
									$id = mysql_insert_id();
								if(isset($_POST['fname']) && $_POST['fname'] !="")	
								{ 
										if(isset($_POST['fname']) && $_POST['fname'] !="")	
										{ 
											foreach($_POST['fname'] as $i => $name) 
											{ 
											// Get values from post.
											$name = mysql_real_escape_string($name);;
											//echo "<br/>";
											// Add to database
											$sql = "INSERT INTO `gk_place_images` (`p_id`, `image_name`) VALUES ('".$id."', '".$name."')";
											$result = mysql_query($sql);
											} 
										}
								}
									setSessionMsg('Record Added Successfully');
									?>
									<script type="text/javascript">
										var newLocation = "<?php echo 'most-visited-place-show.php'; ?>";
										window.location = newLocation;   
									</script>
									<?php
									exit();
								}
							}
							
						}
							
					?>
	
										<div>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><!--ADD--></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Add Most visited place Details
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
									

	<script>
	$.validator.setDefaults({
		submitHandler: function() {
			//alert("submitted!");
			$("#signupForm").submit();
			document.getElementById("signupForm").submit()
		}
	});

	$().ready(function() {

		// validate signup form on keyup and submit
		$("#signupForm").validate({
			rules: {
				placename: "required",
				description: {
					required: true,
					minlength: 10,
					maxlength: 500
				},
				address: "required",
				location: "required",
			},
			messages: {
				placename: "Please enter your Placename",
				description: {
					required: "Please enter a description",
					minlength: "Your description must consist of at least 10 characters",
					maxlength: "Your description must consist of at least 500 characters"
				},
				address: "Please enter your address",
				location: "Please enter your location",
			}
		});

	

		
	});
	</script>
	<style>
	
	.error{
	color:red;
	}
	</style>									
									
                                        <form role="form" name="submit" id="signupForm" METHOD="POST" action="">
										 
                                            <div class="form-group">
                                                <label>placename</label>
                                                <input class="form-control" name="placename" id="placename" placeholder="placename" value="" required>
												
                                            </div>
											
											<div class="form-group">
                                                <label>image</label>
											<div id="queueError" style="color:#ff0000;"></div>

											<input id="file_upload" name="file_upload" type="file" multiple="true">
											<input id="imagetotalsize" name="imagetotalsize" value="" type="hidden">
											<div class="margin_top5" id="image_holder_contain" style="display:none;" name="image_holder_contain"></div>
											<div id="queue"></div> 
											<div class="clear"></div>
											<div id="fname"></div>
<br/>	
                                            </div>
											
											<div class="form-group">
                                                <label>Description</label>
                                              <!--  <input class="form-control" name="description" id="description" placeholder="Description" value="" required>-->
											  <textarea class="form-control" rows="3"  name="description" id="description" placeholder="Description"><?php if(isset($_POST['description']) && $_POST['description'] !="") { echo $_POST['description']; }?></textarea>
                                            </div>
											<div class="form-group">
                                                <label>Address</label>
                                              <!--  <input class="form-control" name="address" id="address" placeholder="address" value="<?php if(isset($_POST['Address']) && $_POST['address'] !="") { echo $_POST['address']; }?>">-->
											  <textarea class="form-control" rows="3"  name="address" id="address" placeholder="address"><?php if(isset($_POST['address']) && $_POST['address'] !="") { echo $_POST['address']; }?></textarea>
                                            </div>
											
											
											
											
<script src="https://maps.google.com/maps/api/js?sensor=false&libraries=places&language=en-AU"></script>	
<script>
	geocoder = new google.maps.Geocoder();
	function codeAddress() {
		var address = document.getElementById("location").value;
		geocoder.geocode( { 'address': address}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) 
			{
				var lat = results[0].geometry.location.lat();
				var lag = results[0].geometry.location.lng();
				//alert("Lat : "+lat+", Lng : "+lag);
			} 
			else 
			{
				alert("Geocode was not successful for the following reason: " + status);
			}
		});
	}
</script>
<div class="form-group">
                                                <label>Location</label>
<input type="text" name="location" placeholder="Search location" id="location" onchange="codeAddress();" style="width:500px;">
</div>
<script>		
var autocomplete = new google.maps.places.Autocomplete($("#location")[0], {});
google.maps.event.addListener(autocomplete, 'place_changed', function() {
	var place = autocomplete.getPlace();
	//alert(place.address_components.toSource());
	console.log(place.address_components);
});
</script>
														
											
											
											
											
											
											
											
											
											
											
											<!--<div class="form-group">
                                                <label>Location</label>
                                                <input class="form-control" name="location" id="location" placeholder="Location" value="<?php if(isset($_POST['location']) && $_POST['location'] !="") { echo $_POST['location']; }?>">
                                            </div>-->
											<input type="submit" class="btn btn-info" name="submit" id="submit" value="submit">
                                            <button type="reset" class="btn btn-default" onclick="goBack()">Cancel</button>
                                        </form>
                                    </div>
<script>
function goBack() {
    window.history.back();
}
</script>									
                                    <!-- /.col-lg-6 (nested) -->
                                    
                                    <!-- /.col-lg-6 (nested) -->
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
