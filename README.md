#how to clone?

open your cmd or terminal

make sure u're in the folder where u want this project to be cloned
example by me is in:
```
~/Documents/
```

git clone this repo by:
```
git clone git@github.com:altamisatmaja/order.git
```

masuk ke dalam project
```
cd order
```

create .env by copy and rename .env.example
```
cp .env.example .env
```

add key of your laravel by:
```
php artisan key:generate
```

add database conf by add this 👇 in .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<isi sesuai punya kalian>
DB_USERNAME=<isi sesuai punya kalian>
DB_PASSWORD=<kosongi jika ngga ada password>
```

run migration + seeder
```
php artisan migrate:fresh --seed
```

if error, check your configuration database and dont forget to start xampp/laragon, OK

#done.

u'all can run this project in local by:
```
php artisan serve
```