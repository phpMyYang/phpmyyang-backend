# phpMyYang Portfolio - Backend API 🚀

This is the robust backend API built with **Laravel 11** that powers the phpMyYang Developer Portfolio. It handles secure data processing, third-party API integrations, and background email dispatching via queues.

## 🛠️ Tech Stack

- **Framework:** Laravel 11 (PHP 8.4)
- **Containerization:** Docker & Docker Compose
- **Database (Queues):** SQLite
- **Mail Service:** Symfony Mailer (via Resend)
- **Security:** Google reCAPTCHA v2 (via GuzzleHTTP)
- **API Architecture:** RESTful API

## ✨ Key Features

- **Decoupled Architecture:** Runs as a standalone API independent of the frontend via Docker Compose.
- **Background Job Processing:** Utilizes Laravel Queues (SQLite driver) with a dedicated Docker worker container for instant API responses while sending emails in the background.
- **Secure Contact Form:** Validates incoming requests and processes contact form submissions.
- **reCAPTCHA Verification:** Communicates with Google's API to ensure human interaction and prevent spam.
- **Automated Email Dispatch:** Sends formatted emails to the admin using robust SMTP/Resend configurations.
- **CORS Configured:** Fully configured to securely accept requests from the frontend React application.

## 📋 Prerequisites

Make sure you have the following installed on your local machine:

- **Docker Desktop** (or Docker Engine + Docker Compose Plugin)
- _(No local PHP, Node, or Composer installation is required as everything runs inside Docker)_

## 🚀 Installation & Setup

1. **Clone the repositories (Workspace Setup)**
   Since this is a decoupled architecture, create a workspace folder and clone both the backend and frontend repositories inside it.

    ```bash
    mkdir phpmyyang-portfolio
    cd phpmyyang-portfolio

    # Clone Backend
    git clone [https://github.com/yourusername/phpmyyang-backend.git](https://github.com/yourusername/phpmyyang-backend.git)

    # Clone Frontend
    git clone [https://github.com/yourusername/phpmyyang-frontend.git](https://github.com/yourusername/phpmyyang-frontend.git)
    ```

````


2. **Set up backend environment variables**
   Navigate into the backend folder, copy the example `.env` file, and generate the application key (you will need temporary local PHP for the key generation, or you can run it inside the container later).

   ```bash
   cd phpmyyang-backend
   cp .env.example .env

````

3. **Configure the `.env` file**
   Open the `.env` file and configure your Queue, SMTP/Resend, and reCAPTCHA credentials:

    ```env
    APP_ENV=local
    APP_DEBUG=true

    # Queue and Database Configuration
    DB_CONNECTION=sqlite
    QUEUE_CONNECTION=database

    # Frontend URL for CORS
    FRONTEND_URL=http://localhost:5173

    # Mail Configuration (Resend API)
    MAIL_MAILER=resend
    RESEND_API_KEY=your_resend_api_key_here
    MAIL_FROM_ADDRESS=onboarding@resend.dev
    MAIL_FROM_NAME="phpMyYang Portfolio"

    # Google reCAPTCHA v2
    RECAPTCHA_SECRET_KEY=your_recaptcha_secret_key_here
    ```

````


4. **Run the Docker Environment**
   Navigate back to your main workspace folder (`phpmyyang-portfolio`) where your `docker-compose.yml` is located, and build the containers:

   ```bash
   cd ..
   docker compose up -d --build

````

5. **Initialize the Database & Migrations (For Queues)**
   Once the containers are running, execute the following commands to create the SQLite file and run the necessary queue migrations inside the backend container:

    ```bash
    docker exec -it phpmyyang-backend touch database/database.sqlite
    docker exec -it phpmyyang-backend php artisan migrate
    ```

````


6. **Restart to Activate Queue Worker**
   Restart the containers so the `queue-worker` service can properly connect to the newly migrated database:

   ```bash
   docker compose up -d

````

The API will now be fully operational at `http://127.0.0.1:8000`, with the queue worker actively listening for incoming email jobs.

## 🔒 Security Note

Never commit your `.env` or `database.sqlite` files. A `.env.example` is provided for reference.
