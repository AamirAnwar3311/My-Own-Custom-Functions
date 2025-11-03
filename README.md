# HelperFunctions

A comprehensive collection of helper functions for PHP/Laravel applications including API calls, calculations, date operations, string manipulation, file handling, array utilities, and validation helpers.

[![Latest Stable Version](https://img.shields.io/packagist/v/helperfunctions/helperfunctions.svg)](https://packagist.org/packages/helperfunctions/helperfunctions)
[![Total Downloads](https://img.shields.io/packagist/dt/helperfunctions/helperfunctions.svg)](https://packagist.org/packages/helperfunctions/helperfunctions)
[![License](https://img.shields.io/packagist/l/helperfunctions/helperfunctions.svg)](https://packagist.org/packages/helperfunctions/helperfunctions)

## Installation

### Composer

```bash
composer require helperfunctions/helperfunctions
```

### Laravel

The package will auto-register the service provider. If you're using Laravel 5.5+, the service provider will be automatically discovered.

For older Laravel versions, add the service provider to `config/app.php`:

```php
'providers' => [
    // ...
    HelperFunctions\Helpers\HelperFunctionsServiceProvider::class,
],
```

## Requirements

- PHP 7.4 or higher
- Laravel 7.0 or higher (optional for standalone use)
- Guzzle HTTP Client
- Carbon

## Features

### ✨ Helper Classes

- **ApiHelper** - Make HTTP requests easily
- **MathHelper** - Mathematical operations and calculations
- **StringHelper** - String manipulation utilities
- **DateHelper** - Date and time operations
- **FileHelper** - File upload and management
- **ArrayHelper** - Array manipulation utilities
- **ValidationHelper** - Input validation helpers

## Usage

### API Helper

Make HTTP requests to external APIs:

```php
use HelperFunctions\Helpers\ApiHelper;

// Make a GET request
$response = ApiHelper::hitApi(
    'GET',
    'https://api.example.com/users',
    ['page' => 1],  // query parameters
    [],             // body (empty for GET)
    ['Authorization' => 'Bearer token']  // headers
);

// Using Laravel Http facade helpers
$response = ApiHelper::get('https://api.example.com/users', ['page' => 1]);
$response = ApiHelper::post('https://api.example.com/users', ['name' => 'John']);
$response = ApiHelper::put('https://api.example.com/users/1', ['name' => 'Jane']);
$response = ApiHelper::delete('https://api.example.com/users/1');

// Parse JSON response
$data = $response->json();
```

### Math Helper

Perform mathematical operations:

```php
use HelperFunctions\Helpers\MathHelper;

// Basic calculations
$sum = MathHelper::calculate(10, 5, 'sum');           // 15
$diff = MathHelper::calculate(10, 5, 'subtract');     // 5
$product = MathHelper::calculate(10, 5, 'multiply');  // 50
$quotient = MathHelper::calculate(10, 5, 'divide');   // 2

// Float calculations
$result = MathHelper::calculateFloat(10.5, 2.3, 'sum');

// Calculate commission
$commission = MathHelper::calculateCommission(1000, 15); // 150.0

// Random numbers
$random = MathHelper::randomInt(1, 100);
$randomFloat = MathHelper::randomFloat(0.0, 1.0);

// Format numbers
$formatted = MathHelper::formatNumber(1234567.89); // "1,234,567.89"
```

### String Helper

String manipulation utilities:

```php
use HelperFunctions\Helpers\StringHelper;

// Create URL-friendly slug
$slug = StringHelper::slug('Hello World!'); // "hello-world"

// Generate random string
$random = StringHelper::randomString(16);

// Generate OTP
$otp = StringHelper::generateOTP(6);

// Mask sensitive data
$masked = StringHelper::mask('1234567890', 2, 4); // "12****90"
$maskedEmail = StringHelper::maskEmail('john@example.com'); // "jo**@***le.com"

// Truncate text
$short = StringHelper::truncate('Long text here', 10); // "Long text ..."

// Check if JSON
$isJson = StringHelper::isJson('{"name":"John"}'); // true

// Case conversion
$snake = StringHelper::camelToSnake('camelCase');  // "camel_case"
$camel = StringHelper::snakeToCamel('snake_case'); // "SnakeCase"

// Get initials
$initials = StringHelper::getInitials('John Doe'); // "JD"
```

### Date Helper

Date and time operations:

```php
use HelperFunctions\Helpers\DateHelper;

// Check expiry
$status = DateHelper::checkExpiry('2024-01-01', '2024-12-31'); // 'active', 'expired', or 'not_started'

// Format dates
$formatted = DateHelper::formatDate('2024-12-25', 'Y-m-d');

// Human-readable difference
$diff = DateHelper::diffForHumans('2024-01-01'); // "1 year ago"

// Get age
$age = DateHelper::getAge('1990-05-15'); // 34

// Date checks
$isPast = DateHelper::isPast('2023-01-01');    // true
$isFuture = DateHelper::isFuture('2025-01-01'); // true
$isToday = DateHelper::isToday('2024-12-20');  // depends on current date

// Date arithmetic
$future = DateHelper::addDays('2024-01-01', 30);
$past = DateHelper::subDays('2024-01-01', 30);

// Days between dates
$days = DateHelper::daysBetween('2024-01-01', '2024-12-31'); // 364

// Start and end of day
$start = DateHelper::startOfDay('2024-12-20');
$end = DateHelper::endOfDay('2024-12-20');

// Date range
$dates = DateHelper::dateRange('2024-01-01', '2024-01-07');
```

### File Helper

File upload and management:

```php
use HelperFunctions\Helpers\FileHelper;
use Illuminate\Http\UploadedFile;

// Upload image
$path = FileHelper::uploadImage($file, 'images/products');

// Upload any file
$path = FileHelper::uploadFile($file, 'uploads/documents');

// Delete file
FileHelper::deleteFile('images/products/example.jpg');

// Get file information
$size = FileHelper::getFileSize('path/to/file.txt'); // "1.5 MB"
$extension = FileHelper::getExtension('image.jpg');  // "jpg"
$name = FileHelper::getNameWithoutExtension('image.jpg'); // "image"

// Validate file
$valid = FileHelper::validateFileType($file, ['jpg', 'png', 'gif']);
$validSize = FileHelper::validateFileSize($file, 2048); // 2048 KB

// File operations
FileHelper::createDirectory('uploads/temp');
$content = FileHelper::readFile('path/to/file.txt');
FileHelper::writeFile('path/to/file.txt', 'content');
FileHelper::copyFile('source.txt', 'destination.txt');
FileHelper::moveFile('old.txt', 'new.txt');
```

### Array Helper

Array manipulation utilities:

```php
use HelperFunctions\Helpers\ArrayHelper;

// Check if associative
$isAssoc = ArrayHelper::isAssociative(['name' => 'John', 'age' => 30]); // true

// Get value with default
$value = ArrayHelper::get($array, 'key', 'default');

// Dot notation access
$value = ArrayHelper::dotGet($array, 'user.profile.email');

// Set value with dot notation
$array = ArrayHelper::set([], 'user.profile.name', 'John');

// Flatten multi-dimensional array
$flat = ArrayHelper::flatten(['a' => ['b' => 'c']]); // ['c']

// Group by key
$grouped = ArrayHelper::groupBy($users, 'role');

// Pluck values
$emails = ArrayHelper::pluck($users, 'email');

// Remove duplicates
$unique = ArrayHelper::unique([1, 2, 2, 3]); // [1, 2, 3]

// Chunk array
$chunks = ArrayHelper::chunk([1, 2, 3, 4, 5], 2); // [[1, 2], [3, 4], [5]]

// Random elements
$random = ArrayHelper::random([1, 2, 3, 4, 5], 2);

// Convert to object
$object = ArrayHelper::toObject(['name' => 'John']);

// First and last
$first = ArrayHelper::first([1, 2, 3]); // 1
$last = ArrayHelper::last([1, 2, 3]);   // 3
```

### Validation Helper

Input validation utilities:

```php
use HelperFunctions\Helpers\ValidationHelper;

// Validate email
$valid = ValidationHelper::isValidEmail('john@example.com'); // true

// Validate URL
$valid = ValidationHelper::isValidUrl('https://example.com'); // true

// Validate IP
$valid = ValidationHelper::isValidIp('192.168.1.1'); // true

// Validate phone
$valid = ValidationHelper::isValidPhone('+1234567890'); // true

// Validate credit card (Luhn algorithm)
$valid = ValidationHelper::isValidCreditCard('4111111111111111'); // true

// Validate password strength
$result = ValidationHelper::validatePassword('MyP@ssw0rd', 8, true, true, true, true);
if ($result['valid']) {
    echo "Password is valid";
} else {
    print_r($result['errors']);
}

// Validate date format
$valid = ValidationHelper::isValidDateFormat('2024-12-25', 'Y-m-d'); // true

// Validate range
$valid = ValidationHelper::isValidRange(50, 1, 100); // true

// Validate string length
$valid = ValidationHelper::isValidLength('hello', 3, 10); // true

// Type checks
$alpha = ValidationHelper::isAlphaOnly('Hello World'); // true
$alnum = ValidationHelper::isAlphanumeric('Hello123'); // true
$numeric = ValidationHelper::isNumeric('12345');       // true
$base64 = ValidationHelper::isValidBase64('SGVsbG8='); // true
```

## Laravel Service Container

You can also access helpers via Laravel's service container:

```php
$apiHelper = app('helper.api');
$mathHelper = app('helper.math');
$stringHelper = app('helper.string');
$dateHelper = app('helper.date');
$fileHelper = app('helper.file');
$arrayHelper = app('helper.array');
$validationHelper = app('helper.validation');
```

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This package is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Support

For issues, questions, or contributions, please visit the [GitHub repository](https://github.com/AamirAnwar3311/My-Own-Custom-Functions).

## Author

**HelperFunctions Contributors**

- GitHub: [@AamirAnwar3311](https://github.com/AamirAnwar3311)
- Homepage: https://github.com/AamirAnwar3311/My-Own-Custom-Functions

## Changelog

Please see [CHANGELOG.md](CHANGELOG.md) for more information on what has changed recently.

