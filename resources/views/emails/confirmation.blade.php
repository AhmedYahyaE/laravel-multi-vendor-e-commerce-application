{{-- https://www.youtube.com/watch?v=aeLuMN7k2cs&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=132 --}}
{{-- This is the User Confirmation E-mail after Registration (which contains the 'Activation Link') file using Mailtrap --}} {{-- All the variables (like $name, $mobile, $email, $code, ...) used here are passed in from the userRegister() method in Front/UserController.php --}}



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>



        <table>
            <tr><td>Dear {{ $name }},</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Please click on below link to activate your Stack Developers account:-</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td><a href="{{ url('/user/confirm/' . $code) }}">Confirm Account</a></td></tr> {{-- $code is passed from userRegister() method in UserController.php --}}
            <tr><td>&nbsp;</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Thanks & Regards,</td></tr>
            <tr><td>Stack Developers</td></tr>
        </table>



    </body>
</html>