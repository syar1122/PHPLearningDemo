<?php
session_start();
include("conn.php");

$counter = 0;

    if($_POST){
	$user = mysqli_real_escape_string($con , $_POST['username']);
	$u = filter_var($user, FILTER_SANITIZE_STRING);
	
	$pass = mysqli_real_escape_string($con , $_POST['password']);
	$p = filter_var($pass, FILTER_SANITIZE_STRING);
	
	$qr  = "SELECT * FROM `users` WHERE  usrN = '$u' and usrP = '$p'";
	$res = mysqli_query($con , $qr);
	while($arr = mysqli_fetch_array($res)){
		if($arr['usrN'] == $u && $arr['usrP'] == $p){
			$_SESSION['username'] = $u;
			header("Location:index.php");
		} else{
                      
            echo '<script>alert("wrong username or password");</script>';
            header("Location:signUp.php");
            echo '<h1>'.$counter.'</h1>';
            $counter += 1;
            
		}
	}
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
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form method="post" id="loginform" class="form-horizontal" >
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                    </div>
                                    

                                
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                        </label>
                                      </div>
                                    </div>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                     <input type="submit" name="login" value="login" class="btn btn-success" />
                                      

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account! 
                                        <a href="signUp.php" >
                                            Sign Up Here
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     



                        </div>                     
                    </div>  
        </div>
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform"  method="post" class="form-horizontal" role="form">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                    
                                
                                  
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">First Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="firstname" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="passwd" placeholder="Password">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Invitation Code</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="icode" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i> Sign Up</button>
                                        <span style="margin-left:8px;">or</span>  
                                    </div>
                                </div>
                                
                                <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                                    
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</button>
                                    </div>                                           
                                        
                                </div>
                                
                                
                                
                            </form>
                         </div>
                    </div>

               
               
                
         </div> 
    </div>
    
    
    
    
    </body>

</html>