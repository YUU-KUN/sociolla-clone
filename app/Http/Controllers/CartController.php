<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //harusnya cek id user dulu nanti 
        $cart = Cart::with('Product:id,title,name,stock,discount,price,price_after_discount,brand_id', 'Product.Brand', 'Product.ProductGallery')->get(); 
        // $cart = Cart::with('Product', 'Product.Brand', 'Product.ProductGallery')->get();
        // $total = 0;
        // for ($index=0; $index < $cart->count() ; $index++) { 
        //     if ($cart[$index]->product->discount > 0) {
        //         $total =+ $cart[$index]->product->price_after_discount;
        //     } else {
        //         $total =+ $cart[$index]->product->price;
        //     }
        // };
        return $cart;
        // return response()->json([
        //     'cart' => $cart,
        //     'total' => $total,
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = '1';
        // $input['user_id'] = Auth::user()->id;

        // nanti cek apakah cart yang dengan user id tertentu udah ada. kalo udah ada, 
        // maka update, jika belum ada, maka insert
        // if (Cart::where('user_id', Auth::user()->id)->first())

        $addedCart = Cart::where('product_id', $input['product_id'])->first();
        if ($addedCart) {
            $addedCart->quantity++;
            // $addedCart->quantity += $input['quantity'];
            $addedCart->save();
            return $addedCart;
        }
        $cart = Cart::create($input);
        return $cart;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $cart->update($request->quantity);
        return $cart;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return $cart;
    }

    public function checkout(Request $request)
    {
        $input = $request->all();
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $cart->update($input);
        return $cart;
    }

    // public function addQuantity(Request $request, $id)
    // {
    //     // $cart = Cart::where('product_id', $request->product_id)->first();
    //     $cart = Cart::find($id)->first();
    //     $cart->quantity += 1;
    //     $cart->save();
    //     return $cart;
    // }
}
