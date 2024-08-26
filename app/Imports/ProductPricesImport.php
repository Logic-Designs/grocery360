<?php

namespace App\Imports;

use App\Models\ProductPrice;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Validation\ValidationException;

class ProductPricesImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // Validate header row
        $header = $rows->first();
        $requiredHeaders = ['Category', 'Product', 'Image', 'Recommended'];

        // Check if required headers are present
        $this->validateHeaders($header, $requiredHeaders);

        // Extract shop names from header
        $shops = array_slice($header->toArray(), 4);
        // Skip header row and process data rows
        $rows->shift();

        $data = [];

        foreach ($rows as $key => $row) {
            if (!isset($row[0]) || !isset($row[1]) || !isset($row[2])) {
                throw new ValidationException('Missing required data fields in row ' . ($key + 1));
            }

            $category = $row[0];
            $product = $row[1];
            $image = $row[2];
            $recommended = $row[3];

            if (!filter_var($image, FILTER_VALIDATE_URL)) {
                throw new ValidationException('Invalid image URL in row ' . ($key + 1));
            }

            if (!is_numeric($recommended)) {
                throw new ValidationException('Invalid recommended value in row ' . ($key + 1));
            }

            $data[$category][$product] = ['image' => $image, 'recommended'=> $recommended,'shpos' => []];


            foreach ($row->slice(4) as $shopIndex => $price) {
                if (!is_numeric($price)) {
                    throw ValidationException::withMessages(['Invalid price value in row ' . ($key + 2) . ' for shop ' . $shops[$shopIndex-4]]);
                }
                $data[$category][$product]['shpos'][$shops[$shopIndex-4]] = $price;
            }
        }

        // Save the validated data
        $prices = ProductPrice::first();
        if ($prices) {
            $prices->update(['prices' => json_encode($data)]);
        } else {
            ProductPrice::create(['prices' => json_encode($data)]);
        }
    }

    private function validateHeaders($header, $requiredHeaders)
    {
        $headerArray = $header->toArray();

        // Normalize headers to lowercase for case-insensitive comparison
        $normalizedHeaderArray = array_map('strtolower', $headerArray);
        $normalizedRequiredHeaders = array_map('strtolower', $requiredHeaders);

        // Extract fixed headers and shop headers
        $fixedHeaders = array_slice($normalizedHeaderArray, 0, count($normalizedRequiredHeaders));
        $shopHeaders = array_slice($normalizedHeaderArray, count($normalizedRequiredHeaders));

        // Check if all required headers are present (case-insensitive)
        foreach ($normalizedRequiredHeaders as $index => $requiredHeader) {
            if (!isset($fixedHeaders[$index]) || $fixedHeaders[$index] !== $requiredHeader) {
                throw ValidationException::withMessages(['The file header is missing or incorrect for header: ' . $requiredHeader]);
            }
        }

        // Optional: Check if there are any unexpected headers
        if (count($shopHeaders) < 1) {
            throw ValidationException::withMessages(['The file must contain at least one shop header.']);
        }
    }

}
