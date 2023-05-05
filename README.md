
# Task Management laravel 10 api crud With authentication

This is a simple Task management curd api with user login and register feature. Allows user to register/login and make task with start and due date's with multiple notes and attachments attached to single task.


## Tech Stack

**Client:** NULL

**Server:** Laravel, PHP, Mysql


## Documentation

[Documentation](https://linktodocumentation)

1. clone the repo and make .env file and connect to database

2. Now run this command to migrate and seed the database: 
    ```php artisan migrate --db-seed```

3. If you are using postman for testing use the postman collection in the root folder.
OR.
Run the serve ```php artisan serve``` 

login  http://127.0.0.1:8000/api/login

register  http://127.0.0.1:8000/api/register

task  http://127.0.0.1:8000/api/task

