# Laravel Multi-vendor E-commerce Application (Mega Project)
Multi-vendor E-commerce is a large-scale project/application built with Laravel framework. The application contains comprehensive and feature-rich modules and functionalities. It is designed to provide a robust platform for businesses to create their online marketplaces, allowing multiple vendors to sell their products and manage their stores within a single platform. Additionally, the application has its own dedicated extensive API, which requires authentication using Laravel Passport package.

Frontend technologies used: jQuery, AJAX, and many JavaScript & jQuery libraries and plugins.

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

10- Product Dynamic Filters (using AJAX).

11- Shipping Charges Module (third-party service API integration, product-weight and country-wise shipping charges, ...).

12- Showing Order Shipping Status.

13- Vendor Commissions Module.

14- Coupon Codes Module (single time/multiple times, percentage/fixed).

15- Star Rating and Reviews System.

16- Recently Viewed Products Feature.

17- Order Logs/History.

18- New Arrivals, Discounted Products, Featured Products, Similar Products, and Best-Seller Products Features.

19- Using external libraries and packages such as 'Intervention Image' for image manipulation, 'Dompdf' library for printing PDF order invoices, 'Laravel Excel' package for importing/exporting database tables as Excel files, 'Laravel Barcode/QR Code Generator' to generate barcodes and QR codes for both Product ID and Product Code in order invoices, etc.

20- Using JavaScript libraries and jQuery plugins such as 'DataTables' for adding interaction controls to HTML tables, 'EasyZoom' for zooming product images, etc.

21 - Sending Confirmation Emails (Mailtrap) upon registration, account activation and approval, order shipping status, etc.

22- Sending offline SMSs (upon registration, starting order shipping process, ...).

23- Multiple Delivery Addresses.

24- Website Search Form functionality for products by name, color, and code.

25- User Roles and Permissions (superadmin, admins, vendors, users).

26- User and vendor registration approval by the superadmin.

27- Image & Video Upload Functionality.

28- Dynamic Banner Sliders Module.

29- Dynamic Breadcrumb Navigation.

30- Dynamic SEO/HTML Meta tags.

31- Newsletter Subscription (email).

32- Regular Expression.

33- Database Seeders.

34- Tens of jQuery AJAX requests (update admin password via AJAX, AJAX form validation, ...).

35- Custom AJAX pop-up Mini-Cart.

36- Showing a Preloading Screen upon form submission.

37- TinyMCE WYSIWYG Editor Integrated.

38- Using two Favicons for both the Frontend and Admin Panel Sections of the application.

## Screenshots:
### Frontend Section Homepage:
![frontend-homepage](https://github.com/AhmedYahyaE/laravel-multi-vendor-e-commerce-application/assets/118033266/37646610-8c9f-4ac6-8a75-75e83cc469c7)

### Product Listing Page:
![frontend-product-listing-page](https://github.com/AhmedYahyaE/laravel-multi-vendor-e-commerce-application/assets/118033266/6a68ba25-ebd0-4b93-b687-487e35bf4912)

### Shopping Cart Page:
![shopping-cart-page](https://github.com/AhmedYahyaE/laravel-multi-vendor-e-commerce-application/assets/118033266/64f9cbbf-87d2-4f26-aaf1-5c942d1db85b)

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
