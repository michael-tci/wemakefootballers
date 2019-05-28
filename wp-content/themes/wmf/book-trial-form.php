
<?php
/**
 * Template Name: Book Trial Form
 *
 */
// ini_set('display_errors', 1);
//   //Email information
//   $admin_email = "zaroontahir1994@gmail.com";
//   $email = "m.sumair1@gmail.com";
//   $subject = "Testing Subject";
//   $comment = "Testing Comments";
  
//   //send email
// $success =  mail($admin_email, "$subject", $comment, "From:" . $email);
// echo $success;
// die;


// //$success = mail("zaroontahir1994@gmail.com", "This is Testing Subject", "Hello!");
 
// // redirect to success page
// if ($success){
//    echo "success";
// }else{
//     echo "invalid";
// }
//  die;



$errorMSG = "";
 
// NAME
if (empty($_POST["book_trial_fullname"])) {
    $errorMSG = "Name is required ";
} else {
    $book_trial_fullname = $_POST["book_trial_fullname"];
}
 
// EMAIL
if (empty($_POST["book_trial_email"])) {
    $errorMSG .= "Email is required ";
} else {
    $book_trial_email = $_POST["book_trial_email"];
}
 
// PHONE
if (empty($_POST["book_trial_phone"])) {
    $errorMSG .= "Message is required ";
} else {
    $book_trial_phone = $_POST["book_trial_phone"];
}


// CHILD NAME
if (empty($_POST["book_trial_childs_name"])) {
    $errorMSG = "Name is required ";
} else {
    $book_trial_childs_name = $_POST["book_trial_childs_name"];
}
 
// DATE OF BIRTH
if (empty($_POST["book_trial_date"])) {
    $errorMSG .= "Email is required ";
} else {
    $book_trial_date = $_POST["book_trial_date"];
}
 
// CHILD INFORMATION
if (empty($_POST["book_trial_information"])) {
    $errorMSG .= "Message is required ";
} else {
    $book_trial_information = $_POST["book_trial_information"];
}







// Always set content-type when sending HTML email
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers .= 'To: Person <person@people.com>' . "\r\n";
$headers .= 'From: '. $book_trial_email . "\r\n";
$headers .= 'Cc: ' . "\r\n";
$headers .= 'Bcc: ' . "\r\n";


$EmailTo = "raofaraz03@gmail.com";
$Subject = "New Message Received";
 
// prepare email body text
$Body .= "Parent / Guardian Name: ";
$Body .= $book_trial_fullname;
$Body .= "\n";
 
$Body .= "Parent / Guardian Email: ";
$Body .= $book_trial_email;
$Body .= "\n";

$Body .= "Parent/ Guardian Phone Number: ";
$Body .= $book_trial_phone;
$Body .= "\n";
 
$Body .= "Child's Full Name: ";
$Body .= $book_trial_childs_name;
$Body .= "\n";

$Body .= "Child's Date of Birth: ";
$Body .= $book_trial_date;
$Body .= "\n";
 
 
$Body .= "Child Medical Information: ";
$Body .= $book_trial_information;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body ,$headers);
 
// redirect to success page
if ($success){
   echo "success";
}else{
    echo "invalid";
}

?>