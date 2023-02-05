<?php session_start();
include_once('includes/config.php');
$name = $_POST['name'];
$contactno = $_POST['contactno'];
$total_dress = $_POST['total_dress'];
$service_type = $_POST['service_type'];
$total_price = $_POST['total_price'];
$address = $_POST['address'];

$sql = "INSERT INTO laundry_request(name,contactno,total_dress,service_type,total_price,address) VALUES('$name','$contactno','$total_dress','$service_type','$total_price','$address')";
$result = mysqli_query($con,$sql);
if(!$result){
    echo "Failed".mysqli_error($con);
    exit;
}
header("Location: laundry_form.php?success=Data Entered Successfull");
// echo "Data entered successfull";
mysqli_close($con);

?>