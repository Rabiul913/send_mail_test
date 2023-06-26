<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestMail;

class TestMailController extends Controller
{
   public function sendEmail(Request $request, $recipient_name, $recipient) {

        // if(empty($recipient) ){
        //     $recipient='robicmt566@gmail.com';
        // }elseif(empty($recipient_name)){
        //     $recipient_name='Rabiul Islam';
        // }
        $body= 'Thank you for choosing us.';

        $data= ['name'=>$recipient_name, 'body'=>$body];
    
        if (Mail::to($recipient)->send(new MyTestMail($data))) {
            // Email sent successfully
            http_response_code(200);
            return json_encode(['message' => 'Email sent successfully!']) ;
        } else {
            // Error sending email
            http_response_code(500);
            return json_encode(['error' => 'An error occurred while sending the email.']) ;
        }
    
    }
}
