<?php
session_start();
//db connecting
include_once('../patient/config.php');

//sms class
include('../classes/SMS.php');

$sms = new SMS();


//if verify fucntion is set
if(isset($_POST['verify'])){
    
    $number = $_POST['number'];

    /**
     TITLE : check if data exist
     * Check if the number is registered to the system
     * Note : that the number should be unique for every user diffirnt user should not use same number or if will
     *      get conflicts in this process
     */
    $sql = "SELECT * FROM `patient` WHERE `contact` = '{$number}' ";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);
    if (!empty($row)) {
        
        $generated_OPT = mt_rand(1111,9999); //generate OPT for sms

        //store generated opt into session
        $_SESSION['OPT'] = $generated_OPT;

        //set epiration time on session
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (10 * 60);  //10 minutes

        $message = "Your OPT number to reset the password is: {$generated_OPT}";

        $sms->sendSMS($row['contact'], $message);

        return json_encode([
            'code' => 200
        ]);
    } else {
        //else no data found
        return json_encode([
            'code' => 500
        ]);
    }
}

//update the password functions
if(isset($_POST['action']) == 'update'){

    //get the current time
    $now = time();

    if(!isset($_POST['number'])){
        return json_encode([
            'code' => 500
        ]);
    }

    //check if session exprireed
    if($now > $_SESSION['expire']){

        //then unset or destroy the sessions
        session_destroy();
        return json_encode([
            'code' => 300,
            'message' => 'OTP expired'
        ]);
    }

    //retieve the generated otp stored on session
    $otp_session = $_SESSION['OTP'];

    //inputs from user
    $number = $_POST['number'];
    $password = $_POST['password'];
    $otp = $_POST['otp'];

    //password hasing using md5
    $password =  md5($_POST['password']); 

    //compare the submitted session to generated otp store on session
    if(!$otp == $otp_session){
        return json_encode([
            'code' => 300,
            'message' => 'OTP Not Match'
        ]); 
    }

    //update the password in database
    $sql = "UPDATE `patient` SET `password`='{$password}' WHERE `contact` = '{$number}'";

    //if successuly updated
    if(mysqli_query($conn, $sql)){
        return json_encode([
            'code' => 200
        ]);
    }


}
