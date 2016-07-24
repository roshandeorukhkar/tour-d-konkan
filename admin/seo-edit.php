<?php
include_once('header1.php');
include_once('config.php');
$id = $_GET['id'];
?>

			

			
										
			                                   <?php
													
													if(isset($_POST['submit']) && $_POST['submit'] !="")
													{
													if(isset($_POST['keyword']) && $_POST['keyword'] !="")
													{
														$keyword=$_POST['keyword'];
													}
													else
													{
														 $keyword="";
													}
                                                      if(isset($_POST['title']) && $_POST['title'] !="")
													{
														$title=$_POST['title'];
													}
													else
													{
														 $title="";
													}
													if(isset($_POST['descending']) && $_POST['descending'] !="")
													{
														$descending=$_POST['descending'];
													}
													else
													{
														 $descending="";
													}
													
													$status=$_POST['status'];
													
												  $query="update `gk_seo` set `keyword`='".$keyword."',`title`='".$title."',`descending`='".$descending."' where id='$id'";
												
													$result=mysql_query($query);
													setSessionMsg('Record updated Successfully');
													?>
														<script type="text/javascript">
														 var newLocation = "<?php echo 'seo-show.php'?>";
														 window.location = newLocation;   
														</script>				
												  <?php	
exit;												  
													}
													?>
                                        
										<div>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><!--EDIT--></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Edit Seo Details
                            </div>
							
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
																		
 <!-- jquery validation start -->  									
			<script>
	$.validator.setDefaults({
		submitHandler: function() {
			//alert("submitted!");
			document.getElementById("edit_form").submit();
		}
	});

	$().ready(function() {

		// validate signup form on keyup and submit
		$("#edit_form").validate({
			rules: {
				keyword: "required",
				title: "required",
				descending: "required",
			},
			messages: {
				keyword: "Please enter your keyword",
				title: "Please enter your title",
				descending: "Please enter your descending"
			}
		});

	

		
	});
	</script>
	<style>
	.error{
	color:red;
	}
	</style>							
									
 <!-- jquery validation start -->  
                                        <form role="form" name="submit" id="edit_form" METHOD="POST" action="">
										<?php
										
										 $query_select4="SELECT * FROM `gk_seo` WHERE id ='".$id."'";			
											 $result4=mysql_query($query_select4);
											 $row4 = mysql_fetch_array($result4);
										
										?>
										 
                                            <div class="form-group">
                                                <label>Kyeword</label>
                                                <input class="form-control" name="keyword" id="keyword" placeholder="Keyword" value="<?php echo $row4['keyword'];?>">
												
                                            </div>
											<div class="form-group">
                                                <label>Title</label>
                                                <input class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $row4['title'];?>">
                                            </div>
											<div class="form-group">
                                                <label>Descending</label>
											<div class="form-group">
												<textarea class="form-control" rows="3"  name="descending" id="descending" placeholder="Descending"><?php echo $row4['descending'];?></textarea>
											</div>
                                                <!--<input class="form-control" name="descending" id="descending" placeholder="Descending" value="<?php echo $row4['descending'];?>">-->
                                            </div>
										
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

     

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/startmin.js"></script>

    </body>