<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit2']))
{
	$id=intval($_GET['pkgid']);
	$useremail=$_SESSION['login'];
	$fromdate=$_POST['fromdate'];
	$todate=$_POST['todate'];
	$comment=$_POST['comment'];
	$status=0;
	$sql="INSERT INTO tbl_booking(packageid,useremail,fromdate,todate,comment,status) VALUES('$id','$useremail','$fromdate','$todate','$comment','$status')";
	$query=mysqli_query($con,$sql);
	if ($query) {
		$msg="Booked Successfully";
	}else{
		$error="Something went wrong. Please try again";
	}
	
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>TMS | Package Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- Custom Theme files -->
	<script src="js/jquery-1.12.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!--animate-->
	<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
	<script src="js/wow.min.js"></script>
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<script>
		new WOW().init();
	</script>
	<script src="js/jquery-ui.js"></script>
	<script>
		$(function() {
			$( "#datepicker,#datepicker1" ).datepicker();
		});
	</script>
	<style>
		.errorWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #dd3d36;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
			box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
		}
		.succWrap{
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #5cb85c;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
			box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
		}
	</style>
</head>
<body>
	<!-- top-header -->
	<?php include('includes/header.php');?>
	<div class="banner-3">
		<div class="container">
			<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> TMS -Package Details</h1>
		</div>
	</div>
	<!--- /banner ---->
	<!--- selectroom ---->
	<div class="selectroom">
		<div class="container">
			<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
			else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
			<?php
			$id=intval($_GET['pkgid']);
			$sql = "SELECT * FROM tbl_tourpackage where id='$id'";
			$query=mysqli_query($con,$sql);
			$num=mysqli_num_rows($query);
			if ($num>0) {
				while ($result=mysqli_fetch_array($query)) {
					# code...
					?>
					<form name="book" method="post">
						<div class="selectroom_top">
							<div class="col-md-4 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
								<img src="images/<?php echo htmlentities($result['packageimage']);?>" class="img-responsive" alt="">
							</div>
							<div class="col-md-8 selectroom_right wow fadeInRight animated" data-wow-delay=".5s">
								<h2><?php echo htmlentities($result['packagename']);?></h2>
								<p class="dow">#PKG-<?php echo htmlentities($result['id']);?></p>
								<p><b>Package Type :</b> <?php echo htmlentities($result['packagetype']);?></p>
								<p><b>Package Location :</b> <?php echo htmlentities($result['packagelocation']);?></p>
								<p><b>Features</b> <?php echo htmlentities($result['packagefetures']);?></p>
								<div class="ban-bottom">
									<div class="bnr-right">
										<label class="inputLabel">From</label>
										<input class="date" id="datepicker" type="text" placeholder="dd-mm-yyyy"  name="fromdate" required="">
									</div>
									<div class="bnr-right">
										<label class="inputLabel">To</label>
										<input class="date" id="datepicker1" type="text" placeholder="dd-mm-yyyy" name="todate" required="">
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="grand">
									<p>Grand Total</p>
									<h3>USD.800</h3>
								</div>
							</div>
							<h3>Package Details</h3>
							<p style="padding-top: 1%"><?php echo htmlentities($result['packagedetails']);?> </p>
							<div class="clearfix"></div>
						</div>
						<div class="selectroom_top">
							<h2>Travels</h2>
							<div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp; margin-top: -70px">
								<ul>
									<li class="spe">
										<label class="inputLabel">Comment</label>
										<input class="special" type="text" name="comment" required="">
									</li>
									<?php if($_SESSION['login'])
									{?>
										<li class="spe" align="center">
											<button type="submit" name="submit2" class="btn-primary btn">Book</button>
										</li>
									<?php } else {?>
										<li class="sigi" align="center" style="margin-top: 1%">
											<a href="#" data-toggle="modal" data-target="#myModal4" class="btn-primary btn" > Book</a></li>
										<?php } ?>
										<div class="clearfix"></div>
									</ul>
								</div>
							</div>
						</form>
					<?php }} ?>
				</div>
			</div>
			<!--- /selectroom ---->
			<<!--- /footer-top ---->
			<?php include('includes/footer.php');?>
			<!-- signup -->
			<?php include('includes/signup.php');?>
			<!-- //signu -->
			<!-- signin -->
			<?php include('includes/signin.php');?>
			<!-- //signin -->
			<!-- write us -->
			<?php include('includes/write-us.php');?>
		</body>
		</html>