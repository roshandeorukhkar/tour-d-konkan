<?php
include_once('config.php');
include_once('header1.php');
?>

			

										
			
			<?php
													
					$error ="";
						if(isset($_POST['submit']) && $_POST['submit'] !="")
						{
							 $category_name= $_POST['category_name'];
							 $type= $_POST['type'];
							 $Severity=$_POST['Severity'];
							 
							 
								if($_POST['category_name']=='')
								{
									$error= "Category Name can not be empty";
								}	
								else if($_FILES['image']['name'] =="" && $_POST['Severity']=='1')
								{
									$error= "Please select image";
								}
								else if($_POST['type']=='')
								{
									$error= "Type can not be empty";
								}
								else if($_POST['Severity']=='')
								{
									$error="Severity  can not be empty";
								}
								
								else
								{
									if($error == "")
									{
									if($_FILES['image']['name'] !="")
									{
									   $id = md5(uniqid(rand(1,9999))); // Genrate random id;
									  $newpat ="upload/category/".$id."_".$_FILES['image']['name'];
									   move_uploaded_file($_FILES["image"]["tmp_name"],$newpat); 
									}
									else
									{
									  $newpat ="";
									}
									
									if($error == "")
									{
									$sql = "SELECT count(*) as counts FROM `gk_category` where category_name='".$category_name."'";
									 $result = mysql_query($sql);
									 $row_count=mysql_fetch_array($result);
									 if($row_count['counts'] !='0')
									 {
										$error="Already exit category";
									 }
									 else
									 {
									
									 $query="INSERT INTO `gk_category` (`category_name`, `type`,`Severity`,`category_image`) VALUES ('".$category_name."','".$type."','".$Severity."','".$newpat."')";
										
										mysql_query($query);
										setSessionMsg('Record Added Successfully');
										?>
										<script type="text/javascript">
											var newLocation = "<?php echo 'category-show.php'; ?>";
											window.location = newLocation;   
										</script>
										<?php
										die;
									}
									}
								}
							
						}
						}	
					?>
					
										<div>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><!--Category--></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Add Category Details
                            </div>
							<center><div style="color:red;">
											<?php 
												if(isset($error) && $error !="") 
												{ 
													echo $error; 
												} 
											?>
											</div></center>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
									
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
                                        <form role="form" name="submit" id="form_category" METHOD="POST" action=""  enctype="multipart/form-data">
										 
                                            <div class="form-group">
                                                <label>Category</label>
                                                <input class="form-control" name="category_name" id="category_name" placeholder="Category Name" value="<?php if(isset($_POST['category_name']) && $_POST['category_name'] !="") { echo $_POST['category_name']; }?>" required>
												
                                            </div>
											<div class="form-group">
                                                <label>images</label>
                                                 <input type="file" name="image" id="image" value="">
                                            </div>
											<div class="form-group">
                                                <label>Type</label>
                                                <input class="form-control" name="type" id="type" placeholder="type" value="<?php if(isset($_POST['type']) && $_POST['type'] !="") { echo $_POST['type']; }?>" required>
                                            </div>
											
											<div class="form-group">
                                                <label>Severity</label>
												<select name="Severity" id="Severity" class="form-control" aria-required="true" required>
													<option value="">please select</option>
													<option value="1" <?php if(isset($_POST['Severity']) && $_POST['Severity'] =="1") { echo "selected"; }?>>1</option>
													<option value="2" <?php if(isset($_POST['Severity']) && $_POST['Severity'] =="2") { echo "selected"; }?>>2</option>
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
