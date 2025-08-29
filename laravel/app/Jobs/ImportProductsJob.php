<?php

namespace App\Jobs;

use App\Models\Product;
use App\Models\Image;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ImportProductsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        private array $products
    ) {}

    public function handle(): void
    {
        foreach ($this->products as $productData) {
            try {
                $product = Product::create([
                    'title' => $productData['title'],
                    'price' => $productData['price'],
                    'description' => $productData['description'] ?? null,
                    'category' => $productData['category'] ?? null,
                    'url' => $productData['url'] ?? null,
                    'extracted_at' => $productData['extracted_at'] ?? now(),
                ]);

                if (!empty($productData['image_url'])) {
                    $product->images()->create([
                        'image_url' => $productData['image_url'],
                        'alt_text' => $productData['title'] ?? null,
                    ]);
                }

                Log::info("Product imported: {$product->title}");
            } catch (\Exception $e) {
                Log::error("Failed to import product: " . $e->getMessage(), [
                    'product_data' => $productData
                ]);
            }
        }
    }
}
