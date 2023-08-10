{{-- This is the vendor Confirmation Mail file using Mailtrap --}} {{-- All the variables (like $name, $code, ...) used here are passed in from the vendorRegister() method in Front/VendorController.php --}}


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <tr><td>Dear {{ $name }}!</td></tr>
        <tr><td>&nbsp;<br></td></tr>
        <tr><td>Please click on the link below to confirm your Vendor Account :-</td></tr>
        <tr><td><a href="{{ url('vendor/confirm/' . $code) }}">{{ url('vendor/confirm/' . $code) }}</a></td></tr> {{-- Check the route in web.php --}} {{-- $code is the base64 encoded vendor `email` which will be sent to the route and will be decoded by confirmVendor() method in Front/VendorController.php --}}
        <tr><td>&nbsp;<br></td></tr>
        <tr><td>Thanks & Regards,</td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td>Multi-vendor E-commerce Application</td></tr>
    </body>
</html>