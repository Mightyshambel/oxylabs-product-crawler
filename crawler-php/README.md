# Oxylabs Product Crawler

A PHP-based web crawler for extracting product data from the Oxylabs sandbox.

## Features

- Extracts product data: title, price, image_url, description, category
- Uses Guzzle HTTP client for reliable requests
- Symfony DomCrawler for HTML parsing
- Exports data in JSON format compatible with Laravel
- Handles relative URLs and image paths
- Robust error handling and validation

## Requirements

- PHP 8.2+
- Composer

## Installation

1. Navigate to the crawler-php directory:
```bash
cd crawler-php
```

2. Install dependencies:
```bash
composer install
```

## Usage

Run the crawler script:
```bash
composer run crawl
```

Or directly:
```bash
php src/crawler.php
```

## Output

The crawler will:
1. Extract product data from https://sandbox.oxylabs.io/products
2. Save the data to `output/products.json`
3. Display the results in the console

## Data Structure

The crawler extracts the following fields:
- `title`: Product name/title
- `price`: Product price
- `image_url`: Product image URL
- `description`: Product description (if available)
- `category`: Product category/classification
- `url`: Product page URL
- `extracted_at`: Timestamp of extraction

## JSON Output Format

```json
{
    "products": [
        {
            "title": "Product Name",
            "price": "$99.99",
            "image_url": "https://example.com/image.jpg",
            "description": "Product description...",
            "category": "Electronics",
            "url": "https://example.com/product",
            "extracted_at": "2024-01-01T12:00:00+00:00"
        }
    ],
    "total": 1,
    "crawled_at": "2024-01-01T12:00:00+00:00",
    "source": "https://sandbox.oxylabs.io/products"
}
```

## Customization

You can modify the `Crawler` class in `src/Crawler.php` to:
- Adjust CSS selectors for different websites
- Add new data fields to extract
- Modify validation logic
- Change output format

## Error Handling

The crawler includes comprehensive error handling for:
- Network failures
- HTML parsing errors
- Invalid data
- File system issues

## Dependencies

- **Guzzle**: HTTP client for making requests
- **Symfony DomCrawler**: HTML parsing and element selection
- **Symfony CSS Selector**: CSS selector support for DomCrawler
