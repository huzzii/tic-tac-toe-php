# 🎮 Tic Tac Toe (PHP)

A simple Tic Tac Toe game built using **pure PHP** with **file-based state storage** — no database, no frameworks.

---

## 🏷️ Badges

![PHP](https://img.shields.io/badge/PHP-8.x-blue)
![Status](https://img.shields.io/badge/status-active-success)
![License](https://img.shields.io/github/license/huzzii/tic-tac-toe-php)
![Stars](https://img.shields.io/github/stars/huzzii/tic-tac-toe-php)

---

## ✨ Features

- Two-player gameplay (X vs O)
- File-based game state (no database required)
- Persistent board (refresh-safe)
- Win and draw detection
- Simple and lightweight

---

## 🛠️ Tech Stack

- PHP
- HTML
- File handling (for saving game state)

---

## 📂 Project Structure
tic-tac-toe-php/
│── index.php # Main game logic + UI
│── TicTacToe.php # Service php file for them game 
│── README.md


---

## ⚙️ How It Works

- Each move updates the file
- PHP reads and writes the game state on every request
- The game persists even after refreshing the page

---

## ▶️ Run Locally

```bash
git clone https://github.com/huzzii/tic-tac-toe-php.git
cd tic-tac-toe-php
php -S localhost:8000