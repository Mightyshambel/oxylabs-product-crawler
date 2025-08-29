<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\DomCrawler\Crawler as DomCrawler;

class Crawler
{
    private Client $httpClient;
    private string $baseUrl = 'https://sandbox.oxylabs.io/products';

    public function __construct()
    {
        $this->httpClient = new Client([
            'timeout' => 30,
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
            ]
        ]);
    }


    public function crawl(): array
    {
        try {
            $response = $this->httpClient->get($this->baseUrl);
            $html = $response->getBody()->getContents();
            
            return $this->parseProducts($html);
        } catch (GuzzleException $e) {
            throw new \RuntimeException("Failed to crawl: " . $e->getMessage());
        }
    }


    private function parseProducts(string $html): array
    {
        $crawler = new DomCrawler($html);
        $products = [];

        // Find product containers
        $productElements = $crawler->filter('.product-card');

        foreach ($productElements as $element) {
            $productCrawler = new DomCrawler($element);
            
            $product = $this->extractProductData($productCrawler);
            
            if ($this->isValidProduct($product)) {
                $products[] = $product;
            }
        }

        return $products;
    }


    private function extractProductData(DomCrawler $productCrawler): array
    {
        $product = [
            'title' => $this->extractText($productCrawler, '.title'),
            'price' => $this->extractText($productCrawler, '.price-wrapper'),
            'image_url' => $this->extractAttribute($productCrawler, 'img', 'src'),
            'description' => $this->extractText($productCrawler, '.description'),
            'category' => $this->extractText($productCrawler, '.category'),
            'url' => $this->extractAttribute($productCrawler, 'a', 'href'),
            'extracted_at' => $this->now()->format('c')
        ];

        $product = array_map('trim', $product);
        $product = array_filter($product);

        return $product;
    }


    private function extractText(DomCrawler $crawler, string $selector): ?string
    {
        try {
            $element = $crawler->filter($selector)->first();
            return $element->count() > 0 ? $element->text() : null;
        } catch (\Exception $e) {
            return null;
        }
    }


    private function extractAttribute(DomCrawler $crawler, string $selector, string $attribute): ?string
    {
        try {
            $element = $crawler->filter($selector)->first();
            if ($element->count() > 0) {
                $value = $element->attr($attribute);

                if ($attribute === 'src' && $value && !filter_var($value, FILTER_VALIDATE_URL)) {
                    $value = $this->resolveRelativeUrl($value);
                }
                return $value;
            }
            return null;
        } catch (\Exception $e) {
            return null;
        }
    }


    private function resolveRelativeUrl(string $url): string
    {
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return $url;
        }

        if (str_starts_with($url, '/')) {
            return 'https://sandbox.oxylabs.io' . $url;
        }

        return $this->baseUrl . '/' . ltrim($url, '/');
    }


    private function isValidProduct(array $product): bool
    {
        // Need at least title or description
        return !empty($product['title']) || !empty($product['description']);
    }


    public function exportToJson(array $products): string
    {
        return json_encode([
            'products' => $products,
            'total' => count($products),
            'crawled_at' => $this->now()->format('c'),
            'source' => $this->baseUrl
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }


    private function now(): \DateTime
    {
        return new \DateTime();
    }
}
