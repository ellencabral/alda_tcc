<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Shop;
use Livewire\Component;

class LiveSearch extends Component
{
    public $search = '';
    public $searchType = '';
    public $category = '';
    public $filter = '';
    public $sortField = 'name';
    public $sortDirection = 'asc';

    public function updatedFilter()
    {
        switch ($this->filter) {
            case 'alphabetical_order':
                $this->sortField = 'name';
                $this->sortDirection = 'asc';
            break;
            case 'lowest_sale_price':
                $this->sortField = 'sale_price';
                $this->sortDirection = 'asc';
            break;
            case 'highest_sale_price':
                $this->sortField = 'sale_price';
                $this->sortDirection = 'desc';
            break;
            case 'most_recent':
                $this->sortField = 'id';
                $this->sortDirection = 'desc';
            break;
        }
    }

    public function render()
    {
        if($this->searchType == 'Lojas') {
            $this->searchType = 'Lojas';
            $results = Shop::where('name', 'like', '%' . $this->search . '%');
        }
        if($this->searchType == 'Produtos') {
            $this->searchType = 'Produtos';
            $results = Product::where('name', 'like', '%' . $this->search . '%');
            if($this->category) {
                $results = $results->where('category_id', $this->category->id);
            }
        }
        return view('livewire.live-search', [
            'results' => $results->orderBy($this->sortField, $this->sortDirection)->paginate(10),
        ]);
    }
}
