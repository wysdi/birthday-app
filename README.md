# BirthdayApp Readme

## Introduction
BirthdayApp is a Rest Application designed to send a happy birthday message to users on their birthday at exactly 9 am on their local time. The Application is built using Laravel, a PHP web framework. It uses Laravel command to run daily at 00.00 to fetch all users that have a birthday and create a job for sending an email at 9 am on their timezone. The application also uses delay to calculate the time difference before the job is executed.

## Features
- Sends happy birthday messages to users at exactly 9 am on their local time
- Uses Laravel command to run daily at 00.00 to fetch all users that have a birthday
- Creates a job for sending an email at 9 am on their timezone
- Uses delay to calculate the time difference before the job is executed
- Includes tests for User Crud and testing command for processing user birthday

## Getting Started
To run the application, follow the steps below:

1. Clone the repository
2. Install the dependencies by running `composer install`
3. Copy the `.env.example` file to `.env` and fill in the necessary information
4. Generate an application key by running `php artisan key:generate`
5. Run the migrations by running `php artisan migrate:fresh --seed`
6. Start the server by running `php artisan serve`
7. To run the tests, run `php artisan test`
8. To run the command for sending birthday messages, run `php artisan send:birthday-messages`
9. Run the worker to execute the job queue by running `php artisan queue:work -v`

## Conclusion
BirthdayApp is a simple and effective application that allows you to send happy birthday messages to your users at exactly 9 am on their local time. The application is built using Laravel, which makes it easy to customize and extend. The included tests ensure that the application works as expected, and the commands make it easy to run the application and execute the job queue.
