<?php session_start();
include_once('includes/config.php');
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Laundry Form | Laundry Management System</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

        <style>
          .select-box{
            position: relative;
          }
          .select-box select{
            height: 56px;
            padding: 10px 15px;
            line-height: 18px;
            font-size: 16px;
            width: 81%;
            border: 1px solid #ccc;
            border-radius: 4px;
          }
          .select-box:after{
            content: "";
            position: absolute;
            right: 10px;
            top: 50%;
            margin-top: -5px;
            border-top: 8px solid #ccc;
            border-top: 6px solid transparent;
            border-top: 6px solid transparent;
            pointer-events: none;
          }
          .select-box select:focus{
            /* border: 2px solid green; */
            box-shadow: 0px 0px 12px 2px skyblue;
          }
          .total_price{
            height: 56px;
            padding: 10px 15px;
            line-height: 18px;
            font-size: 16px;
            width: 81%;
            border: 1px solid #ccc;
            border-radius: 4px;
          }
          .total_price:focus{
            box-shadow: 0px 0px 12px 2px skyblue;
          }

          .totaldressprice{
            height: 56px;
            padding: 10px 15px;
            line-height: 18px;
            font-size: 16px;
            width: 84%;
            border: 1px solid #ccc;
            border-radius: 4px;
          }
          .totaldressprice:focus{
            box-shadow: 0px 0px 12px 2px skyblue;
          }

          .address{
            height: 56px;
            padding: 10px 15px;
            line-height: 18px;
            font-size: 16px;
            width: 85%;
            border: 1px solid #ccc;
            border-radius: 4px;
          }
          .address:focus{
            box-shadow: 0px 0px 12px 2px skyblue;
          }

          .select-box .service_type{
            width: 100%;
            height: 56px;
          }
          .address{
            width: 94%;
            height: 56px;
          }
        </style>
    </head>
    <body class="sb-nav-fixed">
      <?php include_once('includes/navbar.php');?>
        <div id="layoutSidenav">
          <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        
<?php 
$userid=$_SESSION['id'];
$query=mysqli_query($con,"select * from users where id='$userid'");
while($result=mysqli_fetch_array($query))
{?>
                        <h1 class="mt-4"><?php echo $result['fname'];?>'s Laundry Request Form</h1>

<?php
if(isset($_GET['success'])){?>
  <div class="alert alert-success" role="alert">
  <h6>Request Sent Successfull.</h6>
</div>
<?php
}
?>

<form method="post" action="laundry_submit.php">

<div class="row mb-3">
<div class="col-md-6">
<div class="form-floating mb-3 mb-md-0">
<input class="form-control" id="name" name="name" type="text" placeholder="Enter your full name" required />
<label for="inputName">Full name</label>
</div>
</div>
                                                
<div class="col-md-6">
<div class="form-floating">
<input class="form-control" id="contactno" name="contactno" type="text" placeholder="1234567890" required pattern="[0-9]{10}" title="10 numeric characters only"  maxlength="10" required />
 <label for="inputPhone">Contact Number</label>
</div>
</div>
</div>


<div class="row mb-3">
<div class="col-md-6 select-box">
<label for="">Total Dresses</label>
<select name="total_dress" id="total_dress" onchange="totaldress(this.value)">
    <option value="0">0</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
  </select>
</div>

<!-- <div class="select-box col-md-6">
<label for="">Dress Price</label>
<input type="text" class="totaldressprice" id="totaldressprice" readonly>
</div> -->
</div>


<div class="row mb-3">
<div class="select-box col-md-6">
  <select  name="service_type"  class="service_type" id="service_type" onchange="handleSelect()">
    <option>--Select service type--</option>
    <option value="Dry Wash" id="drywash">Dry wash</option>
    <option value="Wash & Iron" id="wash_iron">Wash & Iron</option>
    <option value="Only Iron" id="onlyiron">Only Iron</option>
    <option value="Lacromat" id="lacromat">Lacromat</option>
  </select>
</div>

<div class="select-box col-md-6">
<label for="">Total Price</label>
<span>(&#8377;)</span>
<input type="text" name="total_price" class="total_price" id="total_price" readonly>
</div>
</div>

<div class="row mb-3">
<div class="col-md-12 select-box">
<label for="">Address</label>
<input type="text" name="address" class="address" id="address" required>
</div>
</div>

<div class="mt-4 mb-0">
<div class="d-grid"><button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button></div>

</div>
</form>
<?php } ?>

                    </div>
                </main>
          <?php include('includes/footer.php');?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script>
          
          function drywash_price(x){
            return x * 60 ;
          }

          function wash_iron_price(x){
            return x * 70;
          }

          function only_iron_price(x){
            return x * 50 ;
          }

          function lacromat_price(x){
            return x * 40 ;
          }

          document.getElementById("service_type").onchange = function() {

            if (this.value == 'Dry Wash') {
                var n1 = Number(document.getElementById('total_dress').value);
                var sum = drywash_price(n1);
                document.getElementById('total_price').value = sum;
              }

            if (this.value == 'Wash & Iron') {
                var n1 = Number(document.getElementById('total_dress').value);
                var sum = wash_iron_price(n1);
                document.getElementById('total_price').value = sum;
              }

              if (this.value == 'Only Iron') {
                var n1 = Number(document.getElementById('total_dress').value);
                var sum = only_iron_price(n1);
                document.getElementById('total_price').value = sum;
              }

              if (this.value == 'Lacromat') {
                var n1 = Number(document.getElementById('total_dress').value);
                var sum = lacromat_price(n1);
                document.getElementById('total_price').value = sum;
              }

          }
        </script>
    </body>
</html>
<?php } ?>

