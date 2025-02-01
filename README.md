# Bus Reservation System

The **Bus Reservation System** is a web-based application built with Laravel 11 that allows users to book bus tickets for scheduled trips. Admins can manage buses, schedules, and reservations. Users can view available buses at specific timestamps and reserve tickets accordingly.

---

## Table of Contents

1. [Features](#features)
2. [Tech Stack](#tech-stack)
3. [Setup and Installation](#setup-and-installation)

---

## Features:

- **User & Admin Roles**: Users can book tickets, while admins manage buses and schedules.
- **Bus Management**: Admins can add buses with specific departure times.
- **Reservation System**: Users can reserve a ticket for a given bus at an available timestamp.
- **AWS S3 Integration**: Images are stored securely on an AWS S3 bucket.
- **Seeder for Initial Data**: Predefined seeders help populate the database with essential data.

---

## Tech Stack

The project utilizes the following technologies:

- Laravel 11
- MySQL
- AWS S3 (Storage for Images)
- JavaScript
- Bootstrap

---

## Setup and Installation

If you wish to set up and run the project locally, follow these steps:

### **1. Clone the Repository**

```sh
git clone https://github.com/AtanasovskiPetar/bus-reservation.git
cd bus-reservation
```

### **2. Install Dependencies**

```sh
composer install
npm install
```

### **3. Setup Environment Variables**

Copy the `.env.example` file and rename it to `.env`:

```sh
cp .env.example .env
```

Generate an application key:

```sh
php artisan key:generate
```

### **4. Configure Database**

Ensure you have MySQL installed and set up the database in your `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bus_reservation
DB_USERNAME=root
DB_PASSWORD=
```

Then, run migrations to create database tables:

```sh
php artisan migrate --seed
```

This will also run the **seeder** to pre-populate the database with initial data.

### **5. Configure AWS S3 for Image Storage**

Configure the AWS credentials for your file storage in the `.env` file:

```env
AWS_ACCESS_KEY_ID=your-access-key
AWS_SECRET_ACCESS_KEY=your-secret-key
AWS_DEFAULT_REGION=your-region
AWS_BUCKET=your-bucket-name
```

### **6. Serve the Application Locally**

Run the Laravel development server:

```sh
php artisan serve
```

Now, open your browser and navigate to `http://127.0.0.1:8000` to access the application.

---
