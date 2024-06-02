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
> - Web Server: Apache
> - Version PHP >= 8.0
> - Composer >= 2.0
> - OpenSSL PHP Extension
> - [Composer](https://getcomposer.org/download/) (Please install composer before running this project).
> - MySQL >= 8.0 (or MariaDB >= 10.0)

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

# 5. Request configuration

Clone the project to your computer:

```bash
git clone https://github.com/tanhongit/new-mvc-shop.git
```

Copy the .env.example file to .env:

```bash
cp .env.example .env
```

Run composer install:

```bash
composer install
```

# 6. Installation instructions

After running the above command, you need to edit the following information in the **.env** file:

## 6.1 Edit Config

You need to change the path in the '**.env**' file to match the location of this source code on your server and must match the domain you registered.

```dotenv
PATH_URL=/
PATH_URL_IMG=public/upload/images/
PATH_URL_IMG_PRODUCT=public/upload/products/
```

> **Note:**
> 
> The path of the config file that is using these environment variables is located at: [`/lib/config/config.php`](https://github.com/TanHongIT/new-mvc-shop/tree/master/lib/config/config.php)

## 6.2 Edit Connect Database

You need to change the connection information and import sql file to the database after you have cloned my repository so that the website can work.

This is the path to the sql file for you to import to your database:
[`/admin/database/***.sql`](https://github.com/TanHongIT/new-mvc-shop/tree/master/admin/database)

And change the connection information to match your database in .env file:

```dotenv
DB_HOST=db_server
DB_PORT=3306
DB_USER=root
DB_PASS=root
DB_NAME=new_mvc_shop_db
```

> **Note:**
>
> The path of the database config file that is using these environment variables is located at: [`/lib/config/database.php`](https://github.com/TanHongIT/new-mvc-shop/tree/master/lib/config/database.php)

## 6.3 Edit .htaccess

Change RewriteBase - Recommend the path that matches your host address.

So we will have:
```
RewriteBase /
```

---

> **Note**: This applies to the case where your project is in a subfolder, and you want it accessible from a subpath URL.
>
>**EXAMPLE**:
>```
>http://localhost/new-mvc-shop/
>``` 
> So we will have:
> ```
> RewriteBase /new-mvc-shop/
> ```

## 6.4 Edit SMTP Mail

> The third thing: 
You need to change the information about **SMTP Mail** to be able to use some functions about user account authentication, change passwords, notify users, ...

Update the following information in the **.env** file:

```dotenv
SMTP_HOST=smtp.gmail.com
SMTP_PORT=465
SMTP_UNAME=add_your_mail
SMTP_PWORD=add_your_application_password_from_your_mail
```

Change the value of the constant **SMTP_UNAME** and **SMTP_PWORD** to match the configuration you added on your Gmail.

Tips: https://support.google.com/accounts/answer/185833?hl=en

**Where SMTP_PWORD is the application password for your _gmail.com_ account.**

> **Note:**
>
> The path of the email config file that is using these environment variables is located at: [`/lib/config/sendmail.php`](https://github.com/TanHongIT/new-mvc-shop/tree/master/lib/config/sendmail.php)

# 7. Install with Docker (Optional)

> Note: 
> 
> **Please skip this section if you have already installed the project in the above section.**

If you want to run this project with Docker, you can edit .env file and use the following command:

Please edit the following information in the **.env** file:

(Please set ports for **MYSQL_PORT, PHPMYADMIN_PORT, APP_PORT, SSL_PORT** and not duplicate with other ports)

**Example:**

```dotenv
APP_NAME=nms

APP_PORT=85
SSL_PORT=443 # (optional)

MYSQL_PORT=3307
MYSQL_USER=root
MYSQL_ROOT_PASS=root
MYSQL_DB=new-mvc-shop
MYSQL_PASS=root

PHPMYADMIN_PORT=8081
PHPMYADMIN_UPLOAD_LIMIT=2048M
```

## 7.1 Installation with bash script:

If your OS is **Linux**, you can use the bash script to easily run the project with Docker.

```bash
bash install.sh
```

---

If not, please follow the instructions below.

## 7.2 Installation with commands:

Run the following command:

```bash
docker compose up -d
```

After running the above command, you need to install the composer package for the project.

```bash
docker compose run --rm -w /var/www/html server composer install
```

Finally, you need to import the database file into the database container.

# 8. Demo

1. Front-End: [https://chikoiquan.tanhongit.com](https://chikoiquan.tanhongit.com)
2. Back-End: [https://chikoiquan.tanhongit.com/admin.php](https://chikoiquan.tanhongit.com/admin.php)

> **_Account login on Backend_**
> 
> ```
> user :
>     username: testna      | email: test@gmail.com        | password: 123456789
>     username: tanhongitii | email: meowwww@gmail.com.com | password: 123456789
> Mod :
>     username: eyteyt      | email: moderator@gmail.com   | password: 12345678
> 
> Admin:
>     username: admin       | email: admin@gmail.com       | password: 1234567890
> ```

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

![Image](https://imgur.com/u8lXnsz.png)

---

<p align="center">
     <img src="https://img.shields.io/packagist/l/doctrine/orm.svg" data-origin="https://img.shields.io/packagist/l/doctrine/orm.svg" alt="license">
</p>
