
Principios SOLID Aplicados:
Principio de Responsabilidad Única (SRP):
- Cada controlador (AuthController, ProductController, UserController) tiene una responsabilidad específica.
- Los modelos (User, Product) encapsulan la lógica relacionada con sus respectivas entidades.

Instalación:

1.- Instala las dependencias
composer install

2.- Ejecuta las migraciones
php artisan migrate

3.- Ejecuta los seeders para poblar la base de datos con datos de prueba
php artisan db:seed

Ejecución
php artisan serve

Uso:
Consulta la documentación de la API para obtener 
detalles sobre los endpoints disponibles y cómo utilizarlos
url de la documentacion: https://documenter.getpostman.com/view/29992084/2sAXqqchma 

POST Login
http://127.0.0.1:8000/api/login

POST Register
http://127.0.0.1:8000/api/register

GET Logout
http://127.0.0.1:8000/api/logout

A PARTIR DE ACA SE NECESITA DEL TOKEN DADO POR LOGIN Y REGISTER PARA REALIZAR
LAS ACCIONES DE LOS ENDPOINTS

GET AllUser
http://127.0.0.1:8000/api/users

POST AddUser
http://127.0.0.1:8000/api/users/create

PUT UpdateUser
http://127.0.0.1:8000/api/users/update/{id}

DELETE DeleteUser
http://127.0.0.1:8000/api/users/delete/{id}

GET Welcome
http://127.0.0.1:8000/api/welcome

GET AllProduct
http://127.0.0.1:8000/api/product

POST AddProduct
http://127.0.0.1:8000/api/product/create

PUT UpdateProduct
http://127.0.0.1:8000/api/product/update/{id}

DELETE DeleteProduct
http://127.0.0.1:8000/api/product/delete/{id}

POST AddStockProduct
http://127.0.0.1:8000/api/product/stock/{id}

POST RemoveStockProduct
http://127.0.0.1:8000/api/product/remove/{id}  
