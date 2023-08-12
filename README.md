# Laravel Multi-vendor E-commerce Application (Mega Project)
Multi-vendor E-commerce is a large-scale project/application built with Laravel framework. The application contains comprehensive and feature-rich modules and functionalities. It is designed to provide a robust platform for businesses to create their online marketplaces, allowing multiple vendors to sell their products and manage their stores within a single platform. Additionally, the application has its own dedicated extensive API, which requires authentication using Laravel Passport package.

Frontend technologies used: jQuery and AJAX.

## Features:
1- Third-pary API Integration (Shiprocket API integration (for shipping and order management services)).

2- PayPal Payment Gateway Integration.

3- Iyzico Payment Gateway Integration.

4- A dedicated extensive API with multiple different endpoints for the application.

5- API authentication using Laravel Passport package.

6- Webhook implemented for inventory/stock update.

7 - Using PHP cURL.

8- Multiple Authentication using Laravel Guards.

9- Multi-level Relationships/Categories.

10- Dynamic Filters (using AJAX).

11- Shipping Charges Module (third-party service API integration).

12- Vendor Commission Module.

13- Coupon Codes Module (single time/multiple times, percentage/fixed).

14- Star Rating System.

15- Recently Viewed Products Feature.

16- Regular Expression.

17- Dynamic Banners Module.

18- Dynamic Breadcrumb Navigation.

19 - Sending Confirmation Emails upon registration, account activation and approval, order shipping status, ...

20- Sending offline SMSs.

21- User Roles and Permissions.

22- Tens of jQuery AJAX requests.

23- Using external libraries such as 'Intervention Image' for image manipulation, 'Dompdf' library for printing PDF order invoices, 'Laravel Excel' package for exporting database tables as Excel files, 'Laravel Barcode/QR code Generator' to show barcodes and QR codes for both Product ID and Product Code, ...

24- Using JavaScript libraries and jQuery plugins such as 'DataTables' for adding interaction controls to HTML tables, 'EasyZoom' for zooming product images, ...

25- Image & Video Upload Functionality.

26- Using Favicons for both the Frontend and Admin Panel Sections of the application.

## Screenshots:
### Frontend Section Homepage:
![frontend-homepage](https://github.com/AhmedYahyaE/laravel-multi-vendor-e-commerce-application/assets/118033266/37646610-8c9f-4ac6-8a75-75e83cc469c7)

### Product Listing Page:
![frontend-product-listing-page](https://github.com/AhmedYahyaE/laravel-multi-vendor-e-commerce-application/assets/118033266/6a68ba25-ebd0-4b93-b687-487e35bf4912)

### Shopping Cart Page:
![shopping-cart-page](https://github.com/AhmedYahyaE/laravel-multi-vendor-e-commerce-application/assets/118033266/442ae3c2-5ddd-4461-9d85-91042e975abc)

### Checkout Page:
![checkout-page](https://github.com/AhmedYahyaE/laravel-multi-vendor-e-commerce-application/assets/118033266/0e4057a8-dd7e-4db5-944d-8d8754b86c32)

### Admin Panel HomePage:
![admin-panel-homepage](https://github.com/AhmedYahyaE/laravel-multi-vendor-e-commerce-application/assets/118033266/afda126b-2ab2-4ce8-9f42-2bd6eee36bfa)

### Admin Panel Products Management Page:
![admin-panel-products-management](https://github.com/AhmedYahyaE/laravel-multi-vendor-e-commerce-application/assets/118033266/06d8fd5b-6538-4574-b6f4-c3bf4a6a5c32)

## Application Routes:
All the application routes are defined in the [web.php](/routes/web.php) file.

## Installation & Configuration:

1- Open your terminal, and use the '***git clone https://github.com/AhmedYahyaE/laravel-job-search-app.git***' command, or just download the ZIP project.

2- Navigate/Change into (using the **cd** command) to the project root directory, then run the '***composer install***' command.

3- Run the '***npm install***' command (and only in case you face any issues/errors, run the 'npm audit fix' command), and then run the '***npm run build***' command.

4- Create a MySQL database named **\`yourjob\`**, then import the **[yourjob database SQL Dump File](<Database - yourjob/yourjob database - SQL Dump File - phpMyAdmin Export.sql>)** into your \`yourjob\` database.

5- Navigate to the **[.env](.env)** file and configure/update it with your MySQL database credentials and other configuration settings.

6- In case the application images are broken (are not loaded), recreate the Symbolic Link between the '[storage/app/public](storage/app/public)' directory and '[public/storage](public/storage)' directory by removing/deleting the [public/storage](public/storage) directory first, then run the '***php artisan storage:link***' command.

7- Run the '***php artisan serve***' command, and then open your browser and visit **http://127.0.0.1:8000** to access YourJob application.

\*\* Ready-to-use registered accounts credentials you can use to log in:
> Superadmin: Email: **test@test.com**, Password: **123456**

> Vendor: Email: **yasser@gmail.com**, Password: **123456**
    
> User: Email: **ibrahim@gmail.com**, Password: **123456**

## Contribution:
Contributions to my Multi-vendor E-commerce Laravel application are most welcome! If you find any issues or have suggestions for improvements or want to add new features, please open an issue or submit a pull request.
