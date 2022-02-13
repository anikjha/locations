# Pre-requsite: 
## file : php.ini (change these config for upload to work with large files)
upload_max_filesize = 20M
post_max_size = 20M

## Run composer install command
composer install

## Run migration
php artisan migrate

## create a uploads directory in app base 
mkdir uploads
chmod 755 uploads


## change the username, password & database in .env file according to your system details

## config apache document path to application public directory OR run using php built webserver
cd <app path> php -S 127.0.0.1:9000 -t ./public
