<?php
include_once('config.php');
include_once('header1.php');
?>

			<?php
													
					$error ="";
						if(isset($_POST['submit']) && $_POST['submit'] !="")
						{
						 $sub_category= $_POST['sub_category'];
						 $category_name= $_POST['category_name'];
						 $type=$_POST['type'];
							if($_POST['sub_category']=='')
							{
								$error= " Sub category can not be empty";
							}
							
							else if($_POST['category_name']=='')
							{
								$error= " category Name can not be empty";
							}
							else if($_POST['type']=='')
							{
								$error=" type  can not be empty";
							}
							else
							{
								if($error == "")
								{
								 $query="INSERT INTO `gk_sub_category` (`sub_category`, `category_name`, `type`) VALUES ('".$sub_category."','".$category_name."','".$type."')";
								 setSessionMsg('Record Added Successfully');
									
									mysql_query($query);
									
									?>
									<script type="text/javascript">
										var newLocation = "<?php echo 'show-detail-sub-category.php'; ?>";
										window.location = newLocation;   
									</script>
									<?php
								}
							}
							
						}
							
					?>
					
				<div>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><!-- Sub Category--></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Add  Sub Category
                            </div>
							<center><div style="color:red;"><?php if(isset($error)) {echo $error; } ?> </div></center>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
									
<!-- jquery validation start -->  									
			                                <script>
												$.validator.setDefaults({
													submitHandler: function() {
														//alert("submitted!");
														document.getElementById("form_subcategory").submit();
													}
												});

												$().ready(function() {

													// validate signup form on keyup and submit
													$("#form_subcategory").validate({
														rules: {
															sub_category: "required",
															category_name: "required",
															type: "required",
														},
														   
														messages: {
															sub_category: "Please enter your Sub category",
															category_name: "Please enter your category name",
															type: "Please enter a valid type"
														}
													});
												});
											</script>
											<style>
											.error{
											color:red;
											}
											</style>																					
                                        <form role="form" name="submit" id="form_subcategory" METHOD="POST" action="">
										 
                                            <div class="form-group">
                                                <label>Sub Category</label>
                                                <input class="form-control" name="sub_category" id="sub_category" placeholder="Sub Category Name" value="<?php if(isset($_POST['sub_category']) && $_POST['sub_category'] !="") { echo $_POST['sub_category']; }?>" required>
												
                                            </div>
											<div class="form-group ">
								                <label>Category</label>
								                <select  class="form-control" name="category_name" id="category_name" required>
									            <option value="">please select</option>
										        <?php 
										            $sqlr = "SELECT * from  gk_category";
										            $result = mysql_query($sqlr);
										            while($row3 = mysql_fetch_array($result))
										            {
													  ?>
													<option <?php if(isset($_POST['category_name']) and $_POST['category_name']== $row3['category_name']) echo "selected" ?> 
													value="<?php echo $row3['category_name'];?>">
													<?php echo $row3['category_name'];?>
													</option>
													 <?php
										             }
										          ?>
								                </select>
                                               </div>
											<div class="form-group">
                                                <label>Type</label>
                                                <input class="form-control" name="type" id="type" placeholder="type" value="<?php if(isset($_POST['type']) && $_POST['type'] !="") { echo $_POST['type']; }?>" required>
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
