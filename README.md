# phpMyYang Portfolio - Backend API 🚀

This is the robust backend API built with **Laravel 11** that powers the phpMyYang Developer Portfolio. It handles secure data processing, third-party API integrations, and email dispatching.

## 🛠️ Tech Stack

- **Framework:** Laravel 11 (PHP)
- **Mail Service:** Symfony Mailer (via Gmail SMTP)
- **Security:** Google reCAPTCHA v2 (via GuzzleHTTP)
- **API Architecture:** RESTful API

## ✨ Key Features

- **Secure Contact Form:** Validates incoming requests and processes contact form submissions.
- **reCAPTCHA Verification:** Communicates with Google's API to ensure human interaction and prevent spam.
- **Automated Email Dispatch:** Sends formatted emails to the admin using robust SMTP configurations.
- **CORS Configured:** Fully configured to securely accept requests from the frontend React application.

## 📋 Prerequisites

Make sure you have the following installed on your local machine:

- PHP 8.2 or higher
- Composer

## 🚀 Installation & Setup

1. **Clone the repository**

```bash
   git clone [https://github.com/yourusername/phpmyyang-backend.git](https://github.com/yourusername/phpmyyang-backend.git)
   cd phpmyyang-backend

```

2. **Install dependencies**

```bash
   composer install

```

3. **Set up environment variables**
   Copy the example `.env` file and generate an application key:

```bash
   cp .env.example .env
   php artisan key:generate

```

4. **Configure the `.env` file**
   Open the `.env` file and configure your SMTP and reCAPTCHA credentials:

```env
   # Frontend URL for CORS
   FRONTEND_URL=http://localhost:5173

   # Mail/SMTP Configuration (Use Google App Passwords for Gmail)
   MAIL_MAILER=smtp
   MAIL_HOST=smtp.gmail.com
   MAIL_PORT=587
   MAIL_USERNAME=your_email@gmail.com
   MAIL_PASSWORD=your_16_character_app_password
   MAIL_ENCRYPTION=tls
   MAIL_FROM_ADDRESS=your_email@gmail.com
   MAIL_FROM_NAME="phpMyYang Portfolio"

   # Google reCAPTCHA v2
   RECAPTCHA_SECRET_KEY=your_recaptcha_secret_key_here

```

5. **Clear Configurations (If you updated the .env)**

```bash
   php artisan config:clear
   php artisan cache:clear

```

6. **Run the Development Server**

```bash
   php artisan serve

```

The API will be available at `http://127.0.0.1:8000`.

## 🔒 Security Note

Never commit your `.env` file. A `.env.example` is provided for reference.

```

```
