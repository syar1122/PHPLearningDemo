<?php
session_start();
include("conn.php");
$userNAME = '';
$image = '';
$n = '';
$sid = '';
$rid = '';
if(empty($_SESSION) || empty($_SESSION['username'])){
	echo '<script>location="login.php"</script>';
} else{
	$userNAME = $_SESSION['username'];
	$q = "select * from users where usrN = '$userNAME'";
	$res  = mysqli_query($con , $q);
	while($arr = mysqli_fetch_array($res)){
		
		$image = $arr['usrPro'];
		$sid = $arr['ID'];
	}
}

	

?>

<html>
<head>
    <link rel="stylesheet" type = "text/css"  href="css/all.css">
    <link rel="stylesheet" type = "text/css"  href="css/bootstrap-theme.css">
     <link rel="stylesheet" type = "text/css"  href="css/bootstrap-theme.css.map">
     <link rel="stylesheet" type = "text/css"  href="css/bootstrap-theme.min.css">
     <link rel="stylesheet" type = "text/css"  href="css/bootstrap-theme.min.css.map">
     <link rel="stylesheet" type = "text/css"  href="css/bootstrap.css">
     <link rel="stylesheet" type = "text/css"  href="css/bootstrap.css.map">
     <link rel="stylesheet" type = "text/css"  href="css/bootstrap.min.css">
     <link rel="stylesheet" type = "text/css"  href="css/bootstrap.min.css.map">
    </head>
<body >
    <center><span id="n" style="font-size:30px" ><?php echo $userNAME ?></span></center>
    
    <div class="container">
    <div class="row">
		<div class="col-sm-4 col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">    
                    
                    <form accept-charset="UTF-8" action="send.php" method="POST">
                       <div><input class="form-control" type="text" name="rec" placeholder="user name"/></div><br>
                        <textarea class="form-control counted" name="mtxt" placeholder="Type in your message" rows="5" style="margin-bottom:10px;resize: none;"></textarea><br>
                        <button class="btn btn-info" type="submit">Post New Message</button>
                    </form>
                </div>
            </div>
        </div>
	</div>
</div>
    </body>
</html>



