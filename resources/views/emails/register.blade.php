{{-- https://www.youtube.com/watch?v=OtH7CCwnwAo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=129 --}}
{{-- This is the User Welcome E-mail after Registration file using Mailtrap --}} {{-- All the variables (like $name, $mobile, $email, ...) used here are passed in from the userRegister() method in Front/UserController.php --}}



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>



        <table>
            <tr><td>Dear {{ $name }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Welcome to Stack Developers. Your account has been successfully created with below information:</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Name: {{ $name }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Mobile: {{ $mobile }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Email: {{ $email }}</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Password: ****** (as chosen by you)</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Thanks & Regards,</td></tr>
            <tr><td>Stack Developers</td></tr>
        </table>



    </body>
</html>