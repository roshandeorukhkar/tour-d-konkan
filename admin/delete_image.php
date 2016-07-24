<?php
session_start();
include_once('config.php');
if($_REQUEST['action']=="category")
{
?>

			<div class="form-group ">
				<label>Sub Category</label>
				<select  class="form-control"  name="subcategory_name" id="subcategory_name">
				<option value="">please select</option>
				<?php 
				$sqlr = "SELECT * from  gk_sub_category where category_name='".$_REQUEST['name']."'";
				$result = mysql_query($sqlr);
				while($row3 = mysql_fetch_array($result))
				{
				?>
				<option <?php if(isset($_REQUEST['subcat']) && $row3['sub_category_id']==$_REQUEST['subcat']) echo "selected";?>
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
else if($_REQUEST['action']=="visited")
{
mysql_query("delete from gk_place_images where id='".$_REQUEST['id']."'");
}
else
{
mysql_query("delete from gk_adv_images where id='".$_REQUEST['id']."'");
}
 //unlink('http://localhost/realestat/uploadifive/uploads/'.$_REQUEST['name']);
?>