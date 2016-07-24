<?php
session_start();
include_once('config.php');
if($_REQUEST['action']=="category")
{
?>

			<div class="form-group ">
				<label>Sub Category</label>
				<select  class="form-control"  name="subcategory_name" id="subcategory_name" required>
				<option value="">please select</option>
				<?php 
				$sqlr = "SELECT * from  gk_sub_category where category_name='".$_REQUEST['name']."'";
				$result = mysql_query($sqlr);
				while($row3 = mysql_fetch_array($result))
				{
				?>
				<option <?php if(isset($_POST['sub_category']) and $_POST['sub_category']== $row3['sub_category']) echo "selected" ?> 
				value="<?php echo $row3['sub_category_id'];?>">
				<?php echo $row3['sub_category'];?>
				</option>
				<?php
				}
				?>
				</select>
			</div>
				<?php
}
else
{
mysql_query("delete from gk_adv_images where id='".$_REQUEST['id']."'");
}
 //unlink('http://localhost/realestat/uploadifive/uploads/'.$_REQUEST['name']);
?>