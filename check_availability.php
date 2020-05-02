<?php 
require_once("includes/config.php");
// code admin email availablity
if(!empty($_POST["email"])) {
	$email= $_POST["email"];
	if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

		echo "error : You did not enter a valid email.";
	}
	else {
		$sql ="SELECT * FROM tbl_user WHERE email='$email'";
		$query=mysqli_query($con,$sql);
		$num=mysqli_num_rows($query);
		if ($num>0) {
			echo "<span style='color:red'> Email already exists .</span>";
			echo "<script>$('#submit').prop('disabled',true);</script>";
		}else{
			echo "<span style='color:green'> Email available for Registration .</span>";
			echo "<script>$('#submit').prop('disabled',false);</script>";
		}
	
	}
}


?>
