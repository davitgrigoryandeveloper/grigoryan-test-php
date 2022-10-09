## Laravel working with Cache using Redis

If you are using Laravel 8, in the database.php file, replace the following line: <br />
``'client' => env('REDIS_CLIENT', 'phpredis')`` <br />
to:  
``'client' => env('REDIS_CLIENT', 'predis')`` <br />

### you need to follow this step.

- **Step 1:** ``composer require predis/predis``
- **Step 2:** Database Redis Configuration in .env file
