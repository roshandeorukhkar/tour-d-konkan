<?php
include_once('config.php');
include_once('header1.php');
?>


            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h6 class="page-header">
						<?php
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
          <a href="category-add.php">
	    <button style="float:right;" type="reset" class="btn btn-info"> Add New Category</button></a>
		</div>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Show Category
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="">
									<?php
								if(isset($_GET['category_id']) && $_GET['category_id'] !="")
								{
											$category_id = $_GET['category_id'];

											$sql = "DELETE FROM `gk_category` WHERE category_id = '$category_id'";

											mysql_query($sql);
                                             setSessionMsg('Record deleted Successfully');
						 ?>
									<script type="text/javascript">
										var newLocation = "<?php echo 'category-show.php'; ?>";
										window.location = newLocation;   
									</script>
									<?php
									exit;
								}
									if(isset($_GET['active']) && $_GET['active'] !="")
														{
														    $active= $_GET['active'];
															
															
														     //$sql = "DELETE FROM `meta_keyword` WHERE id = '$active'";
															 $sql = "UPDATE `gk_category` SET status='".$_REQUEST['status']."' WHERE category_id = '$active'";
														     mysql_query($sql);

														}	
									
									?>
                                         <thead>
                                            <tr>
                                                <th>Category</th>
                                                <th>Type</th>
                                                <th>Status</th>
												<th>Severity</th>
										<th style="float:center;" colspan="2">Action</th>
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
															 $sql = "SELECT * FROM `gk_category`where category_id != 0 order by category_id DESC limit $start_from, 3";
															$result = mysql_query($sql);
															while($row = mysql_fetch_array($result))
															{ 
																?>   
																   
																	<td><?php echo $row['category_name'];?></td>	
																	<td><?php echo $row['type'];?></td>	
																	<td><?php
				if($row['status']=='1')
				{                                                            
				?>
<a href="category-show.php?active=<?php echo $row['category_id']; ?>&status=0" class="glyphicon glyphicon-ok" onclick="return confirm('Are you sure you want Active this');"></a>
				<!--<button class="btn btn-default">ACTIVE</button> -->
				<?php //echo $row['status'];
				}
				else
				{
				?>
				<a href="category-show.php?active=<?php echo $row['category_id']; ?>&status=1"  class="glyphicon glyphicon-remove" onclick="return confirm('Are you sure you want DEACTIVE this');"></a>
				<?php
				}
				?></td>	
																	<td><?php echo $row['severity'];?></td>	
																	<td><a class="glyphicon glyphicon-trash" href="category-show.php?category_id=<?php echo $row['category_id']; ?>" onclick="return confirm('Are you sure you want Delete this user');"></a></td>
																	<td><a class="glyphicon glyphicon-pencil" href="category-edit.php?category_id=<?php echo $row['category_id'];?>"></a></td>
																
																	
																</tr>
																<?php
															}
														?>								  
					                    </tbody>
                                    </table>
									<div style="margin-left:74%;">
									<?php 	
										$sql2 = "SELECT COUNT(category_id) FROM gk_category"; 
										$rs_result = mysql_query($sql2); 
										$row = mysql_fetch_row($rs_result); 
										$total_records = $row[0]; 
										$total_pages = ceil($total_records / 3);
										
if($total_records > 3)
{										//echo $total_pages;
										if($page != 1)
										{
											echo	"<a href='category-show.php?page=1'class='pagifirst'>FIRST</a> ";
										}	
										if($page>1)
										{
											echo "<a href='category-show.php?page=".($page-1)."'class='pagiprivi'>PREVIOUS</a>";
										}
										for ($i=1; $i<=$total_pages; $i++) 
										{
											if($i == ($page + 1) or $i == ($page + 2) or $i == ($page))
											{
												echo "<a href='category-show.php?page=".$i."'class='paginobr'>".$i."</a> ";
											}
											elseif($i == ($page - 1) or $i == ($page - 2) )
											{
												echo "<a href='category-show.php?page=".$i."'class='paginobr'>".$i."</a> ";
											}
										} 
										if($page != $total_pages)
										{
											echo "<a href='category-show.php?page=".($page+1)."' class='paginext'>Next</a>";
										}
										if($page != $total_pages)
										{
										echo "<a href='category-show.php?page=".($total_pages)."' class='pagilast'>Last</a>";
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
