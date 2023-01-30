<?php
require 'validate.php';
require '../connection.php';



$loadFun="";
if(isset($_SESSION['lat']) && isset($_SESSION['lon'])){
  $lat=$_SESSION['lat'];
  $lon=$_SESSION['lon'];

  
   $timezone = date_default_timezone_set('Asia/Manila');
        $datetime = date('Y-m-d H:i:s', time());

$conn->query("UPDATE `deliveryman` SET `d_latitude` = '$lat', `d_longitude` = '$lon'
   WHERE `deliveryman_id` = '".$_SESSION['deliveryman_id']."'") or die(mysqli_error());

$conn->query("UPDATE `deliveryman` SET `last_update` = '$datetime'
   WHERE `deliveryman_id` = '".$_SESSION['deliveryman_id']."'") or die(mysqli_error());
  
  $res=mysqli_query($conn," SELECT product.product_id,product.image,product.product_name,product.product_type,product.volume,
  product.price, product.merchant_id, orderlist.order_id, orderlist.quantity, orderlist.total ,orderlist.status, orderlist.type,
  orderlist.date, customer.firstname, customer.lastname, customer.customer_id,customer.address,customer.barangay,customer.email,merchant.business_name,merchant.merchant_id,merchant.contact_number,
  deliveryman.name, deliveryman.deliveryman_id as delname ,
   (
      3959 * acos (
      cos ( radians($lat) )
      * cos( radians(customer.c_latitude) )
      * cos( radians(customer.c_longitude ) - radians($lon) )
      + sin ( radians($lat) )
      * sin( radians(customer.c_latitude) )
    )
) AS distance
  FROM orderlist 
  RIGHT JOIN product ON orderlist.product_id = product.product_id 
  RIGHT JOIN customer ON orderlist.customer_id = customer.customer_id
  RIGHT JOIN merchant ON orderlist.merchant_id = merchant.merchant_id
  RIGHT JOIN deliveryman ON orderlist.deliveryman_id = deliveryman.deliveryman_id
  WHERE orderlist.status = 'dispatched' && orderlist.deliveryman_id = '".$_SESSION['deliveryman_id']."' 
 
ORDER BY distance  ");



}else{
  $res=mysqli_query($conn," SELECT product.product_id,product.image,product.product_name,product.product_type,product.volume,
  product.price, product.merchant_id, orderlist.order_id, orderlist.quantity, orderlist.total ,orderlist.status, orderlist.type,
  orderlist.date, customer.firstname, customer.lastname, customer.customer_id,customer.address,customer.barangay,customer.email,merchant.business_name,merchant.merchant_id,merchant.contact_number,
  deliveryman.name, deliveryman.deliveryman_id as delname 
  FROM orderlist 
  RIGHT JOIN product ON orderlist.product_id = product.product_id 
  RIGHT JOIN merchant ON orderlist.merchant_id = merchant.merchant_id
  RIGHT JOIN customer ON orderlist.customer_id = customer.customer_id
  RIGHT JOIN deliveryman ON orderlist.deliveryman_id = deliveryman.deliveryman_id
  WHERE orderlist.status = 'dispatched' && orderlist.deliveryman_id = '".$_SESSION['deliveryman_id']."' ");
  $loadFun="onload='getLocation()'";
}




?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Delivery List</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../main.css">
        <meta http-equiv="refresh" content="60">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        <link rel = "icon" href = "images/logo.png" type = "image/png">

                 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    </head>

    <body style="background-color: white"  <?php echo $loadFun?>  >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <!-- Navbar-->
      <?php include 'navbar.php' ?>
       
      <center>
       <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4"  
      style="color:#004aad;text-shadow: 1px 1px #03a9f4;">DELIVERY LIST
      </p>



   
     
 <script>
    function error(err){
      //alert(err.message);
    }
    function success(pos){
      var lat=pos.coords.latitude;
      var lon=pos.coords.longitude;
      jQuery.ajax({
        url:'#',
        data:'lat='+lat+'&lon='+lon,
        type:'post',
        success:function(result){
          window.location.href='home.php'
        }
        
      });
    }
    function getLocation(){
      if(navigator.geolocation){
        navigator.geolocation.watchPosition(success,error);
      }else{
        
      }
    }
    </script>


   <div class="formBlock" id="autoClick" >
   
<?php

if(isset($_POST['lat']) && isset($_POST['lon'])){
  $_SESSION['lat']=$_POST['lat'];
  $_SESSION['lon']=$_POST['lon'];

  $lat=$_SESSION['lat'];
  $lon=$_SESSION['lon'];

  
   $timezone = date_default_timezone_set('Asia/Manila');
        $datetime = date('Y-m-d H:i:s', time());

$conn->query("UPDATE `deliveryman` SET `d_latitude` = '$lat', `d_longitude` = '$lon'
   WHERE `deliveryman_id` = '".$_SESSION['deliveryman_id']."'") or die(mysqli_error());

$conn->query("UPDATE `deliveryman` SET `last_update` = '$datetime'
   WHERE `deliveryman_id` = '".$_SESSION['deliveryman_id']."'") or die(mysqli_error());

}
?>
     
  </div>





<!--------- SECTION Start-------->
<section >
  <div class="container py-5">
    <div class="row">


 <?php 


$no=mysqli_query($conn," SELECT product.product_id,product.image,product.product_name,product.product_type,product.volume,
  product.price, product.merchant_id, orderlist.order_id, orderlist.quantity, orderlist.total ,orderlist.status, orderlist.type,
  orderlist.date, customer.firstname, customer.lastname, customer.customer_id,customer.address,customer.barangay,customer.email,merchant.business_name,merchant.merchant_id,merchant.contact_number,
  deliveryman.name, deliveryman.deliveryman_id as delname
  
  FROM orderlist 
  RIGHT JOIN product ON orderlist.product_id = product.product_id 
  RIGHT JOIN customer ON orderlist.customer_id = customer.customer_id
  RIGHT JOIN merchant ON orderlist.merchant_id = merchant.merchant_id
  RIGHT JOIN deliveryman ON orderlist.deliveryman_id = deliveryman.deliveryman_id
  WHERE orderlist.status = 'dispatched' && orderlist.deliveryman_id = '".$_SESSION['deliveryman_id']."' 
 
 ");
$count = mysqli_num_rows($no);

if ($count > 0) {

 while($fetch=mysqli_fetch_assoc($res)){

 

  ?>
    
      <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
        
        <form action="action.php" method="POST" enctype="multipart/form-data" > 
          <input type="hidden" value="<?php echo $fetch['product_id']?>" name="product_id">
             <input type="hidden" value="<?php echo $fetch['image']?>" name="image">
             <input type="hidden" value="<?php echo $fetch['product_type']?>" name="product_type">
             <input type="hidden" value="<?php echo $fetch['product_type']?>" name="product_name">
            <input type="hidden" value="<?php echo $fetch['price']?>" name="price">
            <input type="hidden" value="<?php echo $fetch['volume']?>" name="volume">
            <input type="hidden" value="<?php echo $fetch['merchant_id']?>" name="merchant_id">
             <input type="hidden" value="<?php echo $fetch['business_name']?>" name="business_name">
            <input type="hidden" value="<?php echo $fetch['customer_id']?>" name="customer_id">
            <input type="hidden" value="<?php echo $fetch['firstname']?>" name="firstname">
             <input type="hidden" value="<?php echo $fetch['lastname']?>" name="lastname">
            <input type="hidden" value="<?php echo $fetch['barangay']?>" name="barangay">
            <input type="hidden" value="<?php echo $fetch['address']?>" name="address">
             <input type="hidden" value="<?php echo $fetch['contact_number']?>" name="contact_number">
            <input type="hidden" value="<?php echo $fetch['email']?>" name="email">
            <input type="hidden" value="<?php echo $fetch['quantity']?>" name="quantity">
            <input type="hidden" value="<?php echo $fetch['quantity'] * $fetch['price']?>" name="total">
            <input type="hidden" value="<?php echo $fetch['type']?>" name="type">
               <input type="hidden" value="<?php echo $fetch['date']?>" name="date">
            <input type="hidden" value="<?php echo $fetch['order_id']?>" name="order_id">

        <div class="card">
           <div class="d-flex flex-row comment-user">
              <img class="rounded" src = "../img/user.png" width="30" height="30" style="margin-left:20px; margin-top: 10px">
                <h5 style="font-weight: 550;margin-top: 15px; margin-left:2px" >
                   &nbsp<?php echo $fetch['firstname']?> <?php echo $fetch['lastname']?>
               </h5>     
            </div> 
          <img src = "../photo/<?php echo $fetch['image']?>" style="width: 200px;height: 200px; margin-bottom: 5px;" />          
            
             <div>
                <table>
                  <tr> 
                  <td valign="top" style="padding-left:20px;"> 
                    <div style=" margin-top:-200px; margin-left: 150px;">
            
                      <p style="font-size:14px;margin-top:10px;">Product Name: <?php echo $fetch['product_name']?><p>
                      <p style="font-size:14px;margin-top:-18px;">Price:  &#8369;<?php echo $fetch['price']?>.00<p>
                      <p style="font-size:14px;margin-top:-18px;">Quantity: <?php echo $fetch['quantity']?><p>
                     <p style="font-size:14px;margin-top:-18px;">Total:  &#8369;<?php echo $fetch['quantity']* $fetch['price']?>.00<p>
                      <p style="font-size:14px;margin-top:-18px;">Reference #: AS <?php echo date("mdY-", strtotime($fetch['date']))?><?php echo $fetch['order_id']?> <p>
                      <p style="font-size:14px;margin-top:-18px;">Distance: 
                          <?php 

                            $x=$fetch['distance']*1.609344;
                            $y=1000;

                           if ( $x > 1 ) {
                              echo round($x,2);
                              echo " KM";

                           }elseif ($x < 1) {
                              echo  round($x * $y,2);
                              echo " M";
                           }
                       
                       ?>   <a href = "delivery_destination.php?order_id=<?php echo $fetch['order_id']?>">
                    <i class='fas fa-eye' style="color:black;text-shadow: 2px 2px white; font-size: 14px;">
                    </i></a>

                        <p>
                     <p style="font-size:14px;margin-top:-18px;">Address: <?php echo $fetch['address']?>
                      <?php echo $fetch['barangay']?> Nasugbu,Batangas <p>   
                     <a onclick="window.location='delivery_details.php?order_id=<?php echo $fetch['order_id']?>'" class="myButton" style="color:#fff;margin:5px;width: 155px;font-size:14px">More Details</a>
                      <button type="submit"  name="submitDeliver"  class="myButton" style="color:#fff;margin:5px; font-size:14px;">Set as Delivered</button>
                    </div>
                 </td>
                </tr> 
              </table>

          </div>
        </div><br>
        
    </form>
      </div>

   
<?php
    }


     } else{
      $conn->query("UPDATE `deliveryman` SET `status` = 'available' WHERE `deliveryman_id`= '".$_SESSION['deliveryman_id']."' " ) or die(mysqli_error());
            
     }
  ?> 

        </div>
      </div>
</section>
<!--------- SECTION END-------->





    </body>
</html>


<style>
.card{
  box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
}
.myButton {
  
  background:linear-gradient(to bottom,  #2196F3 0%, #0d6edf 100%);
  border-radius:6px;
  display:inline-block;
  cursor:pointer;
  color:#fff;
  font-family:Arial;
  font-size:15px;
  font-weight:bold;
  padding:6px 24px;
  text-decoration:none;
  border-color: transparent;

}
.myButton:hover {
  background-color: $blue-500;
  background:linear-gradient(to bottom, #0d6edf 5%, #2196F3 100%);
}
/*h5 {
  width: 150px;
  color:#000;
  padding:20px 0px;
}*/
.myButton:active {
  position:relative;
  top:1px;
}


</style>




    </body>
</html>



<!--
<style>
  * {
        color: black;
  }
  .container {

    /* display: flex;
    flex-direction: column; */
    background-color:#FFF;
    /* border:12px solid #FFF;
    min-height: 500px;
    width:80%;margin:5px;
    padding-bottom:10px; */

  }
  td{
    //font-size: 10px;
    white-space: nowrap;
  }
  th {
    //font-size: 10px;
    white-space: nowrap;
  }
.select-container {
  display: flex;
  justify-content: center;
  align-items: center;
}
  .list {
    display: flex; 
    width: 100%;
    border:2px solid #000;
  }
  label {
    font-size: 12px;
  }
.myButton {
  box-shadow:inset 0px 1px 0px 0px #fff6af;
  background:linear-gradient(to bottom, #ffec64 5%, #ffab23 100%);
  background-color:#ffec64;
  border-radius:6px;
  border:1px solid #ffaa22;
  display:inline-block;
  cursor:pointer;
  color:#333333;
  font-family:Arial;
  font-size:15px;
  font-weight:bold;
  padding:6px 24px;
  text-decoration:none;
  text-shadow:0px 1px 0px #ffee66;
}
.myButton:hover {
  background:linear-gradient(to bottom, #ffab23 5%, #ffec64 100%);
  background-color:#ffab23;
}
h5 {
  width: 150px;
  color:#000;
  padding:20px 0px;
}
.myButton:active {
  position:relative;
  top:1px;
}
</style>