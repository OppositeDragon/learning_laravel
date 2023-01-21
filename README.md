# Repository dedicated to learning Laravel.

This repository dedicated to learning Laravel, a PHP web application framework. This repository is designed to help me improve my skills and understanding of the Laravel framework.

### Resources
In this repository, one can find a variety of resources including:

- Code snippets and examples.
- Practice projects.
- Learning notes.

Text Editor used is VSCode with the following extensions:
- [PHP Namespace Resolver](https://marketplace.visualstudio.com/items?itemName=MehediDracula.php-namespace-resolver)
- [Laravel Blade Snippets](https://marketplace.visualstudio.com/items?itemName=onecentlin.laravel-blade)

#### Thinkering with php.
- To install php on linux: 
  -  `sudo apt install php8.1-cli`
- To create a local server with php run:
  - `php -S localhost:8000`> 
    > This is only for development purposes.
- Composer is a PHP dependency manager. To install composer on linux:
  - `sudo apt install composer`
  - Composer will place dependencies on the 'vendor' folder.
- Install slugify
  - `composer require cocur/slugify`
  - To import on a file use:
    - ```php
		require __DIR__ . '/vendor/autoload.php';
		use Cocur\Slugify\Slugify;
		```
- [To better understand autoloading and namespaces in PHP](daggerhartlab.com/autoloading-namespaces-php)

## Create a Laravel project
- To create a Laravel project run:
  - `composer create-project laravel/laravel firstapp`
    - This will create a new folder called 'firstapp' with the Laravel project.
  - To start a local server for this project, from its root, run:
	 - `php artisan serve`

