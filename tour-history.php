<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
{
	header('location:index.php');
}
else{
	if (isset($_GET['bkid'])) {
		$id=$_GET['bkid'];
		$email=$_SESSION['login'];
		$sql="SELECT * FROM tbl_booking WHERE useremail='$email' AND id='$id'";
		$query=mysqli_query($con,$sql);
		$num=mysqli_num_rows($query);
		if ($num>0) {
			while ($result=mysqli_fetch_array($query)) {
				$date1=$result['fromdate'];
				$cdate=date('Y-m-d');
				$val1=date_create($date1);
				$val2=date_create($cdate);
				$dif=date_diff($val2,$val1);
				$daysdiff = $dif->format("%R%a");
				$daysdiff = abs($daysdiff);
				if ($daysdiff>1) {
					$status=2;
					$cancellby='u';
					$upsql="UPDATE tbl_booking SET status='$status',cancellby='$cancellby' WHERE useremail='$email' AND id='$id'";
					$upquery=mysqli_query($con,$upsql);
					if ($upquery) {
						$msg="Booking Cancelled successfully";
					}else{
						$msg="Booking Not  Cancelled successfully";
					}

				}else{
					$error="You can't cancel booking before 24 hours";
				}
			}
		}




	}
	?>
	<!DOCTYPE HTML>
	<html>
	<head>
		<title>TMS | Tourism Management System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Tourism Management System In PHP" />
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
		<script>
			new WOW().init();
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
		<div class="top-header">
			<?php include('includes/header.php');?>
			<div class="banner-1 ">
				<div class="container">
					<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">TMS-Tourism Management System</h1>
				</div>
			</div>
			<!--- /banner-1 ---->
			<!--- privacy ---->
			<div class="privacy">
				<div class="container">
					<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">My Tour History</h3>
					<form name="chngpwd" method="post" onSubmit="return valid();">
						<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
						else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
						<p>
							<table border="1" width="100%">
								<tr align="center">
									<th>#</th>
									<th>Booking Id</th>
									<th>Package Name</th>
									<th>From</th>
									<th>To</th>
									<th>Comment</th>
									<th>Status</th>
									<th>Booking Date</th>
									<th>Action</th>
								</tr>
								<?php
								$useremail=$_SESSION['login'];
								$sql="SELECT tbl_booking.id as bookid,tbl_booking.packageid as pkgid,tbl_tourpackage.packagename as packagename,tbl_booking.fromdate as fromdate,tbl_booking.todate as todate,tbl_booking.comment as comment,tbl_booking.status as status,tbl_booking.regdate as regdate,tbl_booking.cancellby as cancelby,tbl_booking.updatedate as upddate FROM tbl_booking JOIN tbl_tourpackage on tbl_tourpackage.id=tbl_booking.packageid WHERE useremail='$useremail'";
								$query=mysqli_query($con,$sql);
								$num=mysqli_num_rows($query);
								if ($num>0) {
									$cont=1;
									while ($result=mysqli_fetch_array($query)) {
										?>
										<tr align="center">
											<td><?php echo htmlentities($cont);?></td>
											<td>#BK<?php echo htmlentities($result['bookid']);?></td>
											<td><a href="package-details.php?pkgid=<?php echo htmlentities($result['pkgid']);?>"><?php echo htmlentities($result['packagename']);?></a></td>
											<td><?php echo htmlentities($result['fromdate']);?></td>
											<td><?php echo htmlentities($result['todate']);?></td>
											<td><?php echo htmlentities($result['regdate']);?></td>
											<td><?php if($result['status']==0)
											{
												echo "Pending";
											}
											if($result['status']==1)
											{
												echo "Confirmed";
											}
											if($result['status']==2 and  $result['cancelby']=='u')
											{
												echo "Canceled by you at " .$result['upddate'];
											}
											if($result['status']==2 and  $result['cancelby']=='a')
											{
												echo "Canceled by Admin at " .$result['upddate'];
											}

											?></td>
											<td><?php echo htmlentities($result['regdate']);?></td>
											<?php if($result['status']==2)
											{
												?><td>Cancelled</td>
											<?php } else {?>
												<td><a href="tour-history.php?bkid=<?php echo htmlentities($result['bookid']);?>" onclick="return confirm('Do you really want to cancel booking')" >Cancel</a></td>
											<?php }?>
										</tr>
										<?php $cont++; }} ?>
									</table>

								</p>
							</form>

						</div>
					</div>
					<!--- /privacy ---->
					<!--- footer-top ---->
					<!--- /footer-top ---->
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
				<?php } ?>