<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{
  header('location:index.php');
}
else{
  $id=intval($_GET['iid']);
  if(isset($_POST['submit2']))
  {
    $adminremark=$_POST['adminremark'];
    $sql = "UPDATE tbl_issu SET adminremark='$adminremark' WHERE  id='$id'";
    $query=mysqli_query($con,$sql);
    if ($query) {
      $msg="Remark  successfully Updated";
    }
  }
  ?>
  <script language="javascript" type="text/javascript">
    function f2()
    {
      window.close();
    }ser
    function f3()
    {
      window.print();
    }
  </script>
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Update Compliant</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="anuj.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div style="margin-left:50px;">
      <form name="updateticket" id="updateticket" method="post">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr height="50">
            <td colspan="2" class="fontkink2" style="padding-left:0px;"><div class="fontpink2"> <b>Update Remark !</b></div></td>
            
          </tr>
          
          <tr>
            <td colspan="2" >  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
            else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?></td>
            
          </tr>
          <tbody>
            <?php
            $sql = "SELECT * from tbl_issu where id='$id'";
            $query=mysqli_query($con,$sql);
            $num=mysqli_num_rows($query);
            if ($num>0) {
              while ($result=mysqli_fetch_array($query)) {
                if ($result['adminremark']=='') {
                  ?>
                  
                  <tr style=''>
                    <td class="fontkink1" >Remark:</td>
                    <td class="fontkink" align="justify" ><span class="fontkink">
                      <textarea cols="50" rows="7" name="adminremark" required="required" ></textarea>
                    </span></td>
                  </tr>
                  <tr>
                    <td class="fontkink1">&nbsp;</td>
                    <td  >&nbsp;</td>
                  </tr>
                  <tr>
                    <td class="fontkink">       </td>
                    <td  class="fontkink"> <input type="submit" name="submit2"  value="update"   size="40" style="cursor: pointer;" /></td>
                  </tr>
                <?php } else { ?>
                  <tr>
                    <td class="fontkink1" ><b>Remark:</b></td>
                    <td class="fontkink" align="justify" ><?php echo htmlentities($result['adminremark']);?></td>
                  </tr>
                  <tr>
                    <td class="fontkink1" ><b>Remark Date:</b></td>
                    <td class="fontkink" align="justify" ><?php echo htmlentities($result['remarkdate']);?></td>
                  </tr>
                <?php }}}?>
                
                
                
              </table>
            </form>
          </div>
        </body>
        </html>
        <?php } ?>