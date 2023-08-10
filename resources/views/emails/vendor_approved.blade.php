{{-- This is the vendor Approval Success Mail file using Mailtrap --}} {{-- All the variables (like $name, $mobile, $email, ...) used here are passed in from the updateAdminStatus() method in Admin/AdminController.php --}}


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <tr><td>Dear {{ $name }}!</td></tr>
        <tr><td>&nbsp;<br><br></td></tr>
        <tr><td>Your Vendor Account has been approved. Now you can login and add products.</td></tr>
        <tr><td>&nbsp;<br><br></td></tr>
        <tr><td>Your Vendor Account Details are as below :-<br></td></tr>
        <tr><td>&nbsp;<br></td></tr>
        <tr><td>Name: {{ $name }}</td></tr>
        <tr><td>&nbsp;<br></td></tr>
        <tr><td>Mobile: {{ $mobile }}</td></tr>
        <tr><td>&nbsp;<br></td></tr>
        <tr><td>Email: {{ $email }}</td></tr>
        <tr><td>&nbsp;<br></td></tr>
        <tr><td>Password: ***** (as chosen by you)</td></tr>
        <tr><td>&nbsp;<br><br></td></tr>
        <tr><td>Thanks & Regards,</td></tr>
        <tr><td>&nbsp;<br></td></tr>
        <tr><td>Multi-vendor E-commerce Application</td></tr>
    </body>
</html>