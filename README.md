### Objective

Your assignment is to implement a service that parses as a list of customers and returns their names based on location. Use PHP and any framework.

### Brief

We have some customer records in a text file `./Data/customers.txt` -- one customer per line, JSON lines formatted. We want to invite any customer within 100km of our office for some food and drinks on us.

### Tasks

Write a web service that:

-   Has an endpoint that accepts a .txt file containting customers. See a sample file in `./Data`
    -   Read the full list of customers
    -   Output the names and user ids of matching customers (within 100km), sorted by User ID (ascending). The output should be in JSON.
-   No authentication is required
-   You can use the first formula from [this Wikipedia article](https://en.wikipedia.org/wiki/Great-circle_distance) to calculate distance. Don't forget, you'll need to convert degrees to radians. The GPS coordinates for our Dublin office are 53.339428, -6.257664. You can find the Customer list in `./Data`.


### Developer Notes
I have used Laravel Framework to speedup the development process and organize my code better to follow best standards
Please follow below instruction to setup
- Clone repository
- Run composer update
- run php artisan serve
