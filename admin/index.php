<?php
session_start();
include_once('config.php');
	if(isset($_REQUEST['login']))
	{
		$user_name = $_POST['user_name'];
		$password = md5($_POST['password']);
		
		
		if($_REQUEST['user_name']=='')
		{
			$varerroe= " User Name can not be empty";
		}
        else if($_REQUEST['password']=='')
		{
			$varerroe= "Password can not be empty";
		}
		else if($_REQUEST['user_name'] =='')
		{
			$varerroe= "User name is woring";
		}
		else if($_REQUEST['password'] =="")
		{
			$varerroe= "Password is woring";
		}
		
		else
		{
				
				
		     $query="select user_id from gk_users where user_name ='".$_REQUEST['user_name']."' AND password ='".$_REQUEST['password']."' and status='1'";
			$result=mysql_query($query); 
			
			/* $query="select * from tbl_user where user_name ='$user_name' AND password ='$password'";
			
			$result=mysql_query($query);*/
			$row = mysql_fetch_array($result); 
			
			$count=mysql_num_rows($result);
			if($count =='0')
			{
			$varerroe= "Username & Password is wrong";
			}
			else if($count > 0)
			{
				   $_SESSION['user_name']=$_REQUEST['user_name'];
				  $_SESSION['user_id']=$row['user_id'];
			    
			  //$_SESSION['user_role']=$row['user_role'];
				header('Location: user-show.php');
			}
			
		}			
	}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>login page</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <!--<form role="form">-->
							<form name="login" id="login" METHOD="POST" action="">
                                <fieldset>
								<div style="color:#ff0000;"><?php if(isset($varerroe) && $varerroe !="") { echo $varerroe; } ?></div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" name="user_name" type="user_name" value="<?php if(isset($_REQUEST['user_name']) && $_REQUEST['user_name'] !="") { echo $_REQUEST['user_name']; }?>" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    
                                    <!-- Change this to a button or input when using this as a form -->
                                   <!--<a href="welcome.php" class="btn btn-lg btn-success btn-block">login</a>-->
								   <input type="submit" class="btn btn-lg btn-success btn-block" name="login" id="login" value="login">
									
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/startmin.js"></script>

    </body>
</html>
