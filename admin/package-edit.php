<?php
include_once('config.php');
include_once('header1.php');
$package_id =$_GET['package_id'];
													
													if(isset($_POST['submit']) && $_POST['submit'] !="")
													{
													if(isset($_POST['package_name']) && $_POST['package_name'] !="")
													{
														$package_name=$_POST['package_name'];
													}
													else
													{
														 $package_name="";
													}
                                                      if(isset($_POST['pac_duration']) && $_POST['pac_duration'] !="")
													{
														$pac_duration=$_POST['pac_duration'];
													}
													else 
													{
														 $pac_duration="";
													}
													 if(isset($_POST['package_cost']) && $_POST['package_cost'] !="")
													{
														$package_cost=$_POST['package_cost'];
													}
													else
													{
														 $package_cost="";
													}
													
										/* if($_FILES['image']['name'] !="")
										{
										  $id = md5(uniqid(rand(1,9999))); // Genrate random id;
										  $newpat ="upload/visit/".$id."_".$_FILES['image']['name'];
										   move_uploaded_file($_FILES["image"]["tmp_name"],$newpat); 
										}
										else
										{
										  $newpat =$_POST['image_hidden'];
										}	*/
													
											 
											$query="update `gk_package` set `package_name`='".$package_name."',`pac_duration`='".$pac_duration."',`package_cost`='".$package_cost."' where package_id='$package_id'";
										
													$result=mysql_query($query);
													 setSessionMsg('Record Updated Successfully');	
													?>
														<script type="text/javascript">
														 var newLocation = "<?php echo 'package-show.php'?>";
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
                       <h1 class="page-header"><center><div style="color:red;">
											<?php 
												if(isset($error)) 
												{ 
													echo $error; 
												} 
											?>
											</div></center></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                             <div class="panel-heading">
                               Edit Package
                            </div> 
							
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
									
<!-- jquery validation start -->  									
											<script>
												$.validator.setDefaults({
										submitHandler: function() {
											//alert("submitted!");
											document.getElementById("package_form").submit();
										}
									});

									$().ready(function() {

										// validate signup form on keyup and submit
										$("#package_form").validate({
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
											  <form role="form" name="submit" id="package_form" METHOD="POST" action="" enctype="multipart/form-data">
											   <?php
												 $query_select4="SELECT * FROM `gk_package` WHERE package_id ='".$package_id."'";			
												 $result4=mysql_query($query_select4);
												 $row4 =mysql_fetch_array($result4);
											   ?>
												<div class="form-group">
													<label>Package Name</label>
													<input class="form-control" name="package_name" id="package_name" placeholder="peackag Name" value="<?php echo $row4['package_name'];?>" required>
													
												</div>
											<!--<div class="form-group">
                                                <label>Add Image</label>
                                                <input type="file" name="image" id="image" value="">
												 <input type="hidden" name="image_hidden" id="image_hidden" value="<?php echo $row4['visiting_place_image'];?>">
                                            </div>-->
												<div class="form-group">
                                                <label>Package Duration</label>
                                                 <input type="text" id="config-demo" name="pac_duration" class="form-control" value="<?php echo $row4['pac_duration'];?>">
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
      </script>								
												<!--<div class="form-group">
													<label>package duration</label>
													<input class="form-control" name="pac_duration" id="pac_duration" placeholder="Package Duration" value="<?php echo $row4['pac_duration'];?>" required>
												</div>-->
												<div class="form-group">
													<label>package cost </label>
													<input class="form-control" name="package_cost" id="package_cost" placeholder="Package " value="<?php echo $row4['package_cost'];?>" required>
												</div>
												 <input type="submit" class="btn btn-info" name="submit" id="submit" value="submit">  
												</form>
                                        </div>
											
											 <!--<input id="send" type="button" onclick="FAQ();" value="Send">->
                                            <button type="reset" class="btn btn-default">Reset Button</button>
                                        </form>
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
		
		
		
		<!-- For date ppicker -->
		 <link rel="stylesheet" type="text/css" media="all" href="css/daterangepicker.css" />
        <script type="text/javascript" src="js/moment.js"></script>
        <script type="text/javascript" src="js/daterangepicker.js"></script>
		<!-- For date ppicker -->

    </body>
</html>
