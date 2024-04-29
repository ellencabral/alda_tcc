<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    public function search(Request $request): View
    {
        $searchText = $request->input('search_text');

        $searchType = $request->input('search_type');

        if($searchType == 'Produtos') {
            $model = new Product();
        }
        if($searchType == 'Lojas') {
            $model = new Shop();
        }
        if($searchType == 'Usuários') {
            $model = new User();
        }

        $results = $model::where('name', 'like', '%' . $searchText . '%')->paginate(10);

        return view('search-results', [
            'results' => $results,
            'searchText' => $searchText,
            'searchType' => $searchType
        ]);
    }
}
