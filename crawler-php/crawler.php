<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Crawler;

echo "🚀 Starting Oxylabs Product Crawler...\n";
echo "📡 Crawling: https://sandbox.oxylabs.io/products\n\n";

try {
    $crawler = new Crawler();
    
    echo "⏳ Extracting product data...\n";
    $products = $crawler->crawl();
    
    echo "✅ Found " . count($products) . " products\n\n";
    
    $jsonOutput = $crawler->exportToJson($products);
    
    $outputFile = __DIR__ . '/output/products.json';
    $outputDir = dirname($outputFile);
    
    if (!is_dir($outputDir)) {
        mkdir($outputDir, 0755, true);
    }
    
    file_put_contents($outputFile, $jsonOutput);
    
    echo "💾 Data saved to: " . $outputFile . "\n";
    echo "📊 JSON output:\n";
    echo "================\n";
    echo $jsonOutput . "\n";
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    exit(1);
}

echo "\n🎉 Crawling completed successfully!\n";
