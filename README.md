# Clinic Management System

A simple and powerful **Clinic Management System** built with **Native PHP**.  
This system is designed to simplify clinic operations such as managing users, medicines, departments, patient registrations, and prescriptions.

---

## Features

- **User Authentication & Roles**
  - **Admin**: Full access to manage all modules
  - **Doctor**: Manage patient records, schedules, and prescriptions
  - **Patient**: Access medical history and registration

- **Dashboard**  
  Get an overview of clinic statistics and activities.

- **User Management**  
  Manage Admin, Doctor, and Patient accounts.

- **Medicine (Obat)**  
  Manage medicine inventory, availability, and usage.

- **Poli (Clinic Departments)**  
  Organize clinic departments such as General, Dental, Pediatrics, etc.

- **Registration (Pendaftaran)**  
  Handle patient registration for checkups and clinic visits.

- **Prescription (Resep)**  
  Manage and print medical prescriptions.

---

## System Menu Overview

- **Dashboard** → Overview of clinic statistics and activities  
- **User** → Manage Admin, Doctor, and Patient  
- **Obat (Medicine)** → Manage medicine inventory  
- **Poli** → Manage clinic departments  
- **Pendaftaran (Registration)** → Patient registration for clinic visits  
- **Resep (Prescription)** → Manage medical prescriptions  

---

## Tech Stack

- PHP Native
- MySQL
- HTML, CSS, JavaScript
- Composer (Dependency Management)
- Dotenv (Environment Configuration)

---

## Installation

1. Clone this repository  
   ```
   git clone https://github.com/gede-candra/clinic-management-system-with-php.git
   ```
   ```
   cd clinic-management-system-with-php
   ```
2. Install dependencies
    ```
    composer install
    ```
3. Configure environment variables
    - Copy .env.example to .env
    - Update the .env file with your database and app configuration:
        ```
        APP_NAME="Sistem Manajemen Klinik"
        APP_DEBUG=true
        APP_URL=http://localhost:8000


        DB_HOST=localhost
        DB_USER=root
        DB_PASS=
        DB_NAME=poliklinik
        ```
4. Import database
    - Find the .sql file inside the database/ folder
    - Import it into your MySQL server
5. Start project to local server
    ```
    composer serve
    ```
