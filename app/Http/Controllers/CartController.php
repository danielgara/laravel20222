<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Item;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $productsInCart = [];
        $ids = $request->session()->get('products'); 

        $products = [];

        if($ids){
            $products = Product::findMany(array_keys($ids));
        }

        $viewData = [];
        $viewData['title'] = 'Cart - Online Store';
        $viewData['subtitle'] = 'Shopping Cart';
        $viewData['products'] = $products;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add($id, Request $request)
    {
        $products = $request->session()->get('products');
        $products[$id] = 1;
        $request->session()->put('products', $products);

        return back();
    }

    public function removeAll(Request $request)
    {
        $request->session()->forget('products');

        return back();
    }

    public function purchase(Request $request)
    {
        $ids = $request->session()->get('products'); 
        $products = [];

        if($ids){
            $products = Product::findMany(array_keys($ids));
            $order = new Order();
            $order->setTotal(0);
            $order->save();
            $total = 0;

            foreach ($products as $product) {
                $item = new Item();
                $item->setQuantity(1);
                $item->setSubtotal($product->getPrice()*1);
                $item->setProductId($product->getId());
                $item->setOrderId($order->getId());
                $total = $total + $product->getPrice()*1;
                $item->save();
            }

            $order->setTotal($total);
            $order->save();

            dd("Felicitaciones");
        }
    }
}
