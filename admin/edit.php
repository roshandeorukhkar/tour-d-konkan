<?php
include_once('header1.php');
include_once('config.php');
$id = $_GET['id'];
?>

			

			
										
			                                   <?php
													
													if(isset($_POST['submit']) && $_POST['submit'] !="")
													{
													if(isset($_POST['keyword']) && $_POST['keyword'] !="")
													{
														$keyword=$_POST['keyword'];
													}
													else
													{
														 $keyword="";
													}
                                                      if(isset($_POST['title']) && $_POST['title'] !="")
													{
														$title=$_POST['title'];
													}
													else
													{
														 $title="";
													}
													if(isset($_POST['descending']) && $_POST['descending'] !="")
													{
														$descending=$_POST['descending'];
													}
													else
													{
														 $descending="";
													}
													
													$status=$_POST['status'];
													
												  $query="update `meta_keyword` set `keyword`='".$keyword."',`title`='".$title."',`descending`='".$descending."',status='".$status."' where id='$id'";
												
													$result=mysql_query($query);
													setSessionMsg('Record updated Successfully');
													?>
														<script type="text/javascript">
														 var newLocation = "<?php echo 'tour_show.php'?>";
														 window.location = newLocation;   
														</script>				
												  <?php	
exit;												  
													}
													?>
                                        
										<div>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">EDIT</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                EDIT SEO
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
				keyword: "required",
				title: {
					required: true,
					minlength: 2,
					maxlength: 5
				},
				descending: "required",
				status: "required",
			},
			messages: {
				keyword: "Please enter your keyword",
				title: {
					required: "Please enter a title",
					minlength: "Your username must consist of at least 2 characters",
					maxlength: "Your username must consist of at least 5 characters"
				},
				descending: "Please enter your keyword",
				status: "Please select status"
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
										
										 $query_select4="SELECT * FROM `meta_keyword` WHERE id ='".$id."'";			
											 $result4=mysql_query($query_select4);
											 $row4 = mysql_fetch_array($result4);
										
										?>
										 
                                            <div class="form-group">
                                                <label>Kyeword</label>
                                                <input class="form-control" name="keyword" id="keyword" placeholder="Keyword" value="<?php echo $row4['keyword'];?>">
												
                                            </div>
											<div class="form-group">
                                                <label>Title</label>
                                                <input class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $row4['title'];?>">
                                            </div>
											<div class="form-group">
                                                <label>Descending</label>
											<div class="form-group">
												<textarea class="form-control" rows="3"  name="descending" id="descending" placeholder="Descending"><?php echo $row4['descending'];?></textarea>
											</div>
                                                <!--<input class="form-control" name="descending" id="descending" placeholder="Descending" value="<?php echo $row4['descending'];?>">-->
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