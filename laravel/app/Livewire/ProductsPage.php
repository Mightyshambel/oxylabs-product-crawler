<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class ProductsPage extends Component
{
    use WithPagination;

    #[Url]
    public string $sortBy = 'extracted_at';

    #[Url]
    public string $sortDirection = 'desc';

    #[Url]
    public string $search = '';

    #[Url]
    public string $category = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        $products = Product::query()
            ->with('images')
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%')
                      ->orWhere('category', 'like', '%' . $this->search . '%');
            })
            ->when($this->category, function ($query) {
                $query->where('category', $this->category);
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(25);

        $categories = Product::distinct()->pluck('category')->filter()->values();

        return view('livewire.products-page', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
