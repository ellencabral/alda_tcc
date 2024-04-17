<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Gloudemans\Shoppingcart\Facades\Cart;
use Gloudemans\Shoppingcart\CartItem;

class ShoppingBagController extends Controller
{
    public function index(): View
    {
        $items = Cart::content();

        return view('shopping-bag', compact('items'));
    }

    public function add(Request $request): RedirectResponse
    {
        $items = Cart::content();

        if($items->isNotEmpty()) { // A SACOLA POSSUI ITENS
            foreach ($items as $item) {
                $product = Product::where('id', $item->id)->first();

                if ($product->shop_id != $request->shop_id) {

                    $product = Product::where('id', $request->id)->first();

                    $url = route('products.show', [
                        'url' => $product->shop->url,
                        'name' => $request->name
                    ]);
                    $valid = false;
                }
                else {
                    $valid = true;
                    $url = route('shopping-bag');
                }
                break;
            }
        }
        else { // A SACOLA ESTA VAZIA
            $valid = true;
            $url = route('shopping-bag');
        }

        if($valid) {
            Cart::add([
                'id' => $request->id,
                'name' => $request->name,
                'qty' => $request->quantity,
                'price' => $request->sale_price,
                'weight' => 0,
                'options' => [
                    'image' => $request->image,
                ],
            ]);
        }

        return redirect($url);
    }

    public function update(Request $request, $rowId): RedirectResponse
    {
        Cart::update($rowId, $request->quantity);

        return redirect(route('shopping-bag'));
    }

    public function delete($rowId): RedirectResponse
    {
        Cart::remove($rowId);

        return redirect(route('shopping-bag'));
    }

    public function destroy(): RedirectResponse
    {
        Cart::destroy();

        return redirect(route('shopping-bag'));
    }

}
