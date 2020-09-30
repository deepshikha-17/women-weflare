<?php

    $Name=$_POST['Name'];
    $Email=$_POST['Email'];
    $Amount=$_POST['Amount'];
    $Phone=$_POST['phone'];
    $purpose='Donation';
    
    include 'instamojo/Instamojo.php';
    $api = new Instamojo\Instamojo('test_083a2bbdcc6a896e4420a1e7f75', 'test_7240da476a26ba456bb57d1ad02', 'https://test.instamojo.com/api/1.1/');

    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => $purpose,
            "amount" => $Amount,
            "send_email" => true,
            "email" => $Email,
            "buyer_name" =>$Name,
            "phone"=>$Phone,
            "send_sms" => true,
            "allow_repeated_payments" =>false,
            "redirect_url" => "https://womenwelfare.000webhostapp.com/thankyou.php"
            )
        );
        $pay_url=$response['longurl'];
        header("location: $pay_url");

        catch (Exception $e) {
            print('Error: ' . $e->getMessage());
        }
    	
?>
 
<!-- DETAILS FOR DOING PAYMENT:-
    

A Simple Donation Website using Instamojo payment gateway.

Website Link:https://womenwelfare.000webhostapp.com

Card credentials for testing:

Debit Card number:

4242 4242 4242 4242

Expiry:

Any valid future date

CVV:

Any 3 digit number

3D-Secure Password:

1221 -->