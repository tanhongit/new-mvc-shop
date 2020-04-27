# Welcome to New PHP MVC by TANHONGIT

Tong quan

Yeu cau cau hinh

Database

# 3 Request appropriate edits

After a clone my repository to the local computer, you need to edit some code to be able to connect to the database and help the site works.

### 3.1 Edit Config

You need to change the path in the 'config.php' file to match the location of this source code on your server and must match the domain you registered.

Path: [`/lib/config/config.php`](https://github.com/TanHongIT/new-mvc-shop/tree/master/lib/config)

```php
<?php
define('BASE_URL', 'new-mvc-shop');
define('PATH_URL', 'http://localhost/new-mvc-shop/');
define('PATH_URL_IMG', PATH_URL . '/public/upload/images/');
define('PATH_URL_IMG_PRODUCT', PATH_URL . '/public/upload/products/');
```
### 3.2 Edit Connect Database

You need to change the connection information to the database after you have cloned my repository so that the website can work.

Path: [`/lib/config/database.php`](https://github.com/TanHongIT/new-mvc-shop/tree/master/lib/config)

This is the path to the database file for you to download: [`/admin/database/***.sql`](https://github.com/TanHongIT/new-mvc-shop/tree/master/admin/database)

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'chikoi');
```

### 3.3 Edit SMTP Mail

The third thing: you need to change the information about SMTP Mail to be able to use some functions about user account authentication, change passwords, notify users, ...

```php
define('SMTP_HOST','smtp.gmail.com');
define('SMTP_PORT','465');
define('SMTP_UNAME','tanhongitverifi@gmail.com');
define('SMTP_PWORD','kkgdqneidrcgvqt');
```

Change the value of the constant SMTP_UNAME and SMTP_PWORD to match the configuration you added on your Gmail.

**Where SMTP_PWORD is the application password for your gmail.com account.**

Path: [`/lib/config/sendmail.php`](https://github.com/TanHongIT/new-mvc-shop/tree/master/lib/config)

### Markdown

Markdown is a lightweight and easy-to-use syntax for styling your writing. It includes conventions for

```markdown
Syntax highlighted code block

# Header 1
## Header 2
### Header 3

- Bulleted
- List

1. Numbered
2. List

**Bold** and _Italic_ and `Code` text

[Link](url) and ![Image](src)
```

For more details see [GitHub Flavored Markdown](https://guides.github.com/features/mastering-markdown/).

### Jekyll Themes

Your Pages site will use the layout and styles from the Jekyll theme you have selected in your [repository settings](https://github.com/TanHongIT/new-mvc-shop/settings). The name of this theme is saved in the Jekyll `_config.yml` configuration file.

### Support or Contact

Having trouble with Pages? Check out our [documentation](https://help.github.com/categories/github-pages-basics/) or [contact support](https://github.com/contact) and we’ll help you sort it out.
