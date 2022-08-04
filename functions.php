<?php
///////////////////emails
//SEND MAIL FUNCTION
//Pass parameters to be  sent to mail to this function.
function sendEmail($receiver, $message,$subject,$headers){
// $recever is the recepient email
//$message is the message to be sent
// $subject is the subject 
//$headers is the mail headers 

try{
    $status = mail($receiver,$subject,$message,$headers);
    if($status)
    {
        return true; 
        
    }else{
        return false;
    }
}
catch(Exception $e)
{
    die('Error: '.$e->getMessage());
}

}

function processEmailMessages($TheHost,$Theuser,$password) {
//The following should be enabled in Gmail configuration    
//PHP5 or latest PHP version.
// Enable the IMAP Extension in PHP installation.
// In Gmail account settings, IMAP should be enabled.


// gmail connection,with port number 993 e.g. '{imap.gmail.com:993/imap/ssl/novalidate-cert/norsh}INBOX';
// Your gmail credentials i.e 'yourmail@gmail.com';

// Establish a IMAP connection 
$conn = imap_open($TheHost, $Theuser, $password) or die('unable to connect Gmail: ' . imap_last_error());

// Search emails from gmail inbox
$mails = imap_search($conn, 'SUBJECT "Comment"');

// loop through each email id mails are available. 
if ($mails) {

    // Mail output variable starts
    $mailOutput = '';
    $mailOutput.= '<table><tr><th>Subject </th><th> From  </th> 
               <th> Date Time </th> <th> Content </th></tr>';

    //display the latest emails on top 
    rsort($mails);

    /* For each email */
    foreach ($mails as $emailNum) {

        // Retrieve specific email information
        $headers = imap_fetch_overview($conn, $emailNum, 0);

        //  Returns a particular section of the body
        $message = imap_fetchbody($conn, $emailNum, '1');
        $subMessage = substr($message, 0, 100);
        $finalMessage = trim(quoted_printable_decode($subMessage));

        $mailOutput.= '<div class="row">';

        //Gmail MAILS header information                   
        $mailOutput.= '<td><span class="columnClass">' .$headers[0]->subject . '</span></td> ';
        $mailOutput.= '<td><span class="columnClass">' . $headers[0]->from . '</span></td>';
        $mailOutput.= '<td><span class="columnClass">' . $headers[0]->date . '</span></td>';
        $mailOutput.= '</div>';

        // Mail body is returned 
        $mailOutput.= '<td><span class="column">' . $finalMessage . '</span></td></tr></div>';
    }
    $mailOutput.= '</table>';

    //Return the Mails
    return $mailOutput;
}

//closed Imap Connection
imap_close($conn);

}

function retrieveEmailMessages($TheHost,$Theuser,$password){
  //The following should be enabled in Gmail configuration    
//PHP5 or latest PHP version.
// Enable the IMAP Extension in PHP installation.
// In Gmail account settings, IMAP should be enabled.


// gmail connection,with port number 993 e.g. '{imap.gmail.com:993/imap/ssl/novalidate-cert/norsh}INBOX';
// Your gmail credentials i.e 'yourmail@gmail.com';

// Establish a IMAP connection 
$conn = imap_open($TheHost, $Theuser, $password) or die('unable to connect Gmail: ' . imap_last_error());

// Search emails from gmail inbox
$mails = imap_search($conn, 'SUBJECT "Comment"');

// loop through each email id mails are available. 
if ($mails) {

    // Mail output variable starts
    $mailOutput = '';
    $mailOutput.= '<table><tr><th>Subject </th><th> From  </th> 
               <th> Date Time </th> <th> Content </th></tr>';

    //display the latest emails on top 
    rsort($mails);

    /* For each email */
    foreach ($mails as $emailNum) {

        // Retrieve specific email information
        $headers = imap_fetch_overview($conn, $emailNum, 0);

        //  Returns a Message
        $message = imap_fetchbody($conn, $emailNum, '1');

        // Mail body is returned 
        $mailOutput.= '<td><span class="column">' . $message . '</span></td></tr></div>';
    }
    $mailOutput.= '</table>';

    //Return the Mails
    return $mailOutput;
}

//closed Imap Connection
imap_close($conn);
}

//////////////////// If statements 
//Syntax is as follows it has a if then a condition in the brackets.

$a = 10;
if($a>10){
    echo"Variable a is greater than 10";
}

//Else condition shows an alternative of anything else other than the if condition.
//Normally implemented after the if statement

$a = 10;
if($a>10) {
    echo"Variable a is greater than 10";
}else{
    echo"Variable a is less than 10";
}

//Else if statement is used incase there are many conditions i.e more than 1 conditions.
//syntax is as follows, In most cases it has the else as the final condition.

$a = 10;
if($a >10) {
    echo"Variable a is greater than 10";
}elseif($a==10) {
    echo"Variable a is equal to 10";
}elseif($a<10){
    echo"Variable a is less than 10";  
}else{
    echo"Null";
}


/////////////Switch case is a alternative to if and else if statements.
//Syntax below, The brackets after the switch has the variable to be checked by all the cases
//Cases has the conditions then after the cases below are the actions done if the case is met

$a = 5;
switch($a){
    case 1:
        echo "I am number 1";
        break;
    case 2:
        echo "I am number 2";
        break;
    case 3:
        echo "I am number 3";
        break;
    case 4:
        echo "I am number 4";
        break;
    case 5:
        echo "I am number 5";
        break;
    default: //The default case is the one exercuted if selected value is different from all labels
        echo"Invalid Input";
}


/////// PHP Loops

//For loop is used when the times of runing script is known
//Lets say you want to print hello world 200 times, Instead of repeating it 200 times,
//We can just use the for loop and save ourselve a lot of time

for($i=0; $i<=20; $i++) {
   print(i);
}

// For each loop is used only in arrays to loops through the keys and values of an array

$myColors = array("red", "grey", "white", "green"); 

foreach ($myColors as $value) {
    echo "$value <br>";
}

//While loop exercutes a block of code as long as a given condition is true
$b= 50;
while($b<100){
    echo"The value is less than 100";
}

//Do while will always loop through the code and then it checks the condition if it is true
//It will then repeat the code exercution as long as the condition is met

$c=4;
do{
    echo"Hello World <br>";
} while($c<10);




///////////////Variables
//Set a variable, all PHP variables are prefixed with dollar sign($)

$d = 10;
$text = "Hello World!";
$theDouble = 10.6;

//Generate random numner
//The rand() function which is inbuilt PHP function generates random interger.
//Inside the brackets a range is given

$randomNumber = rand(10, 1000000);

//The rand() method can also be called without being passed any values
$rand = rand();


//

?>

