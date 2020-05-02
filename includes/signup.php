<?php
error_reporting(0);
if(isset($_POST['submit']))
{
	$fullname=$_POST['fullname'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$sql="INSERT INTO  tbl_user(fullname,mobile,email,password) VALUES('$fullname','$mobile','$email','$password')";
	$query=mysqli_query($con,$sql);
	if ($query) {
		$_SESSION['msg']="You are Scuccessfully registered. Now you can login ";
		header('location:thankyou.php');
	}else{
			$_SESSION['msg']="Something went wrong. Please try again.";
		header('location:thankyou.php');
	}
}
?>
<!--Javascript for check email availabilty-->
<script>
	function checkAvailability() {

		$("#loaderIcon").show();
		jQuery.ajax({
			url: "check_availability.php",
			data:'email='+$("#email").val(),
			type: "POST",
			success:function(data){
				$("#user-availability-status").html(data);
				$("#loaderIcon").hide();
			},
			error:function (){}
		});
	}
</script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
			</div>
			<section>
				<div class="modal-body modal-spa">
					<div class="login-grids">
						<div class="login">
							<div class="login-left">
								<ul>
									<li><a class="fb" href="#"><i></i>Facebook</a></li>
									<li><a class="goog" href="#"><i></i>Google</a></li>

								</ul>
							</div>
							<div class="login-right">
								<form name="signup" method="post">
									<h3>Create your account </h3>


									<input type="text" value="" placeholder="Full Name" name="fullname" autocomplete="off" required="">
									<input type="text" value="" placeholder="Mobile number" maxlength="11" name="mobile" autocomplete="off" required="">
									<input type="text" value="" placeholder="Email id" name="email" id="email" onBlur="checkAvailability()" autocomplete="off"  required="">	
									<span id="user-availability-status" style="font-size:12px;"></span> 
									<input type="password" value="" placeholder="Password" name="password" required="">	
									<input type="submit" name="submit" id="submit" value="CREATE ACCOUNT">
								</form>
							</div>
							<div class="clearfix"></div>								
						</div>
						<p>By logging in you agree to our <a href="page.php?type=terms">Terms and Conditions</a> and <a href="page.php?type=privacy">Privacy Policy</a></p>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>