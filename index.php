<?php
require_once('functions.php');
function setClipBoard($myInput){
  print("hello world....");
  echo"
  <script>
  var copyText = document.getElementById(''$myInput'');
  copyText.select()
  document.execCommand('copy');
  console.log('Copied');
  </script>
";
}

if(isset($_post['Submit'])){
    //Receive values from a form on button click
    
  //   $email = $_POST['email'];
  //   $message = $_POST['message'];
  //   $subject = $_post['subject'];

  //  $result = sendMail($email, $message, $subject);

  //  if($result == true) {
  //   echo "<script>alert('Success');</script>";
  //  }else{
  //   echo "<script>alert('Failed');</script>";
  //  }


    //Passed parameter is the field Id to copy text from

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZIDI APP CONTRIBUTIONS</title>
    <script>
      function setClipboardContent(myInput) {
      //Passed parameter is the field Id to copy text from
      var copyText = document.getElementById(myInput);
      copyText.select()
      document.execCommand('copy');
      console.log("Copied");

      }
    </script>

</head>
<body>

  <div class="container">
  <input id="email" type="text" placeholder="Enter the email" /> <br><br>
    <form action="index.php" method="post">
        
        <input name="message" type="text" placeholder="Enter the mail message" /> <br><br>
        <input name="subject" type="text" placeholder="Enter the Subject" /><br><br>
        <button name="Submit" >Send Mail</button>
    </form>
  </div>

</body>
</html>



