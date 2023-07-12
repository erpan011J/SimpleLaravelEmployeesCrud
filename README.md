# Employee Leave Management Application

## Features

-   User authentication: The application includes user authentication functionality, allowing users to register, log in, and manage their accounts.
-   Employee management: Users can view a list of employees, add new employees, edit employee details, and delete employees.
-   Leave management: Users can add leaves for specific employees, edit leave details, and delete leaves.
-   Leave count: The application keeps track of the number of leaves each employee has taken and displays it on the employee list.
-   Leave limit : The application keeps track of the number of leaves each employee and prevent admin to add more leave if the number of leaves already reach the maximum number which is 5

## Installation

-   Clone the repository to your local machine.
-   Navigate to the project directory.
-   Run composer install to install the project dependencies.
-   Rename the .env.example file to .env and configure the database settings.
-   Run php artisan key:generate to generate the application key.
-   Run php artisan migrate to migrate the database tables.
-   Start the development server by running php artisan serve.

## Usage

-   Access the application in your web browser by visiting http://localhost:8000.
-   Register a new user account or log in if you already have an account.
-   Once logged in, you can manage employees by adding, editing, or deleting employee details.
-   To add a leave for an employee, click on the "Leaves Data" button next to the employee's name on the employee list page.
-   On the leave page, you can add, edit, or delete leaves for the selected employee.
-   The employee list displays the number of leaves each employee has taken.
