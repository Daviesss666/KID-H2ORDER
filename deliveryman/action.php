<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Order_Details</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../main.css">
        <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
        <link rel = "icon" href = "images/logo.png" type = "image/png">
    </head>
    <body style="background-color: white">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<?php
require 'validate.php';
require '../connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


    if(ISSET($_POST['submitDeliver'])){
    $product_id= $_POST['product_id'];
    $customer_id = $_POST['customer_id'];
        $merchant_id = $_POST['merchant_id'];
        $order_id = $_POST['order_id'];
        $quantity = $_POST['quantity'];

        $total = $_POST['total'];
         $image = $_POST['image'];
        $business_name= $_POST['business_name'];
        $product_name= $_POST['product_name'];
        $product_type= $_POST['product_type'];
        $volume =  $_POST['volume'];
        $date =  $_POST['date'];
        $firstname= $_POST['firstname'];
        $email = $_POST['email'];
        $lastname =  $_POST['lastname'];   
        $address =  $_POST['address'];
        $barangay =  $_POST['barangay']; 
         $price =  $_POST['price']; 
         $contact_number =  $_POST['contact_number'];
         $type= $_POST['type'];


        $conn->query("UPDATE `orderlist` SET `status` = 'delivered' WHERE `order_id`= $order_id" ) or die(mysqli_error());

        $conn->query("INSERT INTO `transactions`(customer_id, product_id, merchant_id, deliveryman_id, quantity, total) 
        VALUES('$customer_id','$product_id','$merchant_id','".$_SESSION['deliveryman_id']."','$quantity','$total' )") 
        or die(mysqli_error());

         if ($order_id == 0) {       
            $conn->query("UPDATE `deliveryman` SET `status` = 'available' WHERE `deliveryman_id`= '".$_SESSION['deliveryman_id']."' " ) or die(mysqli_error());
            }


        
        
$ee=' 
      <div class="container">      
          <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>       
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px; ">          
            <tr>
                <td style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                            <img src="https://img.icons8.com/external-avoca-kerismaker/344/external-Recieved-logistic-avoca-kerismaker.png" width="125" height="120" style="display: block; border: 0px;" /><br>
                            <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
                                Your order has arrived!
                            </h2>
                        </td>
                    </tr>                 
                        <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 50px;">
                            <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
                                Hi '.$firstname.', <br><br> Good news! Your order from ' . $business_name . ' has been delivered. Thank you for choosing us stay hydrated.
                            </p>
                        </td>
                        <br><br>
                       
                   <tr>

                        <td  style="padding-top: 20px;"> 
                         <center><img src = "cid:blue" style="width: 200px;height: 200px; margin-bottom: 5px;" /></center> 
                                   <div class="d-flex justify-content-between p-3"> <p class="lead mb-0" style="font-weight: 550">
                                 Reference #: AS  '.date("mdY-", strtotime($date)).''.$order_id.'</p>
                                    </div>
                                <div class="d-flex justify-content-center mb-3">
                                <h4 class="mb-0" style="font-weight:550">PRODUCT DETAILS</h4>
                                </div>
                                 <hr>
                                 <div class="d-flex justify-content-between">
                                  <p class="card-text" style="font-weight: 550">Product Name: '.$product_name.' </p>                                        
                                 </div>
                                 <div class="d-flex justify-content-between">
                                  <p class="card-text" style="font-weight:550;margin-top:-10px;">Product Type: '.$product_type.' </p>       
                                 </div> 
                                 <div class="d-flex justify-content-between">
                                  <p class="card-text" style="font-weight:550;margin-top:-10px;">Volume: '.$volume.'</p>       
                                 </div>
                                 <div class="d-flex justify-content-between">
                                  <p class="card-text" style="font-weight:550;margin-top:-10px;">Seller: '.$business_name.'</p>       
                                 </div> 
                                 <div class="d-flex justify-content-between">
                                  <p class="card-text" style="font-weight:550;margin-top:-10px;">Date Ordered: '.$date.'</p>      
                                 </div>

                                 <br>
                                       <!------------- CUSTOMER DETAILS ---------------->
                                       <div class="d-flex justify-content-center mb-3">
                                      <h4 class="mb-0" style="font-weight: 550">CUSTOMER DETAILS</h4>
                                      </div>
                                     <hr>
                                    <div class="d-flex justify-content-between">
                                      <p class="card-text" style="font-weight: 550">Name: '.$firstname.' '.$lastname.'</p>      
                                     </div>
                                     <div class="d-flex justify-content-between">
                                      <p class="card-text" style="font-weight:550;margin-top:-10px;">Address: '.$address.' '.$barangay.' Nasugbu,Batangas </p>       
                                     </div> 
                                     <div class="d-flex justify-content-between">
                                      <p class="card-text" style="font-weight:550;margin-top:-10px;">Contact: '.$contact_number.' </p>     
                                     </div>
                                      <br>
                                       <!------------- PAYMENT DETAILS ---------------->
                                       <div class="d-flex justify-content-center mb-3">
                                      <h4 class="mb-0" style="font-weight: 550">PAYMENT DETAILS</h4>
                                      </div>
                                     <hr>
                                    <div class="d-flex justify-content-between">
                                      <p class="card-text" style="font-weight: 550">Price: &#8369; '.$price.'.00</p>     
                                     </div>
                                     <div class="d-flex justify-content-between">
                                      <p class="card-text" style="font-weight:550;margin-top:-10px;">Quantity: '.$quantity.' </p>
                                     <div class="d-flex justify-content-between">
                                      <p class="card-text" style="font-weight:550;margin-top:-10px;">Total: &#8369; '.$total.'.00</p>     
                                     </div>
                                      <div class="d-flex justify-content-between">
                                         <p class="card-text" style="font-weight:550;margin-top:-10px;">Type: '.strtoupper($type).'</p>         
                                     </div>                            
                        </td>
                    </tr>                   
                </table>              
                </td>
            </tr><br>          
                   <tr>
                        <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px;">
                            <p style="font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;">
                                '.strtoupper('This is a system generated message do not reply on this email.').'
                            </p>
                        </td>
                    </tr>
                </table>
                </td>
            </tr>
        </table>
        </td>
    </tr>
</table>
      </div>';



$mail = new PHPMailer(true);

try {
 
                
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                           //Send using SMTP     
    $mail->SMTPAuth   = true;                                       //Enable SMTP authentication
    $mail->Username   = 'davebryansevilla31@gmail.com';             //SMTP username       
    $mail->Password   = 'brrqybcrzgkdnyyh';                         //SMTP password    
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                //Enable  `PHPMailer::ENCRYPTION_SMTPS`; TLS encryption encouraged
    $mail->Port       = 465;                                        //TCP port to connect to, use 587 for TLS

  
    $mail->setFrom('noreply@gmail.com', 'H2ORDER');
    $mail->addAddress($email);                                               //Add a recipient
    $mail->addReplyTo('davebryansevilla31@gmail.com', 'Do-Not-Reply');          //Name is optional
    $mail->isHTML(true);                                 
    $mail->Subject = "Your #".date("mdY-", strtotime($date)).''.$order_id." order has been delivered";
    $mail->Body    =  $ee ;   
    $mail->AddEmbeddedImage('../photo/'.$image.'','blue');         //Add attachments optional name
    $mail->AltBody = 'This is a system generated message do not reply on this email.';
    $mail->send();
    //echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}




        echo ("<script>
        alert('Item has been delivered successfully');
        document.location.href = 'home.php';
        </script>");


       
  }


///////////-------------EDIT DELIVERYMAN'S ACCOUNT ------------/////
  if(ISSET($_POST['editProfile'])){

        $name= $_POST['name'];
    $contact_number = $_POST['contact_number'];
    $plate_number = $_POST['plate_number'];
    $username = $_POST['username'];
  

$conn->query("UPDATE `deliveryman` SET `username` = '$username', `name` = '$name', `contact_number` = '$contact_number'
  , `plate_number` = '$plate_number' WHERE `deliveryman_id` = '".$_REQUEST['deliveryman_id']."'") or die(mysqli_error());
  
  echo ("<script>
    alert('Your Personal Information has been Update successfully');
    document.location.href = 'settings.php';
    </script>");
  }


///////////-------------EDIT DELIVERYMAN'S Vaccination Stat ------------/////
  if(ISSET($_POST['editVacstat'])){

        $vaccination_status= $_POST['vaccination_status'];

$conn->query("UPDATE `deliveryman` SET `vaccination_status` = '$vaccination_status'
             WHERE `deliveryman_id` = '".$_REQUEST['deliveryman_id']."'") or die(mysqli_error());
  
  echo ("<script>
    alert('Your vaccination status has been update successfully');
    document.location.href = 'settings.php';
    </script>");
  }


///////////-------------EDIT DELIVERYMAN'S Vaccination Card ------------/////
  if(ISSET($_POST['editVcard'])){

     $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
        $photo_name = addslashes($_FILES['photo']['name']);
        $photo_size = getimagesize($_FILES['photo']['tmp_name']);
        move_uploaded_file($_FILES['photo']['tmp_name'],"../photo/" . $_FILES['photo']['name']);  

$conn->query("UPDATE `deliveryman` SET `photo` = '$photo_name'
             WHERE `deliveryman_id` = '".$_REQUEST['deliveryman_id']."'") or die(mysqli_error());
  
  echo ("<script>
    alert('Your vaccination card has been upload successfully');
    document.location.href = 'settings.php';
    </script>");
  }



?>




   </body>
</html>
