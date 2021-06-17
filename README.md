# test

An application where you upload a pdf file, then add a watermark to each page in the pdf file.

## Usage

To get started, make sure you have [Docker installed] on your system.

Run:
- `docker-compose up -d`
- `docker-compose run --rm composer install`
- `cp src\.env.example src\.env`
- In `.env` file check DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD. If necessary, edit to match the docker-compose file mysql credentials
- Optional if you get a missing key error, run `docker-compose run --rm artisan key:generate`
- `docker-compose run --rm artisan migrate`
- `docker-compose run --rm artisan storage:link`


If everything goes smoothly, you should now be able access the laravel app locally in localhost:8080

