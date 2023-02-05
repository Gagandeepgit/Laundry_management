<?php session_start();
include_once('../includes/config.php');
if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');
  } else{
// Code for Updation 
if(isset($_POST['update']))
{
    $name=$_POST['name'];
    $contact=$_POST['contactno'];
    $total_dress=$_POST['total_dress'];
    $service_type=$_POST['service_type'];
    $total_price=$_POST['total_price'];
    $address=$_POST['address'];
$userid=$_GET['uid'];
    $msg=mysqli_query($con,"update laundry_request set name='$name',contactno='$contact',total_dress='$total_dress',service_type='$service_type',total_price='$total_price',address='$address' where id='$userid'");

if($msg)
{
    echo "<script>alert('Order updated successfully');</script>";
       echo "<script type='text/javascript'> document.location = 'lastthirtydays-order.php'; </script>";
}
}   
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Edit Profile | Laundry Management System</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
      <?php include_once('includes/navbar.php');?>
        <div id="layoutSidenav">
          <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        
<?php 
$userid=$_GET['uid'];
$query=mysqli_query($con,"select * from laundry_request where id='$userid'");
while($result=mysqli_fetch_array($query))
{?>
                        <h1 class="mt-4"><?php echo $result['name'];?>'s Order</h1>
                        <div class="card mb-4">
                     <form method="post">
                            <div class="card-body">
                                <table class="table table-bordered">
                                   <tr>
                                    <th>Full Name</th>
                                       <td><input class="form-control" id="name" name="name" type="text" value="<?php echo $result['name'];?>" required /></td>
                                   </tr>
                                   <tr>
                                       <th>Contact No.</th>
                                       <td><input class="form-control" id="contactno" name="contactno" type="text" value="<?php echo $result['contactno'];?>"  pattern="[0-9]{10}" title="10 numeric characters only"  maxlength="10" required /></td>
                                   </tr>
                                         <tr>
                                       <th>Total Dress</th>
                                       <td colspan="3"><input class="form-control" id="total_dress" name="total_dress" type="text" value="<?php echo $result['total_dress'];?>" required /></td>
                                   </tr>
                                   <tr>
                                       <th>Service Type</th>
                                       <td><input class="form-control" id="service_type" name="service_type" type="text" value="<?php echo $result['service_type'];?>"  required /></td>
                                   </tr>
                                   <tr>
                                       <th>Total Price <span>(&#8377;)</span></th>
                                       <td><input class="form-control" id="total_price" name="total_price" type="text" value="<?php echo $result['total_price'];?>" required /></td>
                                   </tr>
                                     
                                    <tr>
                                       <th>Address</th>
                                       <td><input class="form-control" id="address" name="address" type="text" value="<?php echo $result['address'];?>" required /></td>
                                   </tr>
                                   <tr>
                                       <th>Order Date</th>
                                       <td colspan="3"><?php echo $result['posting_date'];?></td>
                                   </tr>
                                   <tr>
                                       <td colspan="4" style="text-align:center ;">
                                       <button type="submit" class="btn btn-primary btn-block" name="update">Update</button></td>

                                   </tr>
                                    </tbody>
                                </table>
                            </div>
                            </form>
                        </div>
<?php } ?>

                    </div>
                </main>
          <?php include('../includes/footer.php');?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>
