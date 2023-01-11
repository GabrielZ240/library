# Library

Project Library.
These are the steps to install and test the Library project.

## Installation

1. Clone the repository using Github.

2. Duplicate the the ".env.example" file and rename it as ".env".

3. Open the terminal and go to the project folder.

4. Create the database and name ir as "library".

5. Run the following commands:

```bash
composer update

npm i && npm run prod

php artisan migrate

php artisan key:generate

```

6. Go to the navigator and open the route [http://library.test/](http://library.test/).

7. Register a user.

8. Go to the database and change the user role to 'sa' in the table users.

9. Create a category.

10. Create a book.

## License

[MIT](https://choosealicense.com/licenses/mit/)