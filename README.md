# CakePHP Application de Atencion Primaria de Salúd

![Build Status](https://github.com/cakephp/app/actions/workflows/ci.yml/badge.svg?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/cakephp/app.svg?style=flat-square)](https://packagist.org/packages/cakephp/app)
[![PHPStan](https://img.shields.io/badge/PHPStan-level%207-brightgreen.svg?style=flat-square)](https://github.com/phpstan/phpstan)

A skeleton for creating applications with [CakePHP](https://cakephp.org) 4.x.

The framework source code can be found here: [cakephp/cakephp](https://github.com/cakephp/cakephp).

## Installation

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run

```bash
composer create-project --prefer-dist cakephp/app
```

In case you want to use a custom app dir name (e.g. `/myapp/`):

```bash
composer create-project --prefer-dist cakephp/app myapp
```

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

## Update

Since this skeleton is a starting point for your application and various files
would have been modified as per your needs, there isn't a way to provide
automated upgrades, so you have to do any updates manually.

## Configuration

Read and edit the environment specific `config/app_local.php` and setup the 
`'Datasources'` and any other configuration relevant for your application.
Other environment agnostic settings can be changed in `config/app.php`.

## Layout

The app skeleton uses [Milligram](https://milligram.io/) (v1.3) minimalist CSS
framework by default. You can, however, replace it with any other library or
custom styles.


## System photos
System screen captures


![Screenshot 2021-11-05 at 09-08-05 APS](https://user-images.githubusercontent.com/67332538/140515452-55a05749-956e-4b23-af73-d1714499d9f6.png)
![Screenshot 2021-11-05 at 09-07-56 APS](https://user-images.githubusercontent.com/67332538/140515454-467f411d-4e0f-4b0b-93bf-f3076cbf1236.png)
![Screenshot 2021-11-05 at 09-07-23 APS](https://user-images.githubusercontent.com/67332538/140515455-1fd5c20d-e978-4fc6-9f7a-4960406e0aa3.png)
![Screenshot 2021-11-05 at 09-07-17 APS](https://user-images.githubusercontent.com/67332538/140515458-2673cd0d-99e9-4fb4-8e33-4765b1856715.png)
![Screenshot 2021-11-05 at 09-07-07 APS](https://user-images.githubusercontent.com/67332538/140515459-c39970a6-e115-460a-a1fa-1d5c546a53de.png)
![Screenshot 2021-11-05 at 09-06-58 APS](https://user-images.githubusercontent.com/67332538/140515461-686a6be1-1156-4192-bbf4-eadf9d2711d9.png)
![Screenshot 2021-11-05 at 09-06-44 CakeLTE Admin Users](https://user-images.githubusercontent.com/67332538/140515465-fb688593-280a-46bc-a451-b19c08131043.png)
![Screenshot 2021-11-05 at 09-08-31 Persons - persons1-2 pdf](https://user-images.githubusercontent.com/67332538/140515448-ae6591be-ecb9-4c7c-82a1-3ace06d99a5e.png)

