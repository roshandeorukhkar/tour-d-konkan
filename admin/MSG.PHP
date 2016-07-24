<?php 

Query
  setSessionMsg('devidas Updated Successfully');
  $actual_link = "$_SERVER[REQUEST_URI]";
		header("Location:$actual_link");
		exit();
  
  getSessionMsg();
									
		?>
			<script>
			setTimeout(function(){document.getElementById('alert-success').style.display='none'}, 5000);
			</script>
		<?php
							
							
							
		


/*

Use : To set the msg which is set in specific session 
Developer : deva

*/
function setSessionMsg($msg,$class="alert-success")
{
	$_SESSION["SESSION_MESSAGE"] = $msg;
	$_SESSION["MESSAGE_CLASS"] = $class;
}


/*
getSessionMsg
Use : To get the msg which is set in specific session 
Developer : deva

*/

function getSessionMsg($tag="div")
{
	if(isset($_SESSION["SESSION_MESSAGE"]))
	{
		echo '<'.$tag.' class="text-center msgClassToDelete alert '.$_SESSION["MESSAGE_CLASS"].'">'.$_SESSION["SESSION_MESSAGE"].'</'.$tag.'>';
		
		echo '<div class="msgClassToDelete" ><script>setTimeout(\'jQuery(".msgClassToDelete").slideUp("normal", function() {    $(this).remove();})\',3000);</script></div>';
		
		unset($_SESSION["SESSION_MESSAGE"]);
		unset($_SESSION["MESSAGE_CLASS"]);
	}
	
}		
							
							