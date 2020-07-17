<?php

namespace App\Http\Livewire;

use App\Models\Product;


class SearchProducts extends Search
{
    public function render()
    {
        $models = parent::render();

        return view('livewire.search-products', compact('models'));
    }

    public function updateItem(string $productName, $item)
    {
        $product = Product::where('product_name', $productName)->first();

        if ($product) {
            $product->fill($item)->save();
            session()->flash('success', 'Product updated successfully!');
        } else {
            Product::create($item)->save();
            session()->flash('success', 'Product created successfully!');
        }
    }

    protected function setUrl()
    {
        $this->url = 'https://world.openfoodfacts.org/cgi/search.pl?action=process&sort_by=unique_scans_n&page_size=20&json=1';
    }

    protected function setItemName()
    {
        $this->itemName = 'products';
    }

    protected function setSearchField()
    {
        $this->searchField = 'product_name';
    }

    protected function setFields()
    {
        $this->fields = [
            'id',
            'product_name',
            'image_url',
            'categories'
        ];
    }

}
