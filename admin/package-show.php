<?php
include_once('config.php');
include_once('header1.php');
?>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"></h1>
						<?php
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
                    <div class="col-lg-12">
                        <div class="panel panel-default">
						<a href="add-package.php">
				          <button style="float:right;" type="reset" class="btn btn-info"> Add New Package </button></a>
                            <div class="panel-heading">
                               Show Package Details
                            </div>
							<?php
							if(isset($_GET['package_id']) && $_GET['package_id'] !="")
								{
								$package_id = $_GET['package_id'];
								$sql = "DELETE FROM `gk_package` WHERE package_id = '$package_id'";
								mysql_query($sql);
								}
								if(isset($_GET['active']) && $_GET['active'] !="")
								{
								$active= $_GET['active'];
								 $sql = "UPDATE `gk_package` SET status='".$_REQUEST['status']."' WHERE package_id = '$active'";
								 mysql_query($sql);
								}
							?>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="">
                                         <thead>
                                            <tr>
                                                <th>Package Name</th>
                                                <th>Package Duration</th>
                                                <th>Package Cost</th>
												<th>Status</th>
                                                <th>Delete</th>
												 <th>Edit</th>
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
														 
														 $sql = "SELECT * FROM `gk_package` where package_id != 0 order by package_id DESC limit $start_from, 3";
														 
														$result = mysql_query($sql);
														/*$result = mysql_query($sql);
														$match = mysql_num_rows($result);
														if($match > 0)
														{*/
														while($row = mysql_fetch_array($result))
														{ 
														?>  
														<td><?php echo $row['package_name'];?></td>	
														<td><?php echo $row['pac_duration'];?></td>
														<td><?php echo $row['package_cost'];?></td>
														<td><?php
														if($row['status']=='1')
														{                                                            
														?>
															<a  class="glyphicon glyphicon-ok" title="Active" href="package-show.php?active=<?php echo $row['package_id']; ?>&status=0" class="btn btn-default" onclick="return confirm('Are you sure you want Active this');"></a>
														<!--<button class="btn btn-default">ACTIVE</button> -->
														<?php //echo $row['status'];
														}
														else
														{
														?>
															<a class="glyphicon glyphicon-remove" title="DEACTIVE" href="package-show.php?active=<?php echo $row['package_id']; ?>&status=1" class="btn btn-default" onclick="return confirm('Are you sure you want DEACTIVE this');"></a>
														<?php
														}
														?></td>
														<td><a class="glyphicon glyphicon-trash" href="package-show.php?package_id=<?php echo $row['package_id']; ?>" onclick="return confirm('Are you sure you want Delete this FAQ Info');"></a></td>	
														<td><a class="glyphicon glyphicon-pencil" href="package-edit.php?package_id=<?php echo $row['package_id'];?>"></a></td>
												</tr>
												<?php
												}	
												?>								  
											</tbody>
                                    </table>
									<div style="margin-left:74%;">
									   <?php 	
											$sql2 = "SELECT COUNT(package_id) FROM gk_package"; 
											$rs_result = mysql_query($sql2); 
											$row = mysql_fetch_row($rs_result); 
											$total_records = $row[0]; 
											$total_pages = ceil($total_records / 3); 
											//echo $total_pages;
if($total_records > 3)
{											
											if($page != 1)
											{
												echo	"<a href='package-show.php?page=1'class='pagifirst'>FIRST</a> ";
											}	
											if($page>1)
											{
												echo "<a href='package-show.php?page=".($page-1)."'class='pagiprivi'>PREVIOUS</a>";
											}
											for ($i=1; $i<=$total_pages; $i++) 
											{
												if($i == ($page + 1) or $i == ($page + 2) or $i == ($page))
												{
													echo "<a href='package-show.php?page=".$i."'class='paginobr'>".$i."</a> ";
												}
												elseif($i == ($page - 1) or $i == ($page - 2) )
												{
													echo "<a href='package-show.php?page=".$i."'class='paginobr'>".$i."</a> ";
												}
											} 
											if($page != $total_pages)
											{
												echo "<a href='package-show.php?page=".($page+1)."' class='paginext'>Next</a>";
											}
											if($page != $total_pages)
											{
											echo "<a href='package-show.php?page=".($total_pages)."' class='pagilast'>Last</a>";
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
