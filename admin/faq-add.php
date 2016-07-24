<?php
include_once('config.php');
include_once('header1.php');
?>

			

										
			
			<?php
													
					$error ="";
						if(isset($_POST['submit']) && $_POST['submit'] !="")
						{
						 $question= $_POST['question'];
						 $answer= $_POST['answer'];
						 $category_name= $_POST['category_name'];
						 
							if($_POST['question']=='')
							{
								$error= " Question can not be empty";
							}
									
							else if($_POST['answer']=='')
							{
								$error= "Answer can not be empty";
							}
							else if($_POST['category_name']=='')
							{
								$error= "Category Name can not be empty";
							}
							
							else
							{
								if($error == "")
								{
									
									 $query="INSERT INTO `gk_faq` (`question`,`answer`,`category_name`) VALUES ('".$question."','".$answer."','".$category_name."')";
									
									mysql_query($query);
									setSessionMsg('Record Added Successfully');
									?>
									<script type="text/javascript">
										var newLocation = "<?php echo 'faq-show.php'; ?>";
										window.location = newLocation;   
									</script>
									<?php
									die;
								}
							}
							
						}
							
					?>
					
										<div>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><!--FAQ--></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                             <div class="panel-heading">
                               ADD FQA Details
                            </div> 
							<center><div style="color:red;">
											<?php 
												if(isset($error)) 
												{ 
													echo $error; 
												} 
											?>
											</div></center>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
									
<!-- jquery validation start -->  									
			<script>
	window.onload = function()
	{
		CKEDITOR.replace( 'editor1' );
	};
	

	$().ready(function() {

		// validate signup form on keyup and submit
		$("#faq_form").validate({
		    ignore: [],    
			rules: {
				question: "required",
			},
			fruit: {
			  category_name: true,
			},
             editor1: {
                    required: function() 
                    {
                    CKEDITOR.instances.editor1.updateElement();
                    }
                    },
						   
			messages: {
				question: "Please enter your question",
				category_name: "Please enter a category",
				editor1: "Please enter your Answer"
			},
			 errorPlacement: function(error, element) 
                {
                    if (element.attr("name") == "editor1") 
                   {
                    error.insertBefore("textarea#editor1");
                    } else {
                    error.insertBefore(element);
                    }
                }
			
		});
             
	

		
	});
	$.validator.setDefaults({
		submitHandler: function() {
			//alert("submitted!");
			//
						var editor_data = CKEDITOR.instances.editor1.getData();
					    //alert(editor_data);
					    $('#answer').val(editor_data);
						document.getElementById("faq_form").submit();
		}
	});
	</script>
	<style>
	.error{
	color:red;
	}
	</style>			

	<script src="../admin/ckeditor/ckeditor.js"></script>
	<script src="../admin/js/sample.js"></script>
	<link rel="stylesheet" href="../admin/css/samples.css">
	<link rel="stylesheet" href="../admin/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
	<script src="//cdn.ckeditor.com/4.5.8/standard/ckeditor.js"></script>


<!--<input id="send" type="button" value="Send">-->
<script>
	
	/*function FAQ()
	{
	
	
	
	alert(1);
	} */
	$('#send').click(function() {
	
    // send your ajax request with value
    // profit!
});
	
</script>


	
                                        <form role="form" name="submit" id="faq_form" METHOD="POST" action="">
										 
                                            <div class="form-group">
                                                <label>Question</label>
                                                <input class="form-control" name="question" id="question" placeholder="question" value="<?php if(isset($_POST['question']) && $_POST['question'] !="") { echo $_POST['question']; }?>" required>
												
                                            </div>
											<div class="form-group">
                                                <label>Answer</label>
												<input type="hidden" name="answer" id="answer">
												<textarea name="editor1" class="required" id="editor1"></textarea>
									
                                              <!--  <input class="form-control" name="answer" id="answer" placeholder="answer" value="<?php if(isset($_POST['answer']) && $_POST['answer'] !="") { echo $_POST['answer']; }?>" required>-->
                                            </div>
											<div class="form-group ">
								          <label>Category</label>
								               <select  class="form-control" name="category_name" id="category_name" required>
									             <option value="">please select</option>
									
										        <?php 
										
										              $sqlr = "SELECT * from gk_category";
										             $result = mysql_query($sqlr);
										            while($row3 = mysql_fetch_array($result))
										                 {
											      ?>
														<option <?php if(isset($_POST['category_name']) and $_POST['category_name']== $row3['category_name']) echo "selected" ?> 
														value="<?php echo $row3['category_name'];?>">
														<?php echo $row3['category_name'];?>
														</option>
											     <?php
										               }
										          ?>
								            </select>
                                               </div>
											<input type="submit" class="btn btn-info" name="submit" id="submit" value="submit">
											 <!--<input id="send" type="button" onclick="FAQ();" value="Send">->
                                            <button type="reset" class="btn btn-default">Reset Button</button>
                                        </form>
                                    </div>
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
</html>
