<?php
include_once('header1.php');
include_once('config.php');
$sub_category_id = $_GET['sub_category_id'];

?>

							   <?php
									
									if(isset($_POST['submit']) && $_POST['submit'] !="")
									{
									if(isset($_POST['sub_category']) && $_POST['sub_category'] !="")
									{
										$sub_category=$_POST['sub_category'];
									}
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
									
									
									 $query="update `gk_sub_category` set `sub_category`='".$sub_category."',`category_name`='".$category_name."',type='".$type."' where sub_category_id='$sub_category_id'";
									
									$result=mysql_query($query);
									setSessionMsg('Record Updated Successfully');	
									?>
										<script type="text/javascript">
										 var newLocation = "<?php echo 'show-detail-sub-category.php'?>";
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
									<h1 class="page-header">Sub Category</h1>
								</div>
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
                    <!-- /.col-lg-12 -->
                            </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Sub Category Edit
                            </div>
							
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form role="form" name="submit" id="form_subcategory" METHOD="POST" action="">
											<?php
											 $query_select4="SELECT * FROM `gk_sub_category` WHERE sub_category_id ='".$sub_category_id."'";			
												 $result4=mysql_query($query_select4);
												 $row4 = mysql_fetch_array($result4);
											
											?>
												<div class="form-group">
													<label> Sub Category </label>
													<input class="form-control" name="sub_category" id="sub_category" placeholder="Sub category" value="<?php echo $row4['sub_category'];?>">
												</div>
											 <div class="form-group ">
								              <label>Category</label>
								              <select  class="form-control" name="category_name" id="category_name"required>
													<?php 
														 $sqlr = "SELECT * from  gk_category";
														 $result = mysql_query($sqlr);
														 while($row3 = mysql_fetch_array($result))
														 {		
														   ?>
															<option  
															value="<?php echo $row3['category_name'];?>" <?php if($row4['category_name']==$row3['category_name']) { echo "selected"; }  ?>>
															<?php echo $row3['category_name'];?>
															</option>
														   <?php
														  }
														   ?>
												</select>
                                               </div>
											<div class="form-group">
                                                <label>type</label>
                                                <input class="form-control" name="type" id="type" placeholder="Email" value="<?php echo $row4['type'];?>">
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

        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/startmin.js"></script>

    </body>
</html>
