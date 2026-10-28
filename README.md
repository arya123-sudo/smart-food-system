# 🥗 Smart Food Intelligence & Waste Optimization System

A DBMS mini-project that helps households **stop wasting food**. The Smart Food Intelligence & Waste Optimization System is a web application for managing household food inventory, tracking expiry dates, logging food waste, and analyzing waste patterns through dashboards and charts — built with **PHP, MySQL, HTML, CSS and JavaScript**.

## ✨ Features

- **User Registration & Login** — session-based authentication (`register.php`, `login.php`, `logout.php`)
- **Dashboard Analytics** — at-a-glance overview of inventory and waste (`dashboard.php`)
- **Inventory Management** — add, view, search, edit and delete food items (`inventory.php`, `add_food.php`, `edit_food.php`, `delete_food.php`)
- **Expiry Alert System** — flags items approaching their expiry date (`expiry_alert.php`)
- **Waste Log Management** — record what was wasted and why (`waste_log.php`)
- **Waste Analytics with Charts** — visual breakdown of waste data (`analytics.php`, Chart.js)

## 📸 Screenshots

![Smart Food System screenshot](screeshots/Screenshot%202026-05-29%20173353.png)

![Smart Food System screenshot](screeshots/Screenshot%202026-05-29%20173407.png)

![Smart Food System screenshot](screeshots/Screenshot%202026-05-29%20173527.png)

*More screenshots in the [`screeshots/`](screeshots/) folder.*

## 🛠️ Technologies Used

- **PHP** — server-side logic
- **MySQL** — database (via MySQLi)
- **HTML / CSS / JavaScript** — frontend
- **Chart.js** — analytics charts
- **XAMPP** — local Apache + MySQL stack

## 🗄️ Database Schema

Database name: **`smart_food_db`** (configured in `db.php`)

| Table | Purpose |
|---|---|
| `USER` | Registered users |
| `HOUSEHOLD` | Household profiles |
| `FOOD_ITEM` | Food inventory with expiry dates |
| `CONSUMPTION_LOG` | Consumed items record |
| `WASTE_LOG` | Wasted items and reasons |
| `SHOPPING_LIST` | Shopping list items |
| `NOTIFICATION` | Expiry and system alerts |

## ▶️ How to Run

1. Install **XAMPP** and start **Apache** and **MySQL** from the control panel
2. Create a database named `smart_food_db` in phpMyAdmin and create the tables listed above
3. Place the project folder inside the `htdocs` directory
4. Check the connection settings in `db.php` (host, user, password, port) match your MySQL setup
5. Open **http://localhost/smart-food-system** in your browser, register an account, and start adding food items

## 📂 Project Structure

```
├── index.php          # Landing page
├── register.php       # User registration
├── login.php          # Login (session-based)
├── logout.php         # Logout
├── dashboard.php      # Analytics dashboard
├── inventory.php      # Food inventory listing & search
├── add_food.php       # Add food item
├── edit_food.php      # Edit food item
├── delete_food.php    # Delete food item
├── expiry_alert.php   # Expiry alerts
├── waste_log.php      # Waste logging
├── analytics.php      # Waste analytics & charts
├── db.php             # Database connection
├── style.css          # Stylesheet
└── screeshots/        # App screenshots
```

## 👤 Developed By

**Arya Yaligar** — [GitHub](https://github.com/arya123-sudo) · [LinkedIn](https://www.linkedin.com/in/arya-yaligar-ba15a2385)
