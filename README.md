# University Review Web App (MySQL)

> An **anonymous university review web application** that lets students share honest, transparent feedback about their institutions.

## 🎯 Overview

A full-stack web app built with PHP and MySQL that enables students to post and read anonymous university reviews. The focus is on a simple, intuitive UI/UX that encourages genuine participation while keeping users anonymous.

## ✨ Features

- Anonymous review submission and browsing
- MySQL-backed data storage and retrieval
- Clean, responsive UI/UX for ease of use
- Structured schema for universities and reviews

## 🛠️ Tech Stack

- **PHP** — server-side logic
- **MySQL** — database
- **CSS** — styling and responsive layout

## 🚀 Getting Started

```bash
# Clone the repository
git clone https://github.com/arundhatibiswas/University-Review-web-app-MySQL-.git
```

1. Copy the project files into your local server root (e.g. `htdocs` for XAMPP).
2. Create a MySQL database and import the provided `.sql` schema.
3. Update the database credentials in the config/connection file.
4. Start Apache + MySQL and open the app in your browser (e.g. `http://localhost/...`).

## 🗄️ Database

The app uses a MySQL database with three related tables:

1. users — stores an anonymous identity for each user (anonymous_id) instead of personal details, keeping reviewers anonymous.
2. reviews — holds each review's text, a 1–5 rating, a category (Staff, Faculty, Student), and an is_flagged status; linked to users.
3. flag — records reports on reviews (reason + timestamp), linking a flagged review to the user who reported it.
4. admins — Stores admin/moderator accounts that manage the dashboard, review flags, and content moderation.

Foreign keys connect reviews and flags back to users, with cascading deletes to keep data consistent. See [tables](tables.txt) for the full schema.


## 👤 Author

**Arundhati Biswas** — Web Developer & n8n Automation Builder
- LinkedIn: https://www.linkedin.com/in/arundhati-biswas-387482276
- GitHub: https://github.com/arundhatibiswas
