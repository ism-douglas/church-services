<?php
// Retrieve data from the POST request
$sesssionid = $_POST['sessionid'];//Get the session unique id
$serviceCode = $_POST['serviceCode'];//Get the service code from provider
$phoneNumber = ltrim($_POST['phoneNumber']);//Get the phone number
$text = $_POST['text'];//Default text variable is usually empty

// Logic for USSD menu
if ($text == "") {
    //When the loads/default option is initiated
    $response = "CON Welcome to the Coding Church\n";//Welcome message waiting for input
    $response .= "1. 1st Service\n";//Option 1
    $response .= "2. 2nd Service\n";//Option 2
    $response .= "3. 3rd Service";//Option 3
} elseif ($text == "1") {
    //If Option 1 is selected
    $response = "END 1st Service\n7:00am to 9:00am.";
} elseif ($text == "2") {
    //If Option 2 is selected
    $response = "END 2nd Service\n9.00am to 11:00am ";
} elseif ($text == "3") {
    //If Option 3 is selected
    $response = "END 3rd Service\n11:00am to 1:00pm.";
} else {
    //If response is not valid
    $response = "END Invalid Option.";
}

// Send response back to the gateway
header('Content-type: text/plain');
echo $response;
?>