<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CmsController extends Controller
{
    // Important Note!: Bullshit instructor used an unknown "CMSController" controller!!. I created it!! Check https://www.youtube.com/watch?v=FIdyrw6La4g&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=204


    // Render the Contact Us page (front/pages/contact.blade.php) using GET HTTP Requests, or the HTML Form Submission using POST HTTP Requests    // https://www.youtube.com/watch?v=FIdyrw6La4g&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=204
    public function contact(Request $request) {
        // If the HTML Form in front/pages/contact.blade.php is submitted (HTML Form Submission)
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            /* echo '<pre>', var_dump($data), '</pre>';
            exit; */


            // Validation    // Manually Creating Validators: https://laravel.com/docs/9.x/validation#manually-creating-validators    // https://www.youtube.com/watch?v=gdxF2McDfN8&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=205
            $rules = [
                // Fields/Column Names
                'name'    => 'required|string|max:100',
                'email'   => 'required|email|max:150',
                'subject' => 'required|max:200',
                'message' => 'required'
            ];

            // Customizing Laravel's default error messages for every [Field with Validation Rule] e.g. the 'required' Validation Rule for the 'name' field    // Customizing The Error Messages: https://laravel.com/docs/9.x/validation#manual-customizing-the-error-messages
            $customMessages = [
                // The SAME last Fields (inside $rules array)
                'name.required'    => 'Name is required',
                'name.string'      => 'Name must be string',

                'email.required'   => 'Email is required',
                'email.email'      => 'Valid email is required',

                'subject.required' => 'Subject is requireed',

                'message.required' => 'Message is required'
            ];

            // $validator = \Illuminate\Support\Facades\Validator::make($userData, $rules);
            $validator = \Illuminate\Support\Facades\Validator::make($data, $rules, $customMessages);

            // dd($validator->errors());   // is THE SAME AS:    dd($validator->messages());    // Working With Error Messages: https://laravel.com/docs/9.x/validation#working-with-error-messages
            // dd($validator->messages()); // is THE SAME AS:    dd($validator->errors());      // Working With Error Messages: https://laravel.com/docs/9.x/validation#working-with-error-messages

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }



            // Send the user's Contact Us inquiry as an email to the 'admin'
            $email = 'admin@admin.com'; // Admin's email

            // The email message data/variables that will be passed in to the email view
            $messageData = [
                'name'    => $data['name'],
                'email'   => $data['email'],
                'subject' => $data['subject'],
                'comment' => $data['message']
            ];

            \Illuminate\Support\Facades\Mail::send('emails.inquiry', $messageData, function ($message) use ($email) { // Sending Mail: https://laravel.com/docs/9.x/mail#sending-mail    // 'emails.inquiry' is the inquiry.blade.php file inside the 'resources/views/emails' folder that will be sent as an email    // We pass in all the variables that inquiry.blade.php will use    // https://www.php.net/manual/en/functions.anonymous.php
                $message->to($email)->subject('Inquiry from a user');
            });


            // Return the user back with a Success Message
            $message = 'Thanks for your inquiry. We will get back to you soon.';
            return redirect()->back()->with('success_message', $message);
        }


        return view('front.pages.contact');
    }
}
