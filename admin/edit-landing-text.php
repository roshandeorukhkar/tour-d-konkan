<?php
include_once('header1.php');
include_once('config.php');
$input_id = $_GET['input_id'];
?>

			

			
										
			                                   <?php
													
													if(isset($_POST['submit']) && $_POST['submit'] !="")
													{
													if(isset($_POST['title']) && $_POST['title'] !="")
													{
														$title=$_POST['title'];
													}
													else
													{
														 $title="";
													}
                                                      if(isset($_POST['editor1']) && $_POST['editor1'] !="")
													{
														$heading=$_POST['editor1'];
													}
													else
													{
														 $heading="";
													}
													 
													
													
													
											 /* $query="update `tbl_faq` set `question`='".$question."',`answer`='".$answer."' where faq_id='$faq_id'"; */
											 $query="update `gk_landing_text` set `title`='".$title."',`heading`='".$heading."' where input_id='$input_id'";
												
													$result=mysql_query($query);
													 setSessionMsg('Record Updated Successfully');	
													?>
														<script type="text/javascript">
														 var newLocation = "<?php echo 'landing-text-show.php'?>";
														 window.location = newLocation;   
														</script>				
												  <?php	
die;												  
													}
													?>
                                        
										<div>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><!--Input Edit--></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
	<meta charset="utf-8">
	<title>CKEditor Sample</title>
	<script src="../admin/ckeditor/ckeditor.js"></script>
	<script src="../admin/js/sample.js"></script>
	<link rel="stylesheet" href="css/samples.css">
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
						document.getElementById("faq_form").submit();
		}
	});

</script>
<style>
	.error{
	color:red;
	}
	</style>				
				
				
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Edit Landing Text
                            </div>
							
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form role="form" name="advertisement" id="advertisement" METHOD="POST" action="">
										<?php
										
										     $query_select4="SELECT * FROM `gk_landing_text` WHERE input_id ='".$input_id."'";			
											 $result4=mysql_query($query_select4);
											 $row4 =mysql_fetch_array($result4);
										
										?>
										 
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input class="form-control" name="title" id="title" placeholder="title" value="<?php echo $row4['title'];?>">
												
                                            </div>
											<div class="form-group">
                                                <label>Heading</label>
                                            <!--    <input class="form-control" name="heading" id="heading" placeholder="heading" value="<?php echo $row4['heading'];?>">
											        <input type="hidden" name="answer" id="answer">-->
													<textarea name="editor1" class="required" id="editor1"><?php echo $row4['heading'];?></textarea>
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
