<?php

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

?>

