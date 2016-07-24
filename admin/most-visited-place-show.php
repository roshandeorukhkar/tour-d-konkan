<?php
include_once('config.php');
include_once('header1.php');
?>
<script>

</script>
 
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
			
          <a href="add-most-visited.php">
	    <button style="float:right;" type="reset" class="btn btn-info">Add New visited place</button></a>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Most Visited Place Details
			
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
							
						
						
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="">
                                         <thead>
                                            <tr>
                                                <th>Placename</th>
                                                <th>Description</th>
                                                <th>Address</th>
												 <th>Location</th>
                                                <th>Status</th>
                                               
                                               <center><th colspan="2">Action</th></center>
                                                
                                                
												
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX">
														<?php
														if(isset($_GET['place_id']) && $_GET['place_id'] !="")
														{
														    $place_id = $_GET['place_id'];
														     $sql = "DELETE FROM `gk_most_visited_place` WHERE place_id = '$place_id'";
														     mysql_query($sql);
														     setSessionMsg('Record Deleted Successfully');
																?>
																<script type="text/javascript">
																	var newLocation = "<?php echo 'most-visited-place-show.php'; ?>";
																	window.location = newLocation;   
																</script>
																<?php
																exit;

														}
														if(isset($_GET['active']) && $_GET['active'] !="")
														{
														    $active= $_GET['active'];
															
															
														     //$sql = "DELETE FROM `gk_most_visited_place` WHERE place_id = '$active'";
															 $sql = "UPDATE `gk_most_visited_place` SET status='".$_REQUEST['status']."' WHERE place_id = '$active'";
														     mysql_query($sql);

														}
													if (isset($_GET["page"])) 
													{ 
														$page  = $_GET["page"];
													} 
													else 
													{ 
														$page=1; 
														
													}; 
													 $start_from = ($page-1) * 3; 
													 
													 
															 $sql = "SELECT * FROM `gk_most_visited_place`  order by place_id DESC limit $start_from, 3";
															$result = mysql_query($sql);
															while($row = mysql_fetch_array($result))
															{ 
																?>   
																   
																	<td><?php echo $row['placename'];?></td>	
																	<td><?php echo $row['description'];?></td>	
																	<td><?php echo $row['address'];?></td>	
																	<td><?php echo $row['location'];?></td>	
																	<td>
				<?php
				if($row['status']=='1')
				{                                                            
				?>
<a href="most-visited-place-show.php?active=<?php echo $row['place_id']; ?>&status=0" class="glyphicon glyphicon-ok" onclick="return confirm('Are you sure you want Active this');"></a>
				<!--<button class="btn btn-default">ACTIVE</button> -->
				<?php //echo $row['status'];
				}
				else
				{
				?>
				<a href="most-visited-place-show.php?active=<?php echo $row['place_id']; ?>&status=1" class="glyphicon glyphicon-remove" onclick="return confirm('Are you sure you want DEACTIVE this');"></a>
				<?php
				}
				?>
				
				</td>
                                                                    																	
																
																	<td><a class="glyphicon glyphicon-trash" href="most-visited-place-show.php?place_id=<?php echo $row['place_id']; ?>" onclick="return confirm('Are you sure you want Delete meta');"></a></td>
																	<td><a class="glyphicon glyphicon-pencil" href="edit-most-visited.php?place_id=<?php echo $row['place_id'];?>"></a></td>
																</tr>
																<?php
															}
														?>								  
					                    </tbody>
                                    </table>
									<div style="margin-left:74%;">
									<?php 	
										$sql2 = "SELECT COUNT(place_id) FROM gk_most_visited_place"; 
										$rs_result = mysql_query($sql2); 
										$row = mysql_fetch_row($rs_result); 
										$total_records = $row[0]; 
										$total_pages = ceil($total_records / 3); 
										//echo $total_pages;
if($total_records > 3)
{										
										if($page != 1)
										{
											echo	"<a href='most-visited-place-show.php?page=1'class='pagifirst'>FIRST</a> ";
										}	
										if($page>1)
										{
											echo "<a href='most-visited-place-show.php?page=".($page-1)."'class='pagiprivi'>PREVIOUS</a>";
										}
										for ($i=1; $i<=$total_pages; $i++) 
										{
											if($i == ($page + 1) or $i == ($page + 2) or $i == ($page))
											{
												echo "<a href='most-visited-place-show.php?page=".$i."'class='paginobr'>".$i."</a> ";
											}
											elseif($i == ($page - 1) or $i == ($page - 2) )
											{
												echo "<a href='most-visited-place-show.php?page=".$i."'class='paginobr'>".$i."</a> ";
											}
										} 
										if($page != $total_pages)
										{
											echo "<a href='most-visited-place-show.php?page=".($page+1)."' class='paginext'>Next</a>";
										}
										if($page != $total_pages)
										{
										echo "<a href='most-visited-place-show.php?page=".($total_pages)."' class='pagilast'>Last</a>";
										}
										echo "</br>";
										echo "</br>";
										echo "<p><hr></p>\n";
}										
										 ?>
                                </div>
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
