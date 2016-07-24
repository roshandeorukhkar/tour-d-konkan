<?php
include_once('config.php');
include_once('header1.php');
?>


            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php
						    getSessionMsg();
						?>
						<script>
						    setTimeout(function(){document.getElementById('alert-success').style.display='none'}, 8000);
						</script></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
		<div class="tem">			
          <a href="add-slider-images.php">
	    <button style="float:right;" type="reset" class="btn btn-info"> Add New Slider images</button></a>
		</div>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Show Slider Details  
                            </div>
							<?php
							if(isset($_GET['slider']) && $_GET['slider'] !="")
								{
											$id = $_GET['slider'];

										$sql = "DELETE FROM `gk_slider` WHERE id = '$id'";

											mysql_query($sql);
											setSessionMsg('Record deleted Successfully');
						 ?>
									<script type="text/javascript">
										var newLocation = "<?php echo 'show-slider.php'; ?>";	
										window.location = newLocation;   
									</script>
									<?php
									exit;

								}
							if(isset($_GET['active']) && $_GET['active'] !="")
														{
														    $active= $_GET['active'];
															
															
														     //$sql = "DELETE FROM `meta_keyword` WHERE id = '$active'";
															 $sql = "UPDATE `gk_slider` SET status='".$_REQUEST['status']."' WHERE id = '$active'";
														     mysql_query($sql);
															 

														}
							
							?>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="">
                                         <thead>
                                            <tr>
                                                <th>Image</th>
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
													 
													 
															 
															 $sql = "SELECT * FROM `gk_slider` where id != 0 order by id DESC limit $start_from, 3";
															$result = mysql_query($sql);
															while($row = mysql_fetch_array($result))
															{ 
																?>   
																   
																	<td><img src="<?php echo $row['image'];?>" width="100" height="100" ></a></td>
						<td><?php
						if($row['status']=='1')
						{                                                            
						?>
						<a href="show-slider.php?active=<?php echo $row['id']; ?>&status=0" class="btn btn-default" onclick="return confirm('Are you sure you want Active this');">ACTIVE</a>
						<!--<button class="btn btn-default">ACTIVE</button> -->
						<?php //echo $row['status'];
						}
						else
						{
						?>
						<a href="show-slider.php?active=<?php echo $row['id']; ?>&status=1" class="btn btn-default" onclick="return confirm('Are you sure you want DEACTIVE this');">DEACTIVE</a>
						<?php
						}
						?></td>
						<td><a href="show-slider.php?slider=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want Delete this slider image');">Delete</a></td>										
																	
																</tr>
																<?php
															}
														?>								  
					                    </tbody>
                                    </table>
									<div style="margin-left:74%;">
									<?php 	
										$sql2 = "SELECT COUNT(id) FROM gk_slider"; 
										$rs_result = mysql_query($sql2); 
										$row = mysql_fetch_row($rs_result); 
										$total_records = $row[0]; 
										$total_pages = ceil($total_records / 3); 
										//echo $total_pages;
										if($page != 1)
										{
											echo	"<a href='show-slider.php?page=1'class='buttonpn1'>FIRST</a> ";
										}	
										if($page>1)
										{
											echo "<a href='show-slider.php?page=".($page-1)."'class='buttonpn1'>PREVIOUS</a>";
										}
										for ($i=1; $i<=$total_pages; $i++) 
										{
											if($i == ($page + 1) or $i == ($page + 2) or $i == ($page))
											{
												echo "<a href='show-slider.php?page=".$i."'class='buttonpn'>".$i."</a> ";
											}
											elseif($i == ($page - 1) or $i == ($page - 2) )
											{
												echo "<a href='show-slider.php?page=".$i."'class='buttonpn'>".$i."</a> ";
											}
										} 
										if($page != $total_pages)
										{
											echo "<a href='show-slider.php?page=".($page+1)."' class='buttonpn2'>Next</a>&nbsp;&nbsp;&nbsp;&nbsp;";
										}
										if($page != $total_pages)
										{
										echo "<a href='show-slider.php?page=".($total_pages)."' class='buttonpn2'>Last</a>";
										}
										echo "</br>";
										echo "</br>";
										echo "<p><hr></p>\n";
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
        <script src="js/jquery.min.js"></script>

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
