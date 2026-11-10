# EC2-lab - Website on AWS EC2 + nginx

A personal website built and deployed incrementally over a semester (CS 4413, Web Technologies, Spring 2026). It started as a static HTML page on the default nginx root of an AWS EC2 instance. Twenty iterations later it was a PHP/MySQL site with a database driven CMS, server side form validation, an AJAX refreshed results view, and account registration and login.



## 1. Environment
| Layer  | What was used |
|:-|:-|
| Cloud host | AWS EC2, region us-east-2(Ohio) |
| Access | SSH with an EC2 key pair (`.pem`) |
| OS | Debian/Ubuntu family |
| Web server | nginx, web root `/var/www/html/` |
| Server side language | PHP 8+ |
| Database | MySQL 8, administered with phpMyAdmin |
| Front end | HTML5, CSS, Bootstrap 3 ("fh5co" free HTML5 template), jQuery |
| Authoring/deploy | Adobe Dreamweaver with remote site sync |


## Database schema

```sql
contact_info (
  first_name, last_name, email, username, password, phone, comments
)

menu (location, title, status)
pages (location, data)

accounts (
  auto_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(32) NOT NULL,
  logon VARCHAR(64) NOT NULL,
  sid VARCHAR(64) NULL
)
```

## Skills demonstrated

- Launching and administering a Linux EC2 instance over SSH with key pair authentication
- Installing and serving content with nginx, and adding PHP processing to it
- Setting up MySQL and phpMyAdmin, creating a least privilege application account, and designing tables
- Event handling and client side validation
- PHP request handling (`GET`/`POST`), sessions, server side validation, the PRG style redirect pattern
- Refactoring to a front controller, then to a database driven CMS
- AJAX polling with jQuery
- Registration and login with salted hashing and session tokens



















