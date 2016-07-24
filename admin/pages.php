<?php
include_once('config.php');
include_once('header1.php');
?>

			<?php
													
					$error ="";
						if(isset($_POST['submit']) && $_POST['submit'] !="")
						{
						 $page_name = $_POST['page_name'];
						 $page_url= $_POST['page_url'];
						
						 
						 
							if($_POST['page_name']=='')
							{
								$error= " Page Name can not be empty";
							}
									
							
							else if($_POST['page_url']=='')
							{
								$error= "Page Url can not be empty";
							}
							
							
							else
							{
								if($error == "")
								{
								 $query="INSERT INTO `page_add` (`page_name`, `page_url`) VALUES ('".$page_name."','".$page_url."')";
									
									mysql_query($query);
									
									?>
									<script type="text/javascript">
										var newLocation = "<?php echo 'page_show.php'; ?>";
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
						<h1 class="page-header">page Add</h1>
					</div>
					<!-- /.col-lg-12 -->
				</div>
				<!-- /.row -->
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								Basic Form Elements
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
												<!-- jquery validation start -->  									
												<script>
													window.onload = function()
													{
													   CKEDITOR.replace( 'editor1' );
													};
	
													$.validator.setDefaults({
														submitHandler: function() {
															//alert("submitted!");
															document.getElementById("page_from").submit();
														}
													});

													$().ready(function() {

														// validate signup form on keyup and submit
														$("#page_from").validate({
															rules: {
																page_name: "required",
																page_url: {
																required: true,
																url: true
																}
															},
															
																		   
															messages: {
																page_name: "Please enter your Page name"
															}
														});
	
													});
													</script>
													<style>
													.error{
													color:red;
													}
													</style>
	<script src="../ckeditor/ckeditor.js"></script>
	<script src="js/sample.js"></script>
	<link rel="stylesheet" href="css/samples.css">
	<link rel="stylesheet" href="../ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
	<script src="//cdn.ckeditor.com/4.5.8/standard/ckeditor.js"></script>
	
                                    <div class="col-lg-6">
                                        <form role="form" name="submit" id="page_from" METHOD="POST" action="">
										 
                                            <div class="form-group">
                                                <label>Page Name</label>
                                                <input class="form-control" name="page_name" id="page_name" placeholder="Page Name" value="<?php if(isset($_POST['page_name']) && $_POST['page_name'] !="") { echo $_POST['page_name']; }?>"required>
												
                                            </div>
											<div class="form-group">
                                                <label>Page Url</label>
                                                <input class="form-control" name="page_url" id="page_url" placeholder="Page Url" value="<?php if(isset($_POST['page_url']) && $_POST['page_url'] !="") { echo $_POST['page_url']; }?>"required> 
                                            </div>
											<div class="form-group">
                                                <label>Page Description</label>
                                                <!--<input class="form-control" name="page_url" id="page_url" placeholder="Page Url" value="<?php if(isset($_POST['page_url']) && $_POST['page_url'] !="") { echo $_POST['page_url']; }?>"required> -->
												
												<textarea name="editor1" class="required" id="editor1"></textarea>
                                            </div>
											
											<input type="submit" class="btn btn-info" name="submit" id="submit" value="submit">
											 <button type="button" class="btn btn-default" onclick="goBack()">Cancel</button>
		<script>
function goBack() {
    window.history.back();
}
</script>									
                                            
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

        <!-- jQuery 
        <script src="js/jquery.min.js"></script>
-->
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/startmin.js"></script>

    </body>
</html>
