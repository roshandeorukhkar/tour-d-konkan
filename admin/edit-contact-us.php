<?php
include_once('header1.php');
include_once('config.php');
$contact_id = $_GET['contact_id'];
?>

			

			
										
			                                   <?php
													
													if(isset($_POST['submit']) && $_POST['submit'] !="")
													{
													if(isset($_POST['name']) && $_POST['name'] !="")
													{
														$name=$_POST['name'];
													}
													else
													{
														 $name="";
													}
                                                      if(isset($_POST['email']) && $_POST['email'] !="")
													{
														$email=$_POST['email'];
													}
													else
													{
														 $email="";
													}
													if(isset($_POST['phone']) && $_POST['phone'] !="")
													{
														$phone=$_POST['phone'];
													}
													else
													{
														 $phone="";
													}
													if(isset($_POST['query']) && $_POST['query'] !="")
													{
														$query=$_POST['query'];
													}
													else
													{
														 $query="";
													}
													
													$status=$_POST['status'];
													
												  $query="update `gk_contact_us` set `name`='".$name."',`email`='".$email."',status='".$status."',`phone`='".$phone."',`query`='".$query."' where contact_id='$contact_id'";
												
													$result=mysql_query($query);
													 setSessionMsg('Record Updated Successfully');
													?>
														<script type="text/javascript">
														 var newLocation = "<?php echo 'contact-us.php'?>";
														 window.location = newLocation;   
														</script>				
												  <?php		
												  die;
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
                                Edit Contact Us Details
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
				name: "required",
				status: "required",
				phone: "required",
				query: "required",
			},
			email: {
					required: true,
					email: true,
				},
			messages: {
				name: "Please enter your keyword",
				email: "Please enter a valid email address",
				status: "Please select status",
				phone: "Please select phone",
				query: "Please select Query",
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
										
										$query_select4="SELECT * FROM `gk_contact_us` WHERE contact_id ='".$contact_id."'";			
											 $result4=mysql_query($query_select4);
											 $row4 = mysql_fetch_array($result4);
										
										?>
										 
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $row4['name'];?>" required>
												
                                            </div>
											<div class="form-group">
                                                <label>email</label>
                                                <input class="form-control" text="email" name="email" id="email" placeholder="Email" value="<?php echo $row4['email'];?>" required>
                                            </div>
											<div class="form-group">
                                                <label>status</label>
												<select name="status" id="status" class="form-control" aria-required="true">
													<option value="">please select</option>
													<option value="1" <?php if($row4['status']=='1') echo "selected";  ?>>Active</option>
													<option value="0" <?php if($row4['status']=='0') echo "selected";  ?>>Deactive</option>
												</select>
                                                <!--<input class="form-control" name="status" id="status" placeholder="status" value="<?php if(isset($_POST['status']) && $_POST['status'] !="") { echo $_POST['status']; }?>">-->
                                            </div>
											<div class="form-group">
                                                <label>Phone</label>
                                                <input class="form-control" name="phone" id="phone" placeholder="phone" value="<?php echo $row4['phone'];?>">
                                            </div>
											<div class="form-group">
                                                <label>query</label>
                                                <input class="form-control" name="query" id="query" placeholder="query" value="<?php echo $row4['query'];?>">
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