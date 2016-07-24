<?php
//include_once('config.php');
include_once('header1.php');
?>


            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h6 class="page-header"><?php
						    getSessionMsg();
						?>
						<script>
						    setTimeout(function(){document.getElementById('alert-success').style.display='none'}, 8000);
						</script></h6>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
			
          <a href="user-managment.php">
	    <button style="float:right;" type="reset" class="btn btn-info">Add New user</button></a>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Users Details
			
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="">
                                         <thead>
                                            <tr>
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Delete</th>
                                               
                                                
                                                
                                                
												
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX">
														<?php
					if(isset($_GET['user_id']) && $_GET['user_id'] !="")
					{
						$user_id = $_GET['user_id'];
						$sql = "DELETE FROM `gk_users` WHERE user_id = '$user_id'";
						mysql_query($sql);
						     setSessionMsg('Record deleted successfully');
						 ?>
									<script type="text/javascript">
										var newLocation = "<?php echo 'user-show.php'; ?>";
										window.location = newLocation;   
									</script>
									<?php
									exit;
					}
														if(isset($_GET['active']) && $_GET['active'] !="")
														{
														    $active= $_GET['active'];
															
															
														     //$sql = "DELETE FROM `meta_keyword` WHERE id = '$active'";
															 $sql = "UPDATE `gk_users` SET status='".$_REQUEST['status']."' WHERE user_id = '$active'";
														     mysql_query($sql);

														}					

										
															 $sql = "SELECT * FROM `gk_users`";
															$result = mysql_query($sql);
															while($row = mysql_fetch_array($result))
															{ 
																?>   
																   
																	<td><?php echo $row['user_name'];?></td>	
																	<td><?php echo $row['email'];?></td>	
																	<td><?php echo $row['user_role'];?></td>	
																	<td>	<?php
				if($row['status']=='1')
				{                                                            
				?>
<a href="user-show.php?active=<?php echo $row['user_id']; ?>&status=0" class="glyphicon glyphicon-ok" onclick="return confirm('Are you sure you want Active this');"></a>
				<!--<button class="btn btn-default">ACTIVE</button> -->
				<?php //echo $row['status'];
				}
				else
				{
				?>
				<a class="glyphicon glyphicon-remove"  href="user-show.php?active=<?php echo $row['user_id']; ?>&status=1"  onclick="return confirm('Are you sure you want DEACTIVE this');"></a>
				<?php
				}
				?></td>
                                                                    
																	 <td><a class="glyphicon glyphicon-trash" href="user-show.php?user_id=<?php echo $row['user_id']; ?>" onclick="return confirm('Are you sure you want Delete this user');"></a></td>
																	 
																	<!-- <td><a href="user_edit.php?user_id=<?php echo $row['user_id']; ?>">Edit</a></td>-->
																																		
																
																	
																</tr>
																<?php
															}
														?>								  
					                    </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                                
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                
                    <!-- /.col-lg-6 -->
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

        <!-- DataTables JavaScript -->
        <script src="js/dataTables/jquery.dataTables.min.js"></script>
        <script src="js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/startmin.js"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>

    </body>
</html>
