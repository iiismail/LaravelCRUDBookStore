**Project Description**

This is a Laravel backend project that demonstrates CRUD. It is a bookShop where users can look through and manage different books, and I built it for my University Advanced Web Programming Assignment. 


**Tech**.

-Laravel 8

-MySQL

-Tailwind

-Laravel LiveWire

-Javascript

**Pre-reqs**

-Web server capable of serving PHP

-Composer

-MySql

-Node.js & npm for front end pipeline

**Getting started with bookShop**

Create a MySQL database to use for development.

**Clone the repo:**

>git clone git@github.com:hudds-awp2021-cht2520/assignment-02-iiismail

CD into the project directory:

cd bookShop

Install the PHP dependencies:

php composer install

Install the front end dependencies:

>npm install && npm run dev

** As you can see in laravel mix, most files you need have already been configured in the project, run the above command and you should be good to go **



**Add your DB details to your .env file:**


>DB_CONNECTION=mysql

>BB_HOST=127.0.0.1

>DB_PORT=3306

>DB_DATABASE=mydb

>DB_USERNAME=myuser

>DB_PASSWORD=mypassword


**Add the application key to the environment:**
>-php artisan key:generate

>-Run the database migrations:

>-php artisan migrate

>-Run the database seeders:

>-php artisan db:seed

>-Configure a virtual host in your dev webserver, pointing to the /public directory.

>-Running the tests

>-php artisan test

**Note: There are tests that are still on a feature branch that have not been pulled yet till completed.** 

![image](https://user-images.githubusercontent.com/93193288/151268437-c125ef44-6b25-4109-9813-abc027dcd88f.png)

The multiple entries I did manually but that is an idea of what the project looks like. 

There are many features that I created, but one of the most challenging was the many to many relationsips between categories and books. 
I included relationships such as hasOne, hasMany, and hasOneThrough. But the many to many required a pivot table. Once I created the pivot table in the database, my next struggle was connecting books and categories in the pivot table through the control. As you can see there is a lot of code but I managed it. I had to do this again for the update method. I did this by creating a model called BooksCategories to manage the pivot table, but I appreciate there are other ways to do this. The backend and the controller is set up to accept many cataegories to many books, however I experienced some issues allowing the user to enter a variable amount of categories. Initially I tried to use jquery but I learnt that jquery does not communicate with php, so then I tried ajax. For some reason that also failed so then I learnt about livewire. Currently livewire has no use in this project but I have kept the code there to show what I was trying to do and what I intedn to do in the future. Essentially, I wanted to create a counter which would update the number of input fields for categories in real time without a page refresh. 

I used javascript to unhide an input field for inputting a new category. I also used middleware for routes to stop unauthorized access and I used validation in the controller to increase security. This is much better that having data validation on client side javascript. 

There are some features which I did not manage to complete, and I have left these in their feature branches for further improvement. I have kept the most stable version in develop, which is what a software engineering team would do. 

I've improved my backend understanding of laravel immensely compared to the last assignment, and have demonstrated this specifically through the model relationsips, and increased database tables, better security, and general complexity of the program.
