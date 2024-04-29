<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class FilterProducts extends Component
{
    public $search = '';
    public $searchType = '';
    public $filter = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';

    public function updatedFilter()
    {
        if($this->filter == 'alphabetical_order') {
            $this->sortField = 'name';
            $this->sortDirection = 'asc';
        }
        if($this->filter == 'lowest_sale_price') {
            $this->sortField = 'sale_price';
            $this->sortDirection = 'asc';
        }
        if($this->filter == 'highest_sale_price') {
            $this->sortField = 'sale_price';
            $this->sortDirection = 'desc';
        }
        if($this->filter == 'most_recent') {
            $this->sortField = 'id';
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        return view('livewire.filter-products', [
            'results' => Product::where('name', 'like', '%' . $this->search . '%')
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(10),
        ]);
    }
}
