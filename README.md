## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## API Requests

### @request
* link: http://localhost:8000/api/token
* method: POST
* Content-Type: application/json
* body:
* { 
*	"email" : "email@domain.com", 
*	"password" : "password",
*	"device_name" : "device_id" 
*  }

### @response
* {
*   "token": "1|OZ9m369LLf9cRXTKFU62ct7Ux3jHm5uVCRzJVrt6"
* }

### @request
* link: http://localhost:8000/api/products
* method: GET
* Content-Type: application/json
* bearer token: 1|OZ9m369LLf9cRXTKFU62ct7Ux3jHm5uVCRzJVrt6

### @response
* [
*  {
*    "name": "FIbi Ball",
*    "category_id": 13,
*    "price": "1.99",
*    "comment": null,
*    "bought_at": "2021-01-16"
*  }
* ]

### @request
* link: http://localhost:8000/api/categories
* method: GET
* Content-Type: application/json
* bearer token: 1|OZ9m369LLf9cRXTKFU62ct7Ux3jHm5uVCRzJVrt6

### @response
* [
*  {
*    "id": 1,
*    "name": "Home"
*  },
*  {
*    "id": 2,
*    "name": "Communication"
*  },
*  {
*    "id": 3,
*    "name": "Gifts"
*  }
* ]

