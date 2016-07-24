<?php
include_once('config.php');
include_once('header1.php');
?>		
		<div>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User Managment</h1>
                    </div>
					<?php								
					$error ="";
						if(isset($_POST['submit']) && $_POST['submit'] !="")
						{
						 $user_name= $_POST['user_name'];
						 $email= $_POST['email'];
						 $user_role=$_POST['user_role'];
						 
						 
							if($_POST['user_name']=='')
							{
								$error= " User Name can not be empty";
							}
									
							
							else if($_POST['email']=='')
							{
								$error= "email   can not be empty";
							}
							else if($_POST['user_role']=='')
							{
								$error=" user role  can not be empty";
							}
							else if($_POST['password']=='')
							{
								$error=" password can not be empty";
							}
							
							else
							{
								if($error == "")
								{
								$sql = "SELECT count(*) as counts FROM `gk_users` where user_name='".$user_name."' OR email='".$email."' OR user_role='".$user_role."'";
								 $result = mysql_query($sql);
								 $row_count=mysql_fetch_array($result);
								 if($row_count['counts'] !='0')
								 {
								    $error="Already exit users";
								 }
								 else
								 {
								 $query="INSERT INTO `gk_users` (`user_name`, `email`,`user_role`,`password`) VALUES ('".$user_name."','".$email."','".$user_role."','".$_POST['password']."')";
									mysql_query($query);
									setSessionMsg('Record Added Successfully');
									?>
									<script type="text/javascript">
										var newLocation = "<?php echo 'user-show.php'; ?>";
										window.location = newLocation;   
									</script>
									<?php
									exit;
								  }
								}
							}
							
						}
							
					?>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               ADD USER
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
                                    <div class="col-lg-12">
	<!-- jquery validation start -->  									
			<script>
	$.validator.setDefaults({
		submitHandler: function() {
			//alert("submitted!");
			document.getElementById("user_form").submit();
		}
	});

	$().ready(function() {

		// validate signup form on keyup and submit
		$("#user_form").validate({
			rules: {
				user_name: "required",
				password: "required",
			},
			email: {
					required: true,
					email: true,
				},
			user_role: {
                   required: function () {
                       return ($("#user_role option:selected").val() == "0");
                   }
           },	
		   
			messages: {
				user_name: "Please enter your username",
				password: "Please enter your password",
				email: "Please enter a valid email address",
				user_role: "Please enter a valid email address",
			}
		});

	

		
	});
	</script>
	<style>
	.error{
	color:red;
	}
	</style>												
									
                                        <form role="form" name="submit" id="user_form" METHOD="POST" action="">
										<div class="col-lg-6">
										 <div class="col-sm-6">
										 
                                            <div class="form-group">
                                                <label>User Name</label>
                                                <input class="form-control"  name="user_name" id="user_name" placeholder="user name" value="<?php if(isset($_POST['user_name']) && $_POST['user_name'] !="") { echo $_POST['user_name']; }?>" required>
												
                                            </div>
											 <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control"  name="password" id="password" placeholder="password" value="<?php if(isset($_POST['user_name']) && $_POST['user_name'] !="") { echo $_POST['user_name']; }?>" required>
												
                                            </div>
											
                                            </div>
                                            </div>
											<!-- <div class="form-group">
                                                <label>Role</label>
                                                <input class="form-control" name="user_role" id="role" placeholder="user_role" value="<?php //if(isset($_POST['user_role']) && $_POST['user_role'] !="") { echo $_POST['user_role']; }?>">
                                            </div> -->
											<div class="col-lg-6">
											<div class="col-sm-6">
											<div class="form-group ">
								          <label>User Role</label>
								               <select  class="form-control" name="user_role" id="user_role" required>
									             <option value="">please select</option>
									
										        <?php 
										
										              $sqlr = "SELECT * from  gk_user_role";
										             $result = mysql_query($sqlr);
										            while($row3 = mysql_fetch_array($result))
										                 {
											      ?>
														<option <?php if(isset($_POST['user_role']) and $_POST['user_role']== $row3['user_role']) echo "selected" ?> 
														value="<?php echo $row3['user_role'];?>">
														<?php echo $row3['user_role'];?>
														</option>
											     <?php
										               }
										          ?>
								            </select>
                                               </div>
											<div class="form-group">
                                                <label>Email Id</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php if(isset($_POST['email']) && $_POST['email'] !="") { echo $_POST['email']; }?>" required>
                                            </div>	
                                            </div>		
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

        <!-- jQuery -->
       

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/startmin.js"></script>

    </body>
</html>
