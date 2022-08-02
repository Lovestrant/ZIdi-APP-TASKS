<?php
require_once('functions.php');

if(isset($_post['Submit'])){
    //Receive values from a form on button click
    
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_post['subject'];

   $result = sendMail($email, $message, $subject);

   if($result == true) {
    echo "<script>alert('Success');</script>";
   }else{
    echo "<script>alert('Failed');</script>";
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZIDI APP CONTRIBUTIONS</title>

</head>
<body>

  <div class="container">
    <form action="index.php" method="post">
        <input name="email" type="text" placeholder="Enter the email" /> <br><br>
        <input name="message" type="text" placeholder="Enter the mail message" /> <br><br>
        <input name="subject" type="text" placeholder="Enter the Subject" /><br><br>
        <button name="Submit">Send Mail</button>
    </form>
  </div>

</body>
</html>



