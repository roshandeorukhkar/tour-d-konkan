<?php
include_once('config.php');
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
		<div class="tem">			
          <a href="add-logo.php">
	    <button style="float:right;" type="reset" class="btn btn-info"> Add New Logo </button></a>
		</div>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Show Logo Details
                            </div>
                            <!-- /.panel-heading -->
							<?php
							if(isset($_GET['logo_id']) && $_GET['logo_id'] !="")
								{
											$id = $_GET['logo_id'];

										$sql = "DELETE FROM `gk_logo` WHERE id = '$id'";

											mysql_query($sql);
											setSessionMsg('Record deleted Successfully');
						 ?>
									<script type="text/javascript">
										var newLocation = "<?php echo 'logo-show.php'; ?>";
										window.location = newLocation;   
									</script>
									<?php
									exit;

								}
							if(isset($_GET['active']) && $_GET['active'] !="")
														{
														    $active= $_GET['active'];
															
															
														     //$sql = "DELETE FROM `meta_keyword` WHERE id = '$active'";
															 $sql = "UPDATE `gk_logo` SET status='".$_REQUEST['status']."' WHERE id = '$active'";
															 $sql1 = "UPDATE `gk_logo` SET status='0' WHERE id != '$active'";
															  mysql_query($sql1);
														     mysql_query($sql);

														}
							
							?>
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="">
                                         <thead>
                                            <tr>
                                                <th>Logo</th>
                                                <th>status</th>
												<th>Delete</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX">
														<?php
														if (isset($_GET["page"])) 
													{ 
														$page  = $_GET["page"];
													} 
													else 
													{ 
														$page=1; 
														
													}; 
													 $start_from = ($page-1) * 3;
															 $sql = "SELECT * FROM `gk_logo`where id != 0 order by id DESC limit $start_from, 3";
															$result = mysql_query($sql);
															while($row = mysql_fetch_array($result))
															{ 
																?>   
																   
																	<td><img src="<?php echo $row['logo'];?>" width="100" height="50" ></a></td>
																	<td><?php
																	if($row['status']=='1')
																	{                                                            
																	?>
																		<a class="glyphicon glyphicon-ok" href="logo-show.php?active=<?php echo $row['id']; ?>&status=0" class="btn btn-default" onclick="return confirm('Are you sure you want Active this');"></a>
																	<!--<button class="btn btn-default">ACTIVE</button> -->
																	<?php //echo $row['status'];
																	}
																	else
																	{
																	?>
																		<a class="glyphicon glyphicon-remove" href="logo-show.php?active=<?php echo $row['id']; ?>&status=1" class="btn btn-default" onclick="return confirm('Are you sure you want DEACTIVE this');"></a>
																	<?php
																	}
																	?></td>
																	<td><a class="glyphicon glyphicon-trash" href="logo-show.php?logo_id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want Delete this slider image');"></a></td>	
																
																	
																</tr>
																<?php
															}
														?>								  
					                    </tbody>
                                    </table>
									<div style="margin-left:74%;">
									<?php 	
										$sql2 = "SELECT COUNT(id) FROM gk_logo"; 
										$rs_result = mysql_query($sql2); 
										$row = mysql_fetch_row($rs_result); 
										$total_records = $row[0]; 
										$total_pages = ceil($total_records / 3); 
										//echo $total_pages;
if($total_records > 3)
{										
										if($page != 1)
										{
											echo	"<a href='logo-show.php?page=1'class='pagifirst'>FIRST</a> ";
										}	
										if($page>1)
										{
											echo "<a href='logo-show.php?page=".($page-1)."'class='pagiprivi'>PREVIOUS</a>";
										}
										for ($i=1; $i<=$total_pages; $i++) 
										{
											if($i == ($page + 1) or $i == ($page + 2) or $i == ($page))
											{
												echo "<a href='logo-show.php?page=".$i."'class='paginobr'>".$i."</a> ";
											}
											elseif($i == ($page - 1) or $i == ($page - 2) )
											{
												echo "<a href='logo-show.php?page=".$i."'class='paginobr'>".$i."</a> ";
											}
										} 
										if($page != $total_pages)
										{
											echo "<a href='logo-show.php?page=".($page+1)."' class='paginext'>Next</a>";
										}
										if($page != $total_pages)
										{
										echo "<a href='logo-show.php?page=".($total_pages)."' class='pagilast'>Last</a>";
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
