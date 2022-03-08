<?php
session_start();
include("conn.php");
if($_POST){
	$user = mysqli_real_escape_string($con , $_POST['usrN']);
	$u = filter_var($user, FILTER_SANITIZE_STRING);
    
    $Email = mysqli_real_escape_string($con , $_POST['usrE']);
	$E = filter_var($Email, FILTER_SANITIZE_STRING);
	
	$pass = mysqli_real_escape_string($con , $_POST['usrP']);
	$p = filter_var($pass, FILTER_SANITIZE_STRING);
	
		$q  = "INSERT INTO `users`(`ID`, `usrN`, `usrE`, `usrP`, `usrPro`) VALUES (null, '$u', '$E', '$p', null)";
	$res = mysqli_query($con , $q);
    $_SESSION['username'] = $u;
    echo "<script>location:index.php</script>";
    
	
	
}

?>
<html>
<head>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta charset="utf-8">
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
    <body>
        <div class="container">
		<div class="row" style="margin-top:50px;">
			<div class="panel panel-info">
                
                <div  class="panel-heading"><div class="panel-title">
							Create account
                            </div></div>
				<div class="panel-body">
					<form method="POST"  role="form">
						
						<div class="form-group">
							<label class="control-label" for="signupName">User name</label>
							<input id="signupName" name="usrN" type="text" maxlength="50" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label" for="signupEmail">Email</label>
							<input id="signupEmail" name="usrE" type="email" maxlength="50" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label" for="signupEmailagain">Email again</label>
							<input id="signupEmailagain" type="email" maxlength="50" class="form-control">
						</div>
						<div class="form-group">
							<label class="control-label" for="signupPassword">Password</label>
							<input id="signupPassword" name="usrP" type="password" maxlength="25" class="form-control" placeholder="at least 6 characters" length="40">
						</div>
						<div class="form-group">
							<label class="control-label" for="signupPasswordagain">Password again</label>
							<input id="signupPasswordagain" type="password" maxlength="25" class="form-control">
						</div>
						<div class="form-group">
							<button id="signupSubmit" type="submit" class="btn btn-info btn-block">Create your account</button>
						</div>
						<p class="form-group">By creating an account, you agree to our <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a>.</p>
						<hr>
						<p>Already have an account? <a href="login.php">Sign in</a></p>
					</form>
				</div>
			</div>
		</div>
	</div>


    </body>

</html>