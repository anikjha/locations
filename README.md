# Pre-requsite: 
## 1. file : php.ini (change these config for upload to work with large files)
upload_max_filesize = 20M
post_max_size = 20M

## 2. Run composer install command
```composer install```

## 3. Run migration
```php artisan migrate```

## 4. create a uploads directory in app base 
```mkdir uploads```
```chmod 755 uploads```

## 5. change in .env file according to your db details.
##### change username, password & database constant values
##### make sure the value for queue_connection is this ```QUEUE_CONNECTION=database```

## 6. config apache document path to application public directory OR run using php built webserver
### ```cd <app path>```
### ```php -S 127.0.0.1:9000 -t ./public```

## 7. Running jobs
### ```cd <app-path>```
### ```php artisan queue:listen```
