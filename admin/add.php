<?php
include_once('config.php');
include_once('header1.php');
													
					$error ="";
						if(isset($_POST['submit']) && $_POST['submit'] !="")
						{
						 $keyword= $_POST['keyword'];
						 $title= $_POST['title'];
						 $descending=$_POST['descending'];
						 $status=$_POST['status'];
						 
						 
							if($_POST['keyword']=='')
							{
								$error= " keyword can not be empty";
							}
									
							else if($_POST['title']=='')
							{
								$error= "title can not be empty";
							}
							else if($_POST['descending']=='')
							{
								$error= "descending   can not be empty";
							}
							else if($_POST['status']=='')
							{
								$error=" Status  can not be empty";
							}
							
							else
							{
  							
                                
							
								if($error == "")
								{
									
									 $query="INSERT INTO `meta_keyword` (`keyword`, `title`, `descending`,`status`) VALUES ('".$keyword."','".$title."','".$descending."','".$status."')";
									
									mysql_query($query);
									setSessionMsg('Record Added Successfully');
									?>
									<script type="text/javascript">
										var newLocation = "<?php echo 'tour_show.php'; ?>";
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
                        <h1 class="page-header">ADD</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               ADD SEO 
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
				keyword: "required",
				title: {
					required: true,
					minlength: 2,
					maxlength: 5
				},
				descending: "required",
				status: "required",
				/* lastname: "required",
				username: {
					required: true,
					minlength: 2
				},
				password: {
					required: true,
					minlength: 5
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				email: {
					required: true,
					email: true
				},
				topic: {
					required: "#newsletter:checked",
					minlength: 2
				},
				agree: "required" */
			},
			messages: {
				keyword: "Please enter your keyword",
				title: {
					required: "Please enter a title",
					minlength: "Your username must consist of at least 2 characters",
					maxlength: "Your username must consist of at least 5 characters"
				},
				
				descending: "Please enter your keyword",
				status: "Please select status",
				/* lastname: "Please enter your lastname",
				username: {
					required: "Please enter a username",
					minlength: "Your username must consist of at least 2 characters"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
				email: "Please enter a valid email address",
				agree: "Please accept our policy",
				topic: "Please select at least 2 topics" */
			}
		});

	

		
	});
	</script>
	<style>
	<!--#commentForm {
		width: 500px;
	}
	#commentForm label {
		width: 250px;
	}
	#commentForm label.error, #commentForm input.submit {
		margin-left: 253px;
	}
	#signupForm {
		width: 670px;
	}
	#signupForm label.error {
		margin-left: 10px;
		width: auto;
		display: inline;
	}
	#newsletter_topics label.error {
		display: none;
		margin-left: 103px;
	} -->
	.error{
	color:red;
	}
	</style>									
									
                                        <form role="form" name="submit" id="signupForm" METHOD="POST" action="">
										 
                                            <div class="form-group">
                                                <label>Kyeword</label>
                                                <input class="form-control" name="keyword" id="keyword" placeholder="Keyword" value="" required>
												
                                            </div>
											<div class="form-group">
                                                <label>Title</label>
                                                <input class="form-control" name="title" id="title" placeholder="Title" value="" required>
                                            </div>
											<div class="form-group">
                                                <label>Descending</label>
                                                <input class="form-control" name="descending" id="descending" placeholder="Descending" value="<?php if(isset($_POST['descending']) && $_POST['descending'] !="") { echo $_POST['descending']; }?>">
                                            </div>
											<div class="form-group">
                                                <label>status</label>
												<select name="status" id="status" class="form-control" aria-required="true">
													<option value="">please select</option>
													<option value="1">Active</option>
													<option value="0">Deactive</option>
												</select>
                                                <!--<input class="form-control" name="status" id="status" placeholder="status" value="<?php if(isset($_POST['status']) && $_POST['status'] !="") { echo $_POST['status']; }?>">-->
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
