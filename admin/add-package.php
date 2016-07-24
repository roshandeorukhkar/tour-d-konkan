<?php
include_once('config.php');
include_once('header1.php');
?>

			<?php								
					$error ="";
						if(isset($_POST['submit']) && $_POST['submit'] !="")
						{
						 $package_name= $_POST['package_name'];
						 $pac_duration= $_POST['pac_duration'];
						 $package_cost= $_POST['package_cost'];
						 
						 
						 
							if($_POST['package_name']=='')
							{
								$error= " package Name can not be empty";
							}
							if($_POST['pac_duration']=='')
							{
								$error= " Pac Duration can not be empty";
							}
							
							if($_POST['package_cost']=='')
							{
								$error= " Package Cost can not be empty";
							}
							
							else
							{
								if($error == "")
								{
										
										/* if($_FILES['image']['name'] !="")
										{
										  $id = md5(uniqid(rand(1,9999))); // Genrate random id;
										  $newpat ="upload/visit/".$id."_".$_FILES['image']['name'];
										   move_uploaded_file($_FILES["image"]["tmp_name"],$newpat); 
										}
										else
										{
										  $newpat ="";
										} */
								
									
									$query="INSERT INTO `gk_package` (`package_name`,`pac_duration`,`package_cost`) VALUES ('".$package_name."','".$pac_duration."','".$package_cost."')";
									
									mysql_query($query);
									setSessionMsg('Record Added Successfully');	
									
									?>
									<script type="text/javascript">
									var newLocation = "<?php echo 'package-show.php'; ?>";
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
							<h1 class="page-header">Add  Package</h1>
						</div>
						<!-- /.col-lg-12 -->
					</div>
					<!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                             <div class="panel-heading">
                                Add  Package
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
									
									<!-- jquery validation start -->  									
											<script>
									$.validator.setDefaults({
										submitHandler: function() {
											//alert("submitted!");
											document.getElementById("package_from").submit();
										}
									});

									$().ready(function() {

										// validate signup form on keyup and submit
										$("#package_from").validate({
											rules: {
												package_name: "required",
												package_cost: "required",
												
												
											},
														   
											messages: {
												package_name: "Please enter your Add Package Name",
												package_cost: "Please enter your Add package Cost",
												
												
											}
										});
									});
									</script>
									<style>
									.error{
									color:red;
									}
									</style>									
                                        <form role="form" name="submit" id="package_from" METHOD="POST" action="" enctype="multipart/form-data">
										  
                                            <div class="form-group">
                                                <label>Package Name</label>
                                                <input class="form-control" name="package_name" id="package_name" placeholder="Package Name" value="<?php if(isset($_POST['package_name']) && $_POST['package_name'] !="") { echo $_POST['package_name']; }?>" required>
                                            </div> 
											<!--<div class="form-group">
                                                <label>Add Image</label>
                                                <input type="file" name="image" id="image" value="">
                                            </div>-->
											<div class="form-group">
                                                <label>Package Duration</label>
                                                 <input type="text" id="config-demo" name="pac_duration" class="form-control">
            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                            </div>
	<style type="text/css">
      .demo { position: relative; }
      .demo i {
        position: absolute; bottom: 10px; right: 24px; top: auto; cursor: pointer;
      }
     </style>
		<script type="text/javascript">
      $(document).ready(function() {

        $('#config-text').keyup(function() {
          eval($(this).val());
        });
        
        $('.configurator input, .configurator select').change(function() {
          updateConfig();
        });

        $('.demo i').click(function() {
          $(this).parent().find('input').click();
        });

      
        updateConfig();

        function updateConfig() {
          var options = {};

          $('#config-text').val("$('#demo').daterangepicker(" + JSON.stringify(options, null, '    ') + ", function(start, end, label) {\n  console.log(\"New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')\");\n});");

          $('#config-demo').daterangepicker(options, function(start, end, label) { console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')'); });
          
        }

      });
      </script>									<div class="form-group">
                                                <label>Package Cost</label>
                                               
												<input class="form-control" name="package_cost" id="package_cost" placeholder="Package Cost" value="<?php if(isset($_POST['package_cost']) && $_POST['package_cost'] !="") { echo $_POST['package_cost']; }?>" required>
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

		
		<!-- For date ppicker -->
		 <link rel="stylesheet" type="text/css" media="all" href="css/daterangepicker.css" />
        <script type="text/javascript" src="js/moment.js"></script>
        <script type="text/javascript" src="js/daterangepicker.js"></script>
		<!-- For date ppicker -->
    </body>
</html>


