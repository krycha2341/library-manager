## Info
PHP 8.1.26 <br>
MySQL 5.7.39<br>
Laravel 10.10<br>

```
composer install
php artisan serve
```

## Generowanie książek
`php artisan books:populate :number` <br>
:number - liczba książek, 60 by default

## API 
Kolekcja Postmana w repo ([library manager.postman_collection.json](library%20manager.postman_collection.json))
1. Lista książek <br>
GET `/api/books?limit=2&offset=2&title=Quasi&author=Mathew&first_name=firstName&last_name=lastName`

2. Detal książki <br>
GET `/api/books/:id`

3. Lista klientów <br>
GET `/api/customers`

4. Detal klienta <br>
GET `/api/customers/:id`

5. Dodawanie klienta <br>

POST
```
/api/customers

{
    "first_name": "test1",
    "last_name": "test 2"
}
```

6. Usuwanie klienta <br>
DELETE `/api/customers/:id`

7. Wypożyczanie ksiązki <br>
PATCH `/api/books/:id/customers/:customerId/borrow`

8. Zwrot ksiązki <br>
PATCH `/api/books/:id/customers/:customerId/return`

