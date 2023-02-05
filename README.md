# Welcome to New PHP MVC by TANHONGIT

The NEW-MVC-SHOP is a free e-commerce website project for everyone to use. It is built in pure PHP language. And anyone can use it.

- Customers do not need to know much about technology.
- Powerful system, many useful functions.
- Easy to access, easy to use.

## Support the project

Support this project :stuck_out_tongue_winking_eye: :pray:

<p align="center">
    <a href="https://www.paypal.me/tanhongcom" target="_blank"><img src="https://img.shields.io/badge/Donate-PayPal-green.svg" data-origin="https://img.shields.io/badge/Donate-PayPal-green.svg" alt="PayPal buymeacoffee TanHongIT"></a>
</p>

# 1. Configuration requirements

    - Version PHP 7.2 and above (-> 8.1)
    - OpenSSL PHP Extension

# 2. Technology

- Pure PHP language

# 3. Feature

```
1. FRONT-END
    - Shopping cart
    - Save cart with database
    - Customer login
    - Content: Page, Post, Product List, Product Details, Category,...
    - Product attributes: cost price, promotion price, detail,...
    - Feedback, Feedback for product, Feedback for order
    - Comment on Product, Post,...
    - Search, pagination,...
    - Checkout, PlaceOrder,...
    ...
=================================================================
2. BACKEND-ADMIN
    - Admin roles, permission
    - Product manager   (Create, delete, update)
    - Category manager  (Create, delete, update)
    - Order management  (Create, delete, update)
    - Comment manager   (Create, delete, update)
    - Feedback manager  (Create, delete, update)
    - User management   (Create, delete, update)
    - Template manager  (Create, update)
    - Backup database
    ...
```

# 4. Download Database

This is the path to the database file for you to download: [`/admin/database/***.sql`](https://github.com/TanHongIT/new-mvc-shop/tree/master/admin/database)

Create a new database on **PHPMyAdmin** at your server, then import the .sql file that you just downloaded.

# 5. Request appropriate edits

After a clone my repository to the local computer, you need to edit some code to be able to connect to the database and help the site works.

### 5.1 Edit Config

You need to change the path in the '**config.php**' file to match the location of this source code on your server and must match the domain you registered.

Path: [`/lib/config/config.php`](https://github.com/TanHongIT/new-mvc-shop/tree/master/lib/config)

```php
<?php
define('BASE_URL', 'new-mvc-shop');
define('PATH_URL', '/');
define('PATH_URL_IMG', PATH_URL . 'public/upload/images/');
define('PATH_URL_IMG_PRODUCT', PATH_URL . 'public/upload/products/');
```

### 5.2 Edit Connect Database

You need to change the connection information to the database after you have cloned my repository so that the website can work.

Path: [`/lib/config/database.php`](https://github.com/TanHongIT/new-mvc-shop/tree/master/lib/config)

This is the path to the database file for you to download: [`/admin/database/***.sql`](https://github.com/TanHongIT/new-mvc-shop/tree/master/admin/database)

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'chikoi');
```

### 5.2 Edit .htaccess

Change RewriteBase - Recommend the path that matches your host address.

---

so we will have:

```
RewriteBase /
```

### 5.4 Edit SMTP Mail

> The third thing:
> You need to change the information about **SMTP Mail** to be able to use some functions about user account authentication, change passwords, notify users, ...

```php
define('SMTP_HOST','smtp.gmail.com');
define('SMTP_PORT','465');
define('SMTP_UNAME','add_your_mail');
define('SMTP_PWORD','add_your_application_password_from_your_mail');
```

Change the value of the constant **SMTP_UNAME** and **SMTP_PWORD** to match the configuration you added on your Gmail.

Tips: https://support.google.com/accounts/answer/185833?hl=en

**Where SMTP*PWORD is the application password for your \_gmail.com* account.**

Path: [`/lib/config/sendmail.php`](https://github.com/TanHongIT/new-mvc-shop/tree/master/lib/config)

# 6. Demo

1. Front-End: [http://tanhongit.epizy.com/new-mvc-shop/home](http://tanhongit.epizy.com/new-mvc-shop/home)
2. Back-End: [http://tanhongit.epizy.com/new-mvc-shop/admin.php](http://tanhongit.epizy.com/new-mvc-shop/admin.php)

> **_Account login on Backend_**

```
user :
    username: testna      | email: test@gmail.com        | password: 123456789
    username: tanhongitii | email: meowwww@gmail.com.com | password: 123456789
Mod :
    username: eyteyt      | email: moderator@gmail.com   | password: 12345678
Admin:
    username: admin       | email: admin@gmail.com       | password: 1234567890
```

# Demo Images

**HomePage**
![Image](https://imgur.com/rncleZ0.png)

---

**Slide of Homepage**
![Image](https://imgur.com/uI1Umba.png)

---

**Product Page**
![Image](https://imgur.com/ExdAptJ.png)

---

**Admin Manager Page**
![Image](https://imgur.com/xOpAmb4.png)

---

<p align="center">
     <img src="https://img.shields.io/packagist/l/doctrine/orm.svg" data-origin="https://img.shields.io/packagist/l/doctrine/orm.svg" alt="license">
</p>
