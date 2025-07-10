# To-Do-list

## Requirements

-   PHP (Laravel Sail / Docker)
-   Composer
-   Node.js + npm

## Installation

1. **Clone the repository:**
    ```bash
    git clone https://github.com/zeus5100/To-Do-list
    cd To-Do-list
    ```
2. **Copy the `.env` file and configure mail settings:**
    ```bash
    cp .env.example .env
    ```
3. **Update mail settings (e.g., for Mailtrap):**
    ```env
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=twoj_login
    MAIL_PASSWORD=twoje_haslo
    ```
4. **Install dependencies:**
    ```bash
    composer install
    npm install
    ```
5. **Build frontend assets:**
    ```bash
     npm run build
    ```
6. **Run Docker containers:**
    ```bash
    ./vendor/bin/sail up -d
    ```
7. **Generate the application key:**
    ```bash
    ./vendor/bin/sail artisan key:generate
    ```

## Access the application

After setup, open your browser and go to:

<a href="http://localhost:8000" target="_blank" rel="noopener noreferrer">http://localhost:8000</a>

## Task Reminders

Task reminders for the next day are handled in the file:

`routes/console.php`

The scheduled task runs daily at the time set here:

```php
})->dailyAt('00:01');
```

For testing purposes, you can temporarily change the time to a nearer future time, e.g.:

```php
})->dailyAt('15:30');
```

## License

Private use only — recruitment task.
