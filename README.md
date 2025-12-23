# wp-ajax-form-handler
Secure AJAX form handling in WordPress


Secure and simple AJAX form handling plugin for WordPress.

---

## 🔹 What this plugin does
This plugin demonstrates how to handle front-end form submissions in WordPress using AJAX without page reload, following WordPress coding and security best practices.

---

## 🔹 Why this plugin was built
AJAX-based forms are very common in WordPress themes and plugins.  
This project was built to showcase:
- Proper use of WordPress hooks
- Secure AJAX handling with nonces
- Clean separation of PHP and JavaScript

---

## 🔹 How it works (AJAX Flow)
1. A form is submitted from the front end
2. JavaScript captures the submit event
3. Request is sent to `admin-ajax.php`
4. WordPress triggers the `wp_ajax` hooks
5. PHP processes and validates the data
6. JSON response is returned to JavaScript

---

