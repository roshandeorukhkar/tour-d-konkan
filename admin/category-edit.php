<?php
include_once('header1.php');
include_once('config.php');
$category_id = $_GET['category_id'];
?>

			

			
										
			                                   <?php
													
													if(isset($_POST['submit']) && $_POST['submit'] !="")
													{
													if(isset($_POST['category_name']) && $_POST['category_name'] !="")
													{
														$category_name=$_POST['category_name'];
													}
													else
													{
														 $category_name="";
													}

													if(isset($_POST['type']) && $_POST['type'] !="")
													{
														$type=$_POST['type'];
													}
													else
													{
														$type="";
													}
													if(isset($_POST['Severity']) && $_POST['Severity'] !="")
													{
														$Severity=$_POST['Severity'];
													}
													else
													{
														$Severity="";
													}
													
								if($_FILES['image']['name'] !="")
								{
								$id = md5(uniqid(rand(1,9999))); // Genrate random id;
								  $newpat ="upload/category/".$id."_".$_FILES['image']['name'];
                                   move_uploaded_file($_FILES["image"]["tmp_name"],$newpat); 
							    }
								else
								{
								  $newpat =$_POST['image_hide'];
								}
													
													$query="update `gk_category` set `category_name`='".$category_name."',type='".$type."',severity='".$Severity."',category_image='".$newpat."' where category_id='$category_id'";
													
													$result=mysql_query($query);
													setSessionMsg('Record Updated Successfully');
													?>
														<script type="text/javascript">
														var newLocation = "<?php echo 'category-show.php'?>";
														window.location = newLocation;   
														</script>				
												  <?php		
													}
													?>
                                        
										<div>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
						
<!-- jquery validation start -->  									
			<script>
	$.validator.setDefaults({
		submitHandler: function() {
			//alert("submitted!");
			document.getElementById("form_category").submit();
		}
	});

	$().ready(function() {

		// validate signup form on keyup and submit
		$("#form_category").validate({
			rules: {
				category_name: "required",
				type: "required",
			Severity: "required",
			},
			
						   
			messages: {
				category_name: "Please enter your category name",
				type: "Please enter a valid type",
				Severity: "Please enter a valid Severity"
			}
		});

	

		
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
                                 Edit Category Details
                            </div>
							
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form role="form" name="form_category" id="form_category" METHOD="POST" enctype="multipart/form-data">
										<?php
										/* $query="select * from `meta_keyword` WHERE id='$id'";
										$result=mysql_query($query);
										$row=mysql_fetch_array($result); */
										 $query_select4="SELECT * FROM `gk_category` WHERE category_id ='".$category_id."'";			
											 $result4=mysql_query($query_select4);
											 $row4 = mysql_fetch_array($result4);
										
										?>
										 
                                            <div class="form-group">
                                                <label>Category Name</label>
                                                <input class="form-control" name="category_name" id="category_name" placeholder="category_name" value="<?php echo $row4['category_name'];?>" required>
												
                                            </div>
											<div class="form-group">
                                                <label>Type</label>
                                                <input class="form-control" name="type" id="type" placeholder="type" value="<?php echo $row4['type'];?>" required>
                                            </div>
											<div class="form-group">
                                                <label>images</label>
                                                  <input type="file" name="image" id="image" value="">
												 <input type="hidden" name="image_hide" id="image_hide" value="<?php echo $row4['category_image'];?>">
                                            </div>
											<div class="form-group">
                                                <label>Severity</label>
												<select name="Severity" id="Severity" class="form-control" aria-required="true" required>
													<option value="">please select</option>
													<option value="1" <?php if($row4['status']=='1') echo "selected";  ?>>1</option>
													<option value="2" <?php if($row4['status']=='2') echo "selected";  ?>>2</option>
												</select>
                                               <!-- <input class="form-control" name="status" id="status" placeholder="status" value="<?php if(isset($_POST['status']) && $_POST['status'] !="") { echo $_POST['status']; }?>" >-->
                                            </div>
											
                                           
                                            
											<input type="submit" class="btn btn-info" name="submit" id="submit" value="submit">
                                            <button type="reset" class="btn btn-default" onclick="goBack()">Cancel</button>
                                        </form>
<script>
function goBack() {
    window.history.back();
}
</script>										
										
                                    </div>
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
