<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\ImportProductsJob;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ImportController extends Controller
{
    public function import(Request $request): JsonResponse
    {
        $request->validate([
            'products' => 'required|array',
            'products.*.title' => 'required|string',
            'products.*.price' => 'required|string',
        ]);

        try {
            $products = $request->input('products');
            
            ImportProductsJob::dispatch($products);

            Log::info("Import job dispatched for " . count($products) . " products");

            return response()->json([
                'message' => 'Import job dispatched successfully',
                'products_count' => count($products),
                'job_id' => uniqid(),
            ], 202);

        } catch (\Exception $e) {
            Log::error("Import failed: " . $e->getMessage());
            
            return response()->json([
                'error' => 'Import failed',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
