<?php
    session_start();
	include_once('config.php');
if($_REQUEST['action']=='display_seo')
{
  ?>
   <table class="table table-striped table-bordered table-hover" id="">
                                         <thead>
                                            <tr>
                                                <th>keyword</th>
                                                <th>Title</th>
                                                <th>Descending</th>
                                                <th>Status</th>
                                               
                                               <center><th colspan="2">Action</th></center>
                                                
                                                
												
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="odd gradeX">
														<?php
														if(isset($_GET['id']) && $_GET['id'] !="")
														{
														    $id = $_GET['id'];
														     $sql = "DELETE FROM `meta_keyword` WHERE id = '$id'";
														     mysql_query($sql);
														     $success="<h1>Successfully Deleted</h1>";

														}
														
															 $sql = "SELECT * FROM `meta_keyword` order by id DESC";
															$result = mysql_query($sql);
															while($row = mysql_fetch_array($result))
															{ 
																?>   
																   
																	<td><?php echo $row['keyword'];?></td>	
																	<td><?php echo $row['title'];?></td>	
																	<td><?php echo $row['descending'];?></td>	
																	<td><?php echo $row['status'];?></td>
                                                                    																	
																
																	<td><a href="tour_show.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want Delete meta');">Delete</a></td>
																	<td><a href="edit.php?id=<?php echo $row['id'];?>">Edit</a></td>
																</tr>
																<?php
															}
														?>								  
					                    </tbody>
                                    </table>
  <?php
}
?>