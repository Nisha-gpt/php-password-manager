# 🔐 PHP OOP Password Manager

A secure password manager built using PHP and Object-Oriented Programming (OOP). This system allows users to register, generate encrypted passwords based on custom criteria, and store them in a MySQL database. Designed as a lab project for academic evaluation.

---

## 📌 Features

- User registration with password hashing (`password_hash`)
- AES-based encryption of generated passwords using user-derived keys
- Password generator with user-defined length and character types
- Storage of encrypted passwords with website/app names
- Clean and responsive UI with background image and purple theme
- Session management for secure login
- PDF report viewable directly from the app

---

## 🛠️ Technologies Used

- PHP (OOP)
- MySQL
- HTML/CSS
- AES Encryption (`openssl_encrypt`)
- Sessions & Form handling

---


---

## 🧪 How to Run Locally using (XAMPP) - I have myself used XAMPP so i recommend this itself 

1. Copy the folder to `C:/xampp/htdocs/php-password-manager/`
2. Start Apache & MySQL in XAMPP
3. Go to localhost/phpmyadmin
4. Then to the left click on "New"
5. After creating new oopen the new folder you created
6. CLick on the hamburger option above and click on SQL
7. Add the below table over there in the box and click on GO

```sql
CREATE DATABASE password_manager;

USE password_manager;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  encryption_key VARBINARY(255) NOT NULL
);

CREATE TABLE passwords (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  website VARCHAR(100),
  password_encrypted TEXT,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id)
);



