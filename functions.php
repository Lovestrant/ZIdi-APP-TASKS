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

//Increase a variable
//Increamenting variable we use the increment sign
//We have post-increment and pre-increment which increments first then returns a
$a=1;
++$a; 
echo"Value of a is: ".$a;

//post-increment returns a then increments
$a=1;
$a++; 
echo"Value of a is: ".$a;

//Pre-decrement decrements then returns a  
$a=1;
--$a; 
echo"Value of a is: ".$a;

//post-decrement returns a then decrements
$a=1;
$a--; 
echo"Value of a is: ".$a;

//To create a list, we use the list() function together with array
//It is inbult in PHP and is used to assign elements of an array to multiple variables at a time.

$numArray = array(1,2,3,4,5);
//creating the list
list($a, $b, $c, $d) = $numArray;
echo"a = ".($a);
echo"b = ".($b);
echo"c = ".($c);
echo"d = ".($d);

//Inserting into a list
//To add values to a list we use array_push() inbuilt method
$numArray = array(1,2,3,4,5);
list($a, $b, $c, $d) = $numArray;
//Push to array first
array_push($numArray,6,7);
//Assign to a variables with list
list($a, $b, $c, $d,$e,$f) = $numArray; // variable e and f are the newly added values
//Access the new variables
echo"e = ".($e);
echo"f = ".($f);

//Deleting list elements

//Sorting a list
//We use sort() function to display array elements in assending order and rsort() to display 
//in descending order

$numbers = array(11,2,34,9,5);
$sortedArray = sort($numbers);

for($i=0; $i<=count($sortedArray); $i++) {
    //Printing Before being sorted
    print($numbers[$i]);

     //Printing after being sorted
    print_r($sortedArray[$i]);
}

//Use the sorted array to create a sorted list
list($a, $b, $c, $d) = $sortedArray;

//To Reverse a list in PHP 
$numbers = array(11,2,34,9,5);
$sortedArray = sort($numbers);//Sorts list in ascending order
$Reversed = rsort($sortedArray); //This reverses in descending order
list($a, $b, $c, $d) = $Reversed;//The reversed list now


//Shuffle list
//To shuffle list we use the shuffle() method that randomizes the list of elements in an array

$numbers = array(11,2,34,9,5);
list($a, $b, $c, $d) = $numbers; //List before shuffling

$shuffledList = shuffle($numbers);
//Print shuffled array elements
for($i=0; $i<=count($shuffledList); $i++) {
    print_r($shuffledList[$i]);
}
//Use the shaffled array to create new List of element
list($a, $b, $c, $d) = $shuffledList;


//Merge Lists
$array1 = array(1,2,3,4,5);
//List from array1
list($a, $b, $c, $d,$e) = $array1;
$array2 = array(6,7,8,9,10);
//List from array 2
list($f, $g, $h, $i,$j) = $array2;

//To merge the two lists You need to first merge the two arrays then create a new 
//merged list from the new array
$res = array_merge($array1, $array2);
list($a, $b, $c, $d,$e,$f, $g, $h, $i,$j) = $res;

//Clear List Items
$array1 = array(1,2,3,4,5);
//use the unset() method to remove all the values from the array
unset($array1);
print_r("Array is: ".$array1[0]); //Will return undefined because it is unset already


//Retrieve data from Mysql to a list
//$ sql is the mysql command and $con is the db connection
$sql = "SELECT * FROM persons";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            //Now you can map columns into a list
            list($id, $first_name, $last_name, $email) = array($row['id'],$row['first_name'],$row['last_name'],$row['email']);
            echo"id= ".$id;
            echo"first_name: ".$first_name;
        }
    }}

//Convert custom objects to Json
//json_encode() is a native PHP function that allows you to convert PHP data into the JSON format.
$array2 = array(6,7,8,9,10);
$jsonVariable = json_encode($array2);
echo"Data in Json: ".$jsonVariable;

//Convert Json to Object
//json_decode() is a native PHP function that allows the converson of Json data to Objects
$jsonobject = '{"Peter":35,"Ben":37,"Joe":43}';
$convertedValues = json_decode($jsonobject);
echo"Decoded Json is: ".$convertedValues;


//Remove duplicate values from the array
//The array_unique() function will remove an array that is repeated, it will keep the first and trashes the next similar elements
$arr = array(1, 4, 6, 1, 8, 9, 4, 6);
$unique = array_unique($arr);
echo"Unique Elements are: ".$unique;


//Identify duplicate values in an array
$arr = array(1, 4, 6, 1, 8, 9, 4, 6);
$unique = array_unique($arr);
$duplicates = array_diff_assoc($arr, $unique);
echo"Duplicates are: ".$duplicates;



//Truncate number
$num = 67.900345544;
//Converts the number to 2 decimal places and assigns it to new variable
$truncated_num = number_format($num , 2); 
echo"Truncated Num is: ".$truncated_num;



///////////////Date and Time
//Get current date and time we use the date() function to format
$date = date("Y/m/d");
echo "Today is ".$date;

//Add date time
//To initialize the date 
$datetime = new Datetime('2020-09-28');
//to add 1 day to datetime  
$datetime->add(new DateInterval('P1D'));
// Getting the new date after addition
echo $datetime->format('Y-m-d') . "\n";

// Here 5 hours, 3 Minutes and 10 seconds is added
$datetime->add(new DateInterval('PT5H3M10S'));
// Getting the new date after addition
echo $datetime->format('Y-m-d H:i:s') . "\n";

//date_sub() is an inbuilt PHP function used to subtract date from current date
//Use date_create() to create the date object
$date = date_create('2022-10-25');
//Use the line code below to subtract 5 years from object
date_sub($date, date_interval_create_from_date_string('5 years'));
//Use the line code below to subtract 5 months from object
date_sub($date, date_interval_create_from_date_string('5 month'));
//Use the line code below to subtract 5 days from object
date_sub($date, date_interval_create_from_date_string('5 days'));
//To echo out the new date after subtraction
echo date_format($date, 'Y-m-d') . "\n";


////// File



//// 


?>

