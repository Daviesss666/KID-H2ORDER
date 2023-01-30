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

    if(ISSET($_POST['submitApprove'])){
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
        
        // echo ("<script>
        // alert('$order_id');
        // </script>");


        $conn->query("UPDATE `orderlist` SET `status` = 'accepted',  `receipt_status` = 'complete' WHERE `order_id`= $order_id  && `merchant_id` = '".$_SESSION['merchant_id']."'" ) or die(mysqli_error());



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
                            <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="125" height="120" style="display: block; border: 0px;" /><br>
                            <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
                                Your order has been approved!
                            </h2>
                        </td>
                    </tr>                 
                        <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 50px;">
                            <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
                                Hi '.$firstname.', <br><br> Good news! Your order from ' . $business_name . ' has been approved. We will notify you until the item(s) is ready for dispatching.
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
    $mail->SMTPAuth   =  true;                                       //Enable SMTP authentication
    $mail->Username   = 'davebryansevilla31@gmail.com';             //SMTP username       
    $mail->Password   = 'brrqybcrzgkdnyyh';                         //SMTP password    
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                //Enable  `PHPMailer::ENCRYPTION_SMTPS`; TLS encryption encouraged
    $mail->Port       = 465;                                        //TCP port to connect to, use 587 for TLS

  
    $mail->setFrom('noreply@gmail.com', 'H2ORDER');
    $mail->addAddress($email);                                               //Add a recipient
    $mail->addReplyTo('davebryansevilla31@gmail.com', 'Do-Not-Reply');          //Name is optional
    $mail->isHTML(true);                                 
    $mail->Subject = "Your #".date("mdY-", strtotime($date)).''.$order_id." order has been approved";
    $mail->Body    =  $ee ;   
    $mail->AddEmbeddedImage('../photo/'.$image.'','blue');         //Add attachments optional name
    $mail->AltBody = 'This is a system generated message do not reply on this email.';
    $mail->send();
    //echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

        echo ("<script>
        alert('Approved');
        document.location.href = 'accepted_order.php';
        </script>");

    }

//=================================Dispatch==================//
    if(ISSET($_POST['submitDispatch'])){
        $product_id= $_POST['product_id'];
        $customer_id = $_POST['customer_id'];
        $merchant_id = $_POST['merchant_id'];
        $order_id = $_POST['order_id'];
        $quantity = $_POST['quantity'];
        $deliveryman_id = $_POST['deliveryman'];
        $total = $_POST['total'];
        // echo ("<script>
        // alert('$order_id');
        // </script>");


        $conn->query("UPDATE `orderlist` SET `status` = 'dispatched', `deliveryman_id`= $deliveryman_id  WHERE `order_id`= $order_id  && `merchant_id` = '".$_SESSION['merchant_id']."'" ) or die(mysqli_error());

        echo ("<script>
        alert('Ready to deliver');
        document.location.href = 'delivery_list.php';
        </script>");

    }



    if(isset($_POST['but_update'])){

  if(isset($_POST['update'])){
    foreach($_POST['update'] as $updateid){

        $product_id= $_POST['product_id'.$updateid];
        $customer_id = $_POST['customer_id'.$updateid];
        $merchant_id = $_POST['merchant_id'.$updateid];
        $order_id = $_POST['order_id'.$updateid];
        $quantity = $_POST['quantity'.$updateid];
        $deliveryman_id = $_POST['deliveryman'.$updateid];
        $total = $_POST['total'.$updateid];
      

      
         $updateUser = "UPDATE orderlist SET 
                      `status` = 'dispatched', `deliveryman_id`= $deliveryman_id 
                      WHERE  `merchant_id` = '".$_SESSION['merchant_id']."' && order_id=".$updateid;
         mysqli_query($conn,$updateUser);
      

    }
  }

}





//=================================CANCEL==================//
     if(ISSET($_POST['submitCancel'])){
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
        // echo ("<script>
        // alert('$order_id');
        // </script>");


        $conn->query("UPDATE `orderlist` SET `status` = 'cancelled' WHERE `order_id`= $order_id  && `merchant_id` = '".$_SESSION['merchant_id']."'" ) or die(mysqli_error());

        
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
                            <img src="https://img.icons8.com/external-flat-wichaiwi/344/external-cancel-business-risks-flat-wichaiwi.png" width="125" height="120" style="display: block; border: 0px;" /><br>
                            <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
                                Your order has been cancelled!
                            </h2>
                        </td>
                    </tr>                 
                        <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 50px;">
                            <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
                                Hi '.$firstname.', <br><br> This is to inform you that ' . $business_name . ' has cancelled your order. We would like to thank you for your understanding. Please retain this cancellation information for your records.
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

// ===================================== PHPMAILER FOR CANCELATION OF PRODUCT ===========================// 

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
    $mail->Subject = "Your #".date("mdY-", strtotime($date)).''.$order_id." order has been cancelled";
    $mail->Body    =  $ee ;   
    $mail->AddEmbeddedImage('../photo/'.$image.'','blue');         //Add attachments optional name
    $mail->AltBody = 'This is a system generated message do not reply on this email.';
    $mail->send();
    //echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


        echo ("<script>
        alert('Cancelled');
        document.location.href = 'order_list.php';
        </script>");

    }




//=================================COMPLETE==================//
     if(ISSET($_POST['submitComplete'])){
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
        // echo ("<script>
        // alert('$order_id');
        // </script>");


        $conn->query("UPDATE `orderlist` SET `status` = 'accepted',  `receipt_status` = 'Complete' WHERE `order_id`= $order_id  && `merchant_id` = '".$_SESSION['merchant_id']."'" ) or die(mysqli_error());



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
                            <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="125" height="120" style="display: block; border: 0px;" /><br>
                            <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
                                Your order has been approved!
                            </h2>
                        </td>
                    </tr>                 
                        <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 50px;">
                            <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
                                Hi '.$firstname.', <br><br> Good news! Your order from ' . $business_name . ' has been approved. We will notify you until the item(s) is ready for dispatching.
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

// ===================================== PHPMAILER FOR COMPLETE Gcash PAYMENT ===========================// 

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
    $mail->Subject = "Your #".date("mdY-", strtotime($date)).''.$order_id." order has been approved";
    $mail->Body    =  $ee ;   
    $mail->AddEmbeddedImage('../photo/'.$image.'','blue');         //Add attachments optional name
    $mail->AltBody = 'This is a system generated message do not reply on this email.';
    $mail->send();
    //echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


        echo ("<script>
        alert('Approved');
        document.location.href = 'accepted_order.php';
        </script>");

    }




//=================================INCOMPLETE==================//

    if(ISSET($_POST['submitIncomplete'])){
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
        // echo ("<script>
        // alert('$order_id');
        // </script>");


        $conn->query("UPDATE `orderlist` SET `receipt_status` = 'incomplete' WHERE `order_id`= $order_id  && `merchant_id` = '".$_SESSION['merchant_id']."'" ) or die(mysqli_error());




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
                            <img src="https://img.icons8.com/external-wanicon-lineal-color-wanicon/344/external-credit-card-economic-crisis-wanicon-lineal-color-wanicon.png" width="125" height="120" style="display: block; border: 0px;" /><br>
                            <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
                                Uh oh! There was a problem with your payment.
                            </h2>
                        </td>
                    </tr>                 
                        <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 50px;">
                            <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
                                Hi '.$firstname.', <br><br> Unfortunately, Your '.date("mdY-", strtotime($date)).''.$order_id.' has been marked as incomplete payment. Please settle your remaining balance in order to proceed..
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

        
// ===================================== PHPMAILER FOR INCOMPLETE Gcash PAYMENT ===========================// 

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
    $mail->Subject = "Your #".date("mdY-", strtotime($date)).''.$order_id." order has been marked as incomplete";
    $mail->Body    =  $ee ;   
    $mail->AddEmbeddedImage('../photo/'.$image.'','blue');         //Add attachments optional name
    $mail->AltBody = 'This is a system generated message do not reply on this email.';
    $mail->send();
    //echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



        echo ("<script>
        alert('incomplete payment');
        document.location.href = 'order_list.php';
        </script>");

    }


//====================================DISPATCH=========================================================///

      if(ISSET($_POST['DISPATCH'])){

        if (isset($_POST['check'])) {
            foreach ($_POST['check'] as $update_id) {
                     
            $product_id= $_POST['product_id'];
            $customer_id = $_POST['customer_id'];
            $merchant_id = $_POST['merchant_id'];
            $order_id = $_POST['order_id'];
            $quantity = $_POST['quantity'];
            $deliveryman_id = $_POST['deliveryman_'.$update_id];
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

            // echo ("<script>
            // alert('$order_id');
            // </script>");


            $conn->query("UPDATE `orderlist` SET `status` = 'dispatched', `deliveryman_id`= $deliveryman_id  WHERE `order_id`= $update_id  && `merchant_id` = '".$_SESSION['merchant_id']."'" ) or die(mysqli_error());


        $conn->query("UPDATE `deliveryman` SET `status` = 'unavailable' WHERE `deliveryman_id`= '$deliveryman_id'  && `merchant_id` = '".$_SESSION['merchant_id']."'" ) or die(mysqli_error());


///////////////// PHPMAILER FOR DISPATCH ///////////////



$dispatch=' 
      <div class="container">      
          <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>       
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px; ">          
            <tr>
                <td style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                            <img src="https://img.icons8.com/ultraviolet/344/truck.png" width="125" height="120" style="display: block; border: 0px;" /><br>
                            <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
                                Your order is on its way
                            </h2>
                        </td>
                    </tr>                 
                        <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 50px;">
                            <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
                                Hi '.$firstname.', <br><br> We are happy to let you know that your order from ' . $business_name . ' has been dispatched. '.(($type=='cod')?'Kindly wait for your order #'.date("mdY-", strtotime($date)).''.$order_id.' to arrive and have cash ready to pay for your order upon delivery.' :'Kindly wait for your order # '.date("mdY-", strtotime($date)).''.$order_id.' to arrive').'
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
    $mail->Subject = "Your #".date("mdY-", strtotime($date)).''.$order_id." order has been dispatched";
    $mail->Body    =  $dispatch ;   
    $mail->AddEmbeddedImage('../photo/'.$image.'','blue');         //Add attachments optional name
    $mail->AltBody = 'This is a system generated message do not reply on this email.';
    $mail->send();
    //echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



            echo ("<script>
            alert('Ready to deliver');
            document.location.href = 'delivery_list.php';
            </script>");


            }
        }
      
    }

 

?>



   </body>
</html>
