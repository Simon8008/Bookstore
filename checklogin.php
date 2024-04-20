<?php
session_start();
require_once("connectDB.php");


if(isset($_POST['username'])&&isset($_POST['pwd'])){
    $username=$_POST['username'];
    $pwd = $_POST['pwd'];

		$conn->query($sqlDB);
		
       $sql = "SELECT * FROM users WHERE UserName='$username' AND Password='$pwd'";

       $result = mysqli_query($conn, $sql);

     if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_assoc($result);

           
            $_SESSION['id']=$row['UserID'];
             
        
        header("Location:index.php");
        
    }else{
        echo '<span style="color: red;">Login Fail</span>';
        header("Location:login.php?errcode=1");
    }
     
}
?>
