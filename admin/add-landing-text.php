<?php
include_once('config.php');
include_once('header1.php');
?>

			

										
			
			<?php
													
					$error ="";
						if(isset($_POST['submit']) && $_POST['submit'] !="")
						{
						 $title = $_POST['title'];
						 $heading= $_POST['editor1'];
						
						 
						 
							if($_POST['title']=='')
							{
								$error= " Title Name can not be empty";
							}
									
							
							else if($_POST['editor1']=='')
							{
								$error= "Heading   can not be empty";
							}
							
							
							else
							{
								if($error == "")
								{
								 $query="INSERT INTO `gk_landing_text` (`title`, `heading`) VALUES ('".$title."','".$heading."')";
									
									mysql_query($query);
									 setSessionMsg('Record Added Successfully');	
									?>
									<script type="text/javascript">
										var newLocation = "<?php echo 'landing-text-show.php'; ?>";
										window.location = newLocation;   
									</script>
									<?php
									die;
								}
							}
							
						}
							
					?>
					
										<div>

	<script src="../admin/ckeditor/ckeditor.js"></script>
	<script src="../admin/js/sample.js"></script>
	<link rel="stylesheet" href="../admin/css/samples.css">
	<link rel="stylesheet" href="../admin/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
	<script src="//cdn.ckeditor.com/4.5.8/standard/ckeditor.js"></script>


<!--<input id="send" type="button" value="Send">-->
<script>

	window.onload = function()
	{
		CKEDITOR.replace( 'editor1' );
	};


$().ready(function() {

		// validate signup form on keyup and submit
		$("#advertisement").validate({
		    ignore: [],    
			rules: {
				title: "required",
			},
			
             editor1: {
                    required: function() 
                    {
                    CKEDITOR.instances.editor1.updateElement();
                    }
                    },
						   
			messages: {
				title: "Please enter your title",
				editor1: "Please enter your description"
			},
			 errorPlacement: function(error, element) 
                {
                    if (element.attr("name") == "editor1") 
                   {
                    error.insertBefore("textarea#editor1");
                    } else {
                    error.insertBefore(element);
                    }
                }
			
		});
             
	

		
	});
$.validator.setDefaults({
		submitHandler: function() {
			//alert("submitted!");
			//
						var editor_data = CKEDITOR.instances.editor1.getData();
					    //alert(editor_data);
					    //$('#answer').val(editor_data);
						document.getElementById("advertisement").submit();
		}
	});

</script>
<style>
	.error{
	color:red;
	}
	</style>	
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><!--Input Text--></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Add New Landing Text
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
                                        <form role="form" name="advertisement" id="advertisement" METHOD="POST" action="">
										 
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input class="form-control" name="title" id="title" placeholder="Title Name" value="<?php if(isset($_POST['title']) && $_POST['title'] !="") { echo $_POST['title']; }?>">
												
                                            </div>
											<div class="form-group">
                                                <label>Heading</label>
												    
													<textarea name="editor1" class="required" id="editor1"></textarea>
                                              <!-- <input type="hidden" name="answer" id="answer"> <input class="form-control" name="heading" id="heading" placeholder="Heading" value="<?php if(isset($_POST['heading']) && $_POST['heading'] !="") { echo $_POST['heading']; }?>">-->
                                            </div>
											
											<input type="submit" class="btn btn-info" name="submit" id="submit" value="submit">
											 <button type="button" class="btn btn-default" onclick="goBack()">Cancel</button>
                                            
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


        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/startmin.js"></script>

    </body>
</html>
