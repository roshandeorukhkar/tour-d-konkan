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
								$error= " Keyword can not be empty";
							}
									
							else if($_POST['title']=='')
							{
								$error= "Title can not be empty";
							}
							else if($_POST['descending']=='')
							{
								$error= "Descending   can not be empty";
							}
							else
							{
								if($error == "")
								{
									
									 $query="INSERT INTO `gk_seo` (`keyword`, `title`, `descending`) VALUES ('".$keyword."','".$title."','".$descending."')";
									
									mysql_query($query);
									setSessionMsg('Record Added Successfully');
									?>
									<script type="text/javascript">
										var newLocation = "<?php echo 'seo-show.php'; ?>";
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
                        <h1 class="page-header"><!--ADD--></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               Add Seo Details
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
				title: "required",
				descending: "required",
			},
			messages: {
				keyword: "Please enter your keyword",
				title: "Please enter your title",
				descending: "Please enter your descending",
			}
		});

	

		
	});
	</script>
	<style>
	
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
												<textarea class="form-control" rows="3"  name="descending" id="descending" placeholder="Descending"><?php if(isset($_POST['descending']) && $_POST['descending'] !="") { echo $_POST['descending']; }?></textarea>
												
                                              <!--  <input class="form-control" name="descending" id="descending" placeholder="Descending" value="<?php //if(isset($_POST['descending']) && $_POST['descending'] !="") { echo $_POST['descending']; }?>">-->
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
