# Got Your Logs

Got Your Logs is a Laravel package that allows you to log every action in your Laravel project. Logs are stored in daily JSON files, and the log format is customizable to fit your needs. This package is designed to be easy to use and integrate into any Laravel application.

## Features

- **Automatic Logging:** Log any action or event in your Laravel application with a simple method call.
- **Daily JSON Files:** Logs are stored in daily JSON files, making it easy to manage and review.
- **Customizable Format:** Modify the log format to include the information you need.
- **Simple Integration:** Easy to install and use in any Laravel project.

## Installation

To install the `techfy/got-your-logs` package, follow these steps:

### Step 1: Require the Package

Add the package repository to your `composer.json`:

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/MdIshtiaque/got-your-logs"
    }
],
"require": {
    "techfy/got-your-logs": "dev-main"
}
```

Then run:

```bash
composer update
```

### Step 2: Register the Service Provider and Facade

After installation, register the service provider and facade in your `config/app.php` file:

```php
'providers' => [
    // Other Service Providers
    Techfy\GotYourLogs\GotYourLogsServiceProvider::class,
],

'aliases' => [
    // Other Aliases
    'GotYourLogs' => Techfy\GotYourLogs\LogFacade::class,
],
```

### Step 3: Publish the Configuration File

To customize the log format and storage location, you can publish the configuration file:

```bash
php artisan vendor:publish --tag=config --provider="Techfy\GotYourLogs\GotYourLogsServiceProvider"
```

This will create a `config/gotyourlogs.php` file in your Laravel project.

## Usage

### Logging an Action

You can log any action or event in your Laravel application using the `GotYourLogs` facade. Here's an example of how to log a user login action:

```php
use GotYourLogs;

GotYourLogs::log('UserLogin', [
    'user_id' => auth()->user()->id,
    'status' => 'success',
    'ip_address' => request()->ip(),
]);
```

### Log File Structure

Logs are stored in JSON files named after the current date (e.g., `2024-08-21.json`). Each log entry includes the time, operation name, and details of the action. An example log entry might look like this:

```json
{
    "time": "2024-08-21 09:15:32",
    "operation": "UserLogin",
    "details": {
        "user_id": 101,
        "status": "success",
        "ip_address": "192.168.1.10"
    }
}
```

### Customizing the Log Format

You can customize the log format by editing the `config/gotyourlogs.php` file. The default configuration looks like this:

```php
return [
    'log_format' => [
        'time' => 'Y-m-d H:i:s',
        'operation' => '',
        'details' => '',
    ],
    'storage_path' => storage_path('logs/got-your-logs'),
];
```

- `time`: The format for the timestamp in the logs. You can modify this to match your preferred date/time format.
- `operation`: The name of the action or event being logged.
- `details`: Additional details about the action.

### Modifying the Storage Path

By default, logs are stored in the `storage/logs/got-your-logs/` directory. You can change the storage path by modifying the `storage_path` key in the `config/gotyourlogs.php` file:

```php
'storage_path' => storage_path('custom-logs-directory'),
```

## Contributing

Contributions are welcome! If you find a bug or have an idea for a new feature, please open an issue or submit a pull request.

## License

Got Your Logs is open-sourced software licensed under the [MIT license](LICENSE).
