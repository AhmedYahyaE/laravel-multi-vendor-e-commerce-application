{{-- This is the vendor confirmation/registration Success Mail file using Mailtrap --}} {{-- All the variables (like $name, $mobile, $email, ...) used here are passed in from the vendorRegister() method in Front/VendorController.php --}}


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <tr><td>Dear {{ $name }}!</td></tr>
        <tr><td>&nbsp;<br></td></tr>
        <tr><td>Your Vendor Email is confirmed. Please login and add your personal, business and bank details so that your account will get approved.</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Your Vendor Account Details are as below :-<br></td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Name: {{ $name }}</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Mobile: {{ $mobile }}</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Email: {{ $email }}</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Password: ***** (as chosen by you)</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Thanks & Regards,</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Multi-vendor E-commerce Application</td></tr>
    </body>
</html>