<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingBagController extends Controller
{
    public function index(): View
    {
        $items = Cart::content();

        if($items->isNotEmpty()) {
            foreach($items as $item) {
                $product = Product::find($item->id);
                $url = view('shopping-bag', compact('items'), ['shop' => $product->shop]);
                break;
            }
        }
        else {
            $url = view('shopping-bag', compact('items'));
        }

        return $url;
    }

    public function add(Request $request): RedirectResponse
    {
        $items = Cart::content();

        $product = Product::where('id', $request->id)->first();

        if($items->isNotEmpty()) { // A SACOLA POSSUI ITENS
            foreach ($items as $item) {
                $cartItem = Product::where('id', $item->id)->first();

                if ($cartItem->shop_id != $product->shop_id) {
                    // COMPARA O ITEM DO CARRINHO COM O PRODUTO SENDO ADICIONADO

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
            $shop = Shop::where('id', $product->shop_id)->first();

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
            $status = 'product-added';
        }
        else {
            $status = 'product-not-added';
        }

        return redirect($url)
            ->with('status', $status)
            ->with('shop', $shop);
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
