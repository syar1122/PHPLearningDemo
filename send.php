<?php
session_start();
include("conn.php");
    $rn='';
    $mtxt='';
    $rid='';
    $Sid='';
    
    
	if($_POST){
        $Sname = $_SESSION['username'];
        $query = "select * from users where usrN = '$Sname'";
        $result = mysqli_query($con , $query);
        while($rr = mysqli_fetch_array($result)){
            $sid = $rr['ID'];
        }
		$rn = mysqli_real_escape_string($con , $_POST['rec']);
		$mtxt = mysqli_real_escape_string($con , $_POST['mtxt']);
		$q1 = "select * from users where usrN = '$rn'";
		$res1 = mysqli_query($con , $q1);
		while($r = mysqli_fetch_array($res1)){
			$rid = $r['ID'];
		}
		$q = "INSERT INTO `msg`(`ID`, `Sid`, `Rid`, `Mtxt`) VALUES (null , $sid , $rid , '$mtxt')";
		$res = mysqli_query($con , $q);	
        
        if ($res){
            echo  '<script>alert("message sent")</script>';
            header("Location:index.php");
  
        }else{
             echo  '<script>alert("message failled")</script>';
             header("Location:index.php");
        }
	}
?>