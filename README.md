# Laravel Multi-vendor E-commerce Application (Mega Project)
YourJob is a powerful and user-friendly Laravel application for searching for jobs and posting vacancies too. This application is designed to help job seekers find relevant job opportunities quickly and efficiently. With its intuitive interface, responsive/mobile first design, and advanced search capabilities, YourJob makes the job search process a breeze.

Frontend technologies used: Tailwind CSS (Responsive Design) and Alpine.js library.

## Screenshots:
### Homepage:
![YourJob-homepage-1](https://github.com/AhmedYahyaE/laravel-job-search-app/assets/118033266/490a6643-c017-487d-8e04-dbedef494339)

![YourJob-homepage-2](https://github.com/AhmedYahyaE/laravel-job-search-app/assets/118033266/2c2cbf4e-95cf-4697-b185-7feacdfd2256)

### Login Page:
![YourJob-login](https://github.com/AhmedYahyaE/laravel-job-search-app/assets/118033266/9e1d40ba-bd64-43a4-b228-3ed137fa5ddd)

### Create a Job Listing Page:
![YourJob-create-listing](https://github.com/AhmedYahyaE/laravel-job-search-app/assets/118033266/3a908b85-5e20-4c6f-9d99-2f5c5e32eefd)

### User Job Listings Management:
![YourJob-manage-listings-page](https://github.com/AhmedYahyaE/laravel-job-search-app/assets/118033266/9268b566-8286-4401-8d56-204c0b80f98f)

## Features:
1- Using a Scope Filter (Query Scopes) for both the Search Bar Form and Website Tags implementation.

2- Using Blade Components and Component Slots.

3- Using Database Seeders and Model Factories.

4 - Using Laravel's '[storage](storage)' directory (public disk and local driver) for storing user-uploaded images (instead of the regular '[public](public)' directory). Then, using a Symbolic Link between the '[storage/app/public](storage/app/public)' directory and '[public/storage](public/storage)' directory to display images throughout the application.

5- Using Route Model Binding.

6- Using Alpine.js library for creating Session Flash Messages that disappears after a specified duration.

7- Using Tailwind CSS for creating a completely responsive/mobile first design.

8- Eloquent Pagination.

9-  User Registration, Authentication and Authorization.

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
> Email: **test@test.com**, Password: **123456**

> Email: **yasser@gmail.com**, Password: **123456**
    
> Email: **test2@test.com**, Password: **123456**

## Contribution:
Contributions to my Multi-vendor E-commerce Laravel application are most welcome! If you find any issues or have suggestions for improvements or want to add new features, please open an issue or submit a pull request.
