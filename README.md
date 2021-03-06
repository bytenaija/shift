# Perspective
The solution is contained in two folders `client` and `server`. The client is implemented in React + React Hooks + MobX and the server is implemented in PHP7, Laravel and MySQL.

## Note
    To run this application make sure to have the following installed
    1. Node.js
    3. yarn or NPM(comes with node.js)
    4. PHP7
    5. MySQL
    6. Composer
    7. Laravel


# Instructions
## Server
1. Open a terminal and run the following commands
    ```bash
        git clone https://github.com/bytenaija/shift.git

        cd shift/server

        composer install

     ```

2. Rename the .env.example file at the root of your application to .env, change the Database settings to match your local environment
    and run the following commands
    ```bash
        php artisan migrate --seed

        php artisan serve
    ```

3. Enter the following in another terminal run the included tests:
    
    ```bash
        ./vendor/bin/phpunit
    ```

## Client
1. Run the following code in a terminal
    ```bash
        cd shift/client

        npm install ( You can run `yarn install` if you prefer `yarn`)

        npm start
    ```

2. Navigate to http://localhost:3000/ in your browser to interact with the application