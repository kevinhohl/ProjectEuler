# Project Euler Problem Implementations
### by Kevin Hohl

Project Euler is a site that challenges programmers and mathematicians alike to solve difficult problems and track their progress. This repository will keep track of my coded implementations for each problem as I go through them. The coded implementations will each have a front-end via a website for the user to see the implementation in action. The front end was modelled after a similar look and feel as the Project Euler website.

For these implementations, where possible, I will attempt to not only implement the problem at face value but extend the solution to be scalable based on input. For example a problem asking to find the 1,000,000th Fibonacci number will instead be implemented in such a way that it will look for the Xth Fibonacci number, where X is input taken from the user. All current implementations are in JavaScript to keep the calculations client-side. A simple database is included to store the entered values and their returned results along with the number of times that value has been tried before.

#### Current Implementations:
* **Problem 003 - Largest Prime Number**
* **Problem 004 - Largest Palindrome Product**
* **Problem 005 - Smallest Multiple**

## Installation Instructions
Navigate to your document root directory (`/var/www/` is the apache default) and clone the git repository:
```git clone https://github.com/kevinhohl/ProjectEuler.git ./```
Alternatively, you can download the zip file from github and manually extract or copy the files to the desired directory.

Create or use an existing database. This will be needed to hold the `solutions` table that will store the solutions statistical data using the `create_solution_table.sql` SQL script.
This can be found in the ```/scripts/sql/create_solution_table.sql``` folder in this repository.

It is also possible to create this table using the sql file on the command line while you are in your document root directory:
`sudo mysql <DB_NAME> < ./scripts/sql/create_solution_table.sql -u <username> -p`


Edit the ```/scripts/php/config/dbconfig.php``` file and replace the following as required:
```
--<USERNAME>-- // username with read and write access to the `solutions` table (or root)
--<PASSWORD>-- // password associated with the username
--<DATABASE>-- // database where the `solutions` table has been created
````
*DB_HOST has been set to __localhost__ for locally hosted MySQL servers, this can be changed if necessary.*

