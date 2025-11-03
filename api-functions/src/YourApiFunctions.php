<?php

namespace YourVendorName\ApiFunctions;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class YourApiFunctions
{
    public static function hitApi($endpoint, $params = [], $body = [], $headers = [])
    {
        $client = new Client();

        $defaultHeaders = [
            'Accept' => 'application/json',
        ];

        $finalHeaders = array_merge($defaultHeaders, $headers);

        $options = [
            'headers' => $finalHeaders,
            'query' => $params,
        ];

        if (!empty($body)) {
            $options['json'] = $body;
        }

        $response = $client->request('GET', $endpoint, $options);

        $data = $response->getBody()->getContents();

        return $data;
    }

    public static function additionMethodInteger($a, $b, $method)
    {
        $methods = [
            'sum',
            'subtract',
            'multiplication',
            'division'
        ];

        $a = intval($a);
        $b = intval($b);

        if (!in_array($method, $methods)) {
            throw new \InvalidArgumentException("Invalid method. Allowed methods: " . implode(', ', $methods));
        }

        // Perform the operation
        switch ($method) {
            case 'sum':
                return $a + $b;
            case 'subtract':
                return $a - $b;
            case 'multiplication':
                return $a * $b;
            case 'division':
                if ($b === 0) {
                    throw new \InvalidArgumentException("Division by zero is not allowed.");
                }
                return $a / $b;
        }
    }

    public static function additionMethodFloat($a, $b, $method)
    {
        $methods = [
            'sum',
            'subtract',
            'multiplication',
            'division'
        ];

        $a = (float) $a;
        $b = (float) $b;

        if (!in_array($method, $methods)) {
            throw new \InvalidArgumentException("Invalid method. Allowed methods: " . implode(', ', $methods));
        }

        // Perform the operation
        switch ($method) {
            case 'sum':
                return $a + $b;
            case 'subtract':
                return $a - $b;
            case 'multiplication':
                return $a * $b;
            case 'division':
                if ($b === 0) {
                    throw new \InvalidArgumentException("Division by zero is not allowed.");
                }
                return $a / $b;
        }
    }

    public static function processCommission($amount, $percentage)
    {

        $parsedAmount = (float) $amount;

        $commission = $parsedAmount * $percentage / 100;

        return $commission;
    }

    public static function expiryCheck($startDate, $endDate)
    {
        $parsedStartDate = Carbon::parse($startDate);
        $parsedEndDate = Carbon::parse($endDate);
        $dateNow = Carbon::now();


        $result = "active";

        if ($dateNow->gt($parsedEndDate)) {
            $result = "expired";
        }

        return $result;
    }

    public static function generateOTP($length)
    {
        $parsedLength = (int) $length;

        $code = '';

        for ($i = 0; $i < $parsedLength; $i++) {
            $code .= mt_rand(0, 9);
        }

        return $code;
    }

    public static function uploadImage($image, $folder)
    {
        $fileName = time() . '.' . $image->extension();
        $publicPath = __DIR__ . '/../../public/' . $folder; // adjust path according to your folder structure

        if (!file_exists($publicPath)) {
            mkdir($publicPath, 0755, true);
        }

        $image->move($publicPath, $fileName);

        return $fileName;
    }

    public static function slugCreation($string)
    {
        $string = strtolower($string);

        $string = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);

        return $string;
    }

    public static function isJson($string)
    {
        if (!is_string($string)) {
            return false;
        }

        json_decode($string);

        return json_last_error() === JSON_ERROR_NONE;
    }

}
