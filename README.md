# Dynamic Web Project Demonstrating Full-Stack Fluency

This repository contains coursework and projects with a strong focus on **web development fundamentals** using **PHP** as the server-side language and **jQuery/JavaScript** for interactivity on the client side. Inside the `src/` folder are numerous examples, small applications, and exercises. One of the highlights is a working **Connect-4 game** implemented with PHP (for game state and logic) and jQuery/JavaScript (for front-end interactivity).

## ✨ What It Does
- Demonstrates **core PHP programming**: request handling, form submissions, sessions, and server-rendered HTML.
- Uses **jQuery** to enhance the UI with DOM manipulation and dynamic behavior.
- Includes classic mini-projects and **Connect-4**, which showcases how PHP and JavaScript can work together in a browser game.
- Organized into self-contained assignments for practice in both backend and frontend.

## 📂 Project Structure
~~~text
.
├─ src/                 # PHP scripts, HTML templates, JavaScript/jQuery files
│  ├─ connect4/         # Connect-4 game implementation
│  ├─ assignments/      # Other PHP exercises/mini projects
│  ├─ css/              # Stylesheets
│  └─ js/               # Client-side scripts (jQuery, custom JS)
├─ LICENSE              # MIT
└─ README.md            # Project documentation
~~~

## 🛠 Tech Stack
- **Languages:** PHP 7+, JavaScript (ES5/ES6), HTML5, CSS3
- **Libraries:**
    - [jQuery](https://jquery.com/) for DOM manipulation and event handling
- **Tools:**
    - Runs in any environment with a **PHP interpreter** (XAMPP, MAMP, WAMP, or built-in PHP server)
    - A browser for rendering and running client-side code
- **Database:** MySQL to persist data

## 🚀 Getting Started

### 1) Clone
~~~bash
git clone https://github.com/ylehilds/it210.git
cd it210/src
~~~

### 2) Run PHP Locally
Option A: Using PHP’s built-in server (requires PHP installed):
~~~bash
php -S localhost:8000
~~~
Then visit [http://localhost:8000](http://localhost:8000) in your browser.

Option B: Using XAMPP/MAMP/WAMP:
- Place the `src/` directory inside the server’s `htdocs/` (or `www/`) folder.
- Start Apache from the control panel.
- Visit [http://localhost/src](http://localhost/src).

### 3) Play Connect-4
- Navigate to `/connect4/` after starting the server:
    - [http://localhost:8000/connect4](http://localhost:8000/connect4) (built-in server)
    - or [http://localhost/src/connect4](http://localhost/src/connect4) (XAMPP/MAMP/WAMP)
- The game UI is rendered in the browser, with moves handled dynamically via jQuery and backend state managed by PHP.
- Users will advance the bracket according to their victory

## 📚 Topics Covered
- PHP basics: variables, arrays, loops, conditionals
- Form processing and server-client communication
- Session handling and simple state management
- jQuery for UI interactions and AJAX requests
- Building a browser game (Connect-4) using PHP + JavaScript
- MySQL Database
- User authentication

## 🔭 Potential Extensions
- Enhance **Connect-4** with AI to play against the computer.
- Add a **database layer** (MySQL) to persist game scores or user accounts.
- Replace jQuery with vanilla JavaScript or a modern framework (Vue/React) for comparison.
- Add CSS animations to make the UI more engaging.

## 📄 License
This project is licensed under the **MIT License** — see [`LICENSE`](./LICENSE).

## 👤 Author
**Lehi Alcantara**  
🌐 https://www.lehi.dev  
✉️ lehi@lehi.dev