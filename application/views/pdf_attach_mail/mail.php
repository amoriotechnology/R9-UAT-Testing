  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <style>
    body{
      background-color:#38469f;
    }
  </style>



<?php 
error_reporting(1);
if(isset($mail))
{
$subject=$mail[0]['subject'];
$greeting=$mail[0]['greeting'];
$message=$mail[0]['message'];
}
else
{

    $subject='Sales Invoice';
    $greeting='Dear sir';
    $message='Please find the attachement';

}
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
  
try {
    $mail->SMTPDebug = 2;                                       
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com;';                    
    $mail->SMTPAuth   = true;                             

    $mail->Username = 'mailernew21@gmail.com';               
    $mail->Password = 'fczogityaqcznggl';               

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mail->Port       = 587;  
  
    $mail->setFrom($company_info[0]['email']);           
              
    $mail->addAddress('madhu.amoriotech@gmail.com');

   // print_r($customer_info[0]['customer_email']); die();
  
       
    $mail->isHTML(true);  
    if(isset($mail))
{
  
 $mail->Subject =$subject;
    $mail->Body    =$greeting.'<br></br>'.$message.'<br><br>regards<br><br>

    '.$company_info[0]['company_name'].'<br>
    '.$company_info[0]['address'].'<br>
    '.$company_info[0]['email'].'<br>';

    // print_r($greeting); die();
 }
 else 
 {
   $mail->Subject = 'Sales Invoice';
    $mail->Body    = 'Dear sir,<br><br>
    Please find the attached<br>regards<br>

    '.$company_info[0]['company_name'].'<br>
    '.$company_info[0]['address'].'<br>
    '.$company_info[0]['email'].'<br>

    '; 
 }                                
    
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';


    $mail->addAttachment($file_name);
    $mail->send();
    
   if($mail->send())
   {
    
    echo "<script>alert('Email Send Successfully')</script>";

    } 

    // unlink($file_name);

   
} 
catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
  ?>


 
<script type="text/javascript">

   history.back();

</script>


<div class="modal fade" id="myModal1" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 500px;height:100px;text-align:center;margin-bottom: 300px;">
        <div class="modal-header" style="">
      
          <h4 class="modal-title">New Sale</h4>
        </div>
        <div class="content">

        <div class="modal-body" style="text-align:center;font-weight:bold;">
          
          <h4>Email Send Successfull</h4>
     
        </div>
        <div class="modal-footer">
        </div>
        </div>
      </div>
      
    </div>
  </div>
    

<?php 


  exit();
?>



 